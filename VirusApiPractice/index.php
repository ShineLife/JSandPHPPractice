<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virus Web</title>
    <link rel="stylesheet" href="../vendor/bootstrap4/bootstrap.min.css">
    <style>
        .card-stat {
            box-shadow: 0 0 1px black;
            margin-top: 20px;
            margin-bottom: 20px;
            border-color: #212529 ;
        }
        .card-header {
            border-bottom: none;
        }
        .card-category {
            color: #8b92a9;
            text-align: right;
        }
        .card-title {
            color: #606477;
            text-align: right;
        }
        .card-footer {
            cursor: pointer;
            user-select: none;
        }
    </style>
    <script type="text/javascript" src="../jquery.min.js"></script>
    <script type="text/javascript" src="../vendor/bootstrap4/bootstrap.min.js"></script>
    <script type="text/javascript" src="../vendor/vue/vue.min.js"></script>
    <script type="text/javascript" src="translate.js"></script>
    <script type="text/javascript" src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</head>
<body>
    <div class="modal fade" id="CountryCaseModal" v-if="countryName != ''" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>{{ countryDetail.country }}</h3>
                </div>
                <div class="modal-body">
                    <canvas id="casesChart"></canvas>
                    <canvas id="deathsChart"></canvas>
                    <canvas id="recoveredChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid" id="main_container">
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="text-center text-white">新冠肺炎數據表</h3>
            </div>
        </div>
        <div class="row">
            <div class="text-center col-12">
                <input type="button" value="刷新" class="btn btn-outline-light" @click="GetAllCases(); GetAllCountryCases();">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h5 class="text-white text-center">經度: {{ position.longitude }} 緯度: {{ position.latitude }}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stat">
                    <div class="card-header">
                        <p class="card-category">確診總數</p>
                        <h3 class="card-title">
                            <span id="text-cases">{{ text_response.cases }}</span>
                            <small>人</small>
                        </h3>
                    </div>
                    <div class="card-footer" @click="ChangeDataFromCountry()">
                        <span>{{ GlobalBool ? "Global" : site }}</span>
                        <p class="text-secondary">點擊可更換至目前所在國家</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stat">
                    <div class="card-header">
                        <p class="card-category">死亡總數</p>
                        <h3 class="card-title">
                            <span id="text-deaths">{{ text_response.deaths }}</span>
                            <small>人</small>
                        </h3>
                    </div>
                    <div class="card-footer" @click="ChangeDataFromCountry()">
                        <span>{{ GlobalBool ? "Global" : site }}</span>
                        <p class="text-secondary">點擊可更換至目前所在國家</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stat">
                    <div class="card-header">
                        <p class="card-category">康復總數</p>
                        <h3 class="card-title">
                            <span id="text-recovered">{{ text_response.recovered }}</span>
                            <small>人</small>
                        </h3>
                    </div>
                    <div class="card-footer" @click="ChangeDataFromCountry()">
                        <span>{{ GlobalBool ? "Global" : site }}</span>
                        <p class="text-secondary">點擊可更換至目前所在國家</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stat">
                    <div class="card-header">
                        <p class="card-category">未康復數</p>
                        <h3 class="card-title">
                            <span id="text-active">{{ text_response.active }}</span>
                            <small>人</small>
                        </h3>
                    </div>
                    <div class="card-footer" @click="ChangeDataFromCountry()">
                        <span>{{ GlobalBool ? "Global" : site }}</span>
                        <p class="text-secondary">點擊可更換至目前所在國家</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom: 12px">
            <div class="col-12">
                <input type="search" name="" @keyup="FilterTable()" v-model="search_text" class="form-control" placeholder="Search">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" style="width:100%; max-width:100%;">
                                <tr>
                                    <th>排名</th>
                                    <th>圖片</th>
                                    <th>地區</th>
                                    <th>總確診數</th>
                                    <th>死亡總數</th>
                                    <th>康復總數</th>
                                    <th>未康復數</th>
                                </tr>
                                <tr v-for="(countryCase, index) in countryCases">
                                    <td>{{ index + 1 }}</td>
                                    <td><img @click="ShowCountryCase(countryCase.country)" style="width: 100px; height: auto; cursor: pointer;" :src="countryCase.countryInfo.flag" alt=""></td>
                                    <td>{{ TranslateChinese(countryCase.country) }}</td>
                                    <td>{{ countryCase.cases }}</td>
                                    <td :class="countryCase.deaths / countryCase.cases > 0.1 ? 'text-danger' : ''">{{ countryCase.deaths }}</td>
                                    <td>{{ countryCase.recovered }}</td>
                                    <td>{{ countryCase.active }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var app = new Vue({
            el:"#main_container",
            data() {
                let text_response = {
                    cases:0,
                    recovered:0,
                    deaths:0,
                    active:0
                };
                let position = {
                    latitude: 0,
                    longitude: 0,
                };
                let search_text = "";
                let countryCasesData = [];
                let countryCases = [];
                let site = "Global";
                let GlobalBool = true;
                let countryDetails = [];
                let countryName = "";
                return {
                    text_response,
                    countryCasesData,
                    countryCases,
                    site,
                    position,
                    GlobalBool,
                    search_text,
                    countryDetails,
                    countryName,
                };
            },
            methods: {
                GetAllCases() {
                    var object = this;
                    if(this.GlobalBool)
                        axios.get("https://corona.lmao.ninja/v2/all")
                            .then(function (response) {
                                object.text_response = response.data;
                            });
                    else
                        axios.get("https://corona.lmao.ninja/v2/countries/" + this.site)
                            .then(function (response) {
                                if(response.message)
                                    object.text_response = {
                                        cases: "No data",
                                        recovered: "No data",
                                        deaths: "No data",
                                        active: "No data",
                                    };
                                object.text_response = response.data;
                            });
                },
                GetAllCountryCases() {
                    var object = this;
                    axios.get("https://corona.lmao.ninja/v2/countries?sort=country")
                        .then(function (response) {
                            object.countryCasesData = response.data;
                            object.countryCasesData.sort((a, b) => { return a.cases > b.cases ? -1 : (a.cases < b.cases ? 1 : 0) });
                            object.countryCases = response.data;
                            object.countryCases.sort((a, b) => { return a.cases > b.cases ? -1 : (a.cases < b.cases ? 1 : 0) });
                            object.FilterTable();
                            console.log(response);
                        });
                },
                GetAllCountryDetails() {
                    axios.get("https://corona.lmao.ninja/v2/historical")
                        .then(function (response) {
                            app.countryDetails = response.data;
                        });
                },
                ChangeDataFromCountry() {
                    this.GlobalBool = !this.GlobalBool;
                    this.GetAllCases();
                },
                FilterTable() {
                    this.countryCases = this.countryCasesData.filter(countryCase => countryCase.country.toLowerCase().indexOf(this.search_text.toLowerCase()) > -1);
                },
                ShowCountryCase(country_name) {
                    this.countryName = country_name;
                    $("#CountryCaseModal").modal();
                },
            },
            computed: {
              countryDetail: function () {
                    return this.countryDetails.filter((item) => {
                       return item.country == app.countryName;
                    });
              }
            },
            mounted() {
                var object = this;

                if(navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        object.position = position.coords;
                        $.ajax({
                            url:"http://www.datasciencetoolkit.org/coordinates2politics/" + position.coords.latitude + "," + position.coords.longitude,
                            data: {},
                            dataType: "jsonp",
                            success:function (data) {
                                object.site = data[0].politics[0].name;
                            }
                        })
                    })
                }

                object.GetAllCases();
                object.GetAllCountryCases();
                setInterval("app.GetAllCases()", 300000);
                setInterval("app.GetAllCountryCases()", 300000);
            },
        });
    </script>
</body>
</html>