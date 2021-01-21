<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="jquery.min.js"></script>
    <script src="highcharts.js"></script>
    
</head>
<script>
    var chart;
    $(function(){
        chart = new Highcharts.Chart({
            chart:{
                renderTo:"container",
                type:"pie"
            },
            title:{
                text:"選手分布圖"
            },
            plotOptions:{
                pie:{
                    allowPointSelect:true,
                    cursor:'pointer',
                    dataLabels:{
                        enabled:true,
                        style:{
                            color:(Highcharts.theme && Highcharts.theme.contrastTextColor)||'black'
                        }
                    }
                }
            },
            series:[{
                name:"人數",
                colorByPoint:true,
                data:[
                    {name:'IT Software Solutions for Business',y:4},
                    {name:'IT Network Systems Administration',y:6},
                    {name:'Web Technologies',y:4},
                    {name:'Electrical Installations',y:4},
                    {name:'Mobile Robotics',y:6}
                ]
            }]
        });
    })
</script>
<body>
    <div id="container" style="width:800px;height:400px;">

    </div>
</body>
</html>