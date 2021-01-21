<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新北市紅外線熱像儀跨校自製資訊電子化防疫工具</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="sidebar.css">
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="sidebar.js"></script>
    <script src="webcam.min.js"></script>
    <style>
        #init {
            position: absolute;
            margin-right: 0px;
            margin-left: 0px;
            margin-top: 0px;
            margin-bottom: 0px;
            z-index: 1000;
        }

        .checki {
            display: none;
        }

        .dot {
            position: relative;

            transform: rotate(180deg);

            display: block;

            width: 60px;
            height: 30px;
            border-radius: 15px;

            overflow: hidden;

            background-color: #14a83b;
        }

        .checki:checked+.dot {
            background-color: white;
        }

        .dot:before {
            content: '';

            position: absolute;
            left: 20px;
            top: 50%;

            transform: translate(-50%, -50%);

            border-radius: 50%;

            animation: close-animation 2s forwards;
        }

        @keyframes close-animation {
            from {
                width: 0;
                height: 0;

                background-color: white;
            }

            to {
                width: 200px;
                height: 200px;

                background-color: white;
            }
        }

        .dot:after {
            content: '';

            position: absolute;
            left: calc(100% - 25px);
            top: 50%;

            transform: translateY(-50%) scale(0);

            width: 12px;
            height: 12px;
            border-radius: 50%;
            z-index: 1;

            background-color: #14a83b;

            transition-delay: .5s;

            animation: scale-animation .5s forwards;
            animation-delay: .5s;
        }

        @keyframes scale-animation {
            from {
                transform: translateY(-50%) scale(0);
            }

            to {
                transform: translateY(-50%) scale(1);
            }
        }

        .checki:checked+.dot:before {
            left: calc(100% - 20px);

            animation: open-animation 2s forwards;
        }

        @keyframes open-animation {
            from {
                width: 0;
                height: 0;

                background-color: #14a83b;
            }

            to {
                width: 200px;
                height: 200px;

                background-color: #14a83b;
            }
        }

        .checki:checked+.dot:after {
            left: 15px;

            background-color: white;

            animation: scale-2-animation .5s forwards;
            animation-delay: .5s;
        }

        @keyframes scale-2-animation {
            from {
                transform: translateY(-50%) scale(0);
            }

            to {
                transform: translateY(-50%) scale(1);
            }
        }

        .video {
            width: 50px;
            height: 50px;
            background: #fff;
            border-radius: 5px;
            position: absolute;
            right: 15px;
            top: 15px;
            bottom: 15px;
            text-align: center;
            user-select: none;
            cursor: pointer;
            transition: all 0.2s;
        }

        .video:hover {
            background-color: #6f6f6f;
            box-shadow: 0px 0px 5px #6f6f6f;
            color: #fff;
        }


        canvas {
            position: absolute;
            right: 40px;
            transform: scaleX(-1);
        }

        .color-bar {
            color: #999;
            text-shadow: 0px 0px 1px #000;
            text-align: center;
            position: absolute;
            right: 10px;
            width: 30px;
            font-size: 8px;
            background: linear-gradient(0deg, rgb(1, 3, 74), rgb(0, 3, 74), rgb(0, 3, 75), rgb(0, 3, 75), rgb(0, 3, 76), rgb(0, 3, 76), rgb(0, 3, 77), rgb(0, 3, 79), rgb(0, 3, 82), rgb(0, 5, 85), rgb(0, 7, 88), rgb(0, 10, 91), rgb(0, 14, 94), rgb(0, 19, 98), rgb(0, 22, 100), rgb(0, 25, 103), rgb(0, 28, 106), rgb(0, 32, 109), rgb(0, 35, 112), rgb(0, 38, 116), rgb(0, 40, 119), rgb(0, 42, 123), rgb(0, 45, 128), rgb(0, 49, 133), rgb(0, 50, 134), rgb(0, 51, 136), rgb(0, 52, 137), rgb(0, 53, 139), rgb(0, 54, 142), rgb(0, 55, 144), rgb(0, 56, 145), rgb(0, 58, 149), rgb(0, 61, 154), rgb(0, 63, 156), rgb(0, 65, 159), rgb(0, 66, 161), rgb(0, 68, 164), rgb(0, 69, 167), rgb(0, 71, 170), rgb(0, 73, 174), rgb(0, 75, 179), rgb(0, 76, 181), rgb(0, 78, 184), rgb(0, 79, 187), rgb(0, 80, 188), rgb(0, 81, 190), rgb(0, 84, 194), rgb(0, 87, 198), rgb(0, 88, 200), rgb(0, 90, 203), rgb(0, 92, 205), rgb(0, 94, 207), rgb(0, 94, 208), rgb(0, 95, 209), rgb(0, 96, 210), rgb(0, 97, 211), rgb(0, 99, 214), rgb(0, 102, 217), rgb(0, 103, 218), rgb(0, 104, 219), rgb(0, 105, 220), rgb(0, 107, 221), rgb(0, 109, 223), rgb(0, 111, 223), rgb(0, 113, 223), rgb(0, 115, 222), rgb(0, 117, 221), rgb(0, 118, 220), rgb(1, 120, 219), rgb(1, 122, 217), rgb(2, 124, 216), rgb(2, 126, 214), rgb(3, 129, 212), rgb(3, 131, 207), rgb(4, 132, 205), rgb(4, 133, 202), rgb(4, 134, 197), rgb(5, 136, 192), rgb(6, 138, 185), rgb(7, 141, 178), rgb(8, 142, 172), rgb(10, 144, 166), rgb(10, 144, 162), rgb(11, 145, 158), rgb(12, 146, 153), rgb(13, 147, 149), rgb(15, 149, 140), rgb(17, 151, 132), rgb(22, 153, 120), rgb(25, 154, 115), rgb(28, 156, 109), rgb(34, 158, 101), rgb(40, 160, 94), rgb(45, 162, 86), rgb(51, 164, 79), rgb(59, 167, 69), rgb(67, 171, 60), rgb(72, 173, 54), rgb(78, 175, 48), rgb(83, 177, 43), rgb(89, 179, 39), rgb(93, 181, 35), rgb(98, 183, 31), rgb(105, 185, 26), rgb(109, 187, 23), rgb(113, 188, 21), rgb(118, 189, 19), rgb(123, 191, 17), rgb(128, 193, 14), rgb(134, 195, 12), rgb(138, 196, 10), rgb(142, 197, 8), rgb(146, 198, 6), rgb(151, 200, 5), rgb(155, 201, 4), rgb(160, 203, 3), rgb(164, 204, 2), rgb(169, 205, 2), rgb(173, 206, 1), rgb(175, 207, 1), rgb(178, 207, 1), rgb(184, 208, 0), rgb(190, 210, 0), rgb(193, 211, 0), rgb(196, 212, 0), rgb(199, 212, 0), rgb(202, 213, 1), rgb(207, 214, 2), rgb(212, 215, 3), rgb(215, 214, 3), rgb(218, 214, 3), rgb(220, 213, 3), rgb(222, 213, 4), rgb(224, 212, 4), rgb(225, 212, 5), rgb(226, 212, 5), rgb(229, 211, 5), rgb(232, 211, 6), rgb(232, 211, 6), rgb(233, 211, 6), rgb(234, 210, 6), rgb(235, 210, 7), rgb(236, 209, 7), rgb(237, 208, 8), rgb(239, 206, 8), rgb(241, 204, 9), rgb(242, 203, 9), rgb(244, 202, 10), rgb(244, 201, 10), rgb(245, 200, 10), rgb(245, 199, 11), rgb(246, 198, 11), rgb(247, 197, 12), rgb(248, 194, 13), rgb(249, 191, 14), rgb(250, 189, 14), rgb(251, 187, 15), rgb(251, 185, 16), rgb(252, 183, 17), rgb(252, 178, 18), rgb(253, 174, 19), rgb(253, 171, 19), rgb(254, 168, 20), rgb(254, 165, 21), rgb(254, 164, 21), rgb(255, 163, 22), rgb(255, 161, 22), rgb(255, 159, 23), rgb(255, 157, 23), rgb(255, 155, 24), rgb(255, 149, 25), rgb(255, 143, 27), rgb(255, 139, 28), rgb(255, 135, 30), rgb(255, 131, 31), rgb(255, 127, 32), rgb(255, 118, 34), rgb(255, 110, 36), rgb(255, 104, 37), rgb(255, 101, 38), rgb(255, 99, 39), rgb(255, 93, 40), rgb(255, 88, 42), rgb(254, 82, 43), rgb(254, 77, 45), rgb(254, 69, 47), rgb(254, 62, 49), rgb(253, 57, 50), rgb(253, 53, 52), rgb(252, 49, 53), rgb(252, 45, 55), rgb(251, 39, 57), rgb(251, 33, 59), rgb(251, 32, 60), rgb(251, 31, 60), rgb(251, 30, 61), rgb(251, 29, 61), rgb(251, 28, 62), rgb(250, 27, 63), rgb(250, 27, 65), rgb(249, 26, 66), rgb(249, 26, 68), rgb(248, 25, 70), rgb(248, 24, 73), rgb(247, 24, 75), rgb(247, 25, 77), rgb(247, 25, 79), rgb(247, 26, 81), rgb(247, 32, 83), rgb(247, 35, 85), rgb(247, 38, 86), rgb(247, 42, 88), rgb(247, 46, 90), rgb(247, 50, 92), rgb(248, 55, 94), rgb(248, 59, 96), rgb(248, 64, 98), rgb(248, 72, 101), rgb(249, 81, 104), rgb(249, 87, 106), rgb(250, 93, 108), rgb(250, 95, 109), rgb(250, 98, 110), rgb(250, 100, 111), rgb(251, 101, 112), rgb(251, 102, 113), rgb(251, 109, 117), rgb(252, 116, 121), rgb(252, 121, 123), rgb(253, 126, 126), rgb(253, 130, 128), rgb(254, 135, 131), rgb(254, 139, 133), rgb(254, 144, 136), rgb(254, 151, 140), rgb(255, 158, 144), rgb(255, 163, 146), rgb(255, 168, 149), rgb(255, 173, 152), rgb(255, 176, 153), rgb(255, 178, 155), rgb(255, 184, 160), rgb(255, 191, 165), rgb(255, 195, 168), rgb(255, 199, 172), rgb(255, 203, 175), rgb(255, 207, 179), rgb(255, 211, 182), rgb(255, 216, 185), rgb(255, 218, 190), rgb(255, 220, 196), rgb(255, 222, 200), rgb(255, 225, 202), rgb(255, 227, 204), rgb(255, 230, 206), rgb(255, 233, 208));
        }

        .color-bar .top {
            position: absolute;
            top: 3px;
            left: 0px;
            width: 100%;
        }

        .color-bar .bottom {
            position: absolute;
            bottom: 3px;
            left: 0px;
            width: 100%;
        }

        #camera {
            width: 15%;
            position: absolute;
            left: 50px;
            bottom: 50px;
            height: auto;
        }

    </style>
</head>

<body style="background-color:#3F3F3F!important;" onload="init()">


    <!-- Start Modal -->
    <div class="modal fade-modal" id="123" tabindex="-1" role="dialog">
        <div class="modal-dialog"
            style="position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);width: 90%;" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p style="font-size:24px;">請點擊按鈕或任意處開啟音效</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary mx-auto" data-dismiss="modal"
                        onclick="opening = true;">開啟音效</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Image Modal -->
    <div class="modal fade-modal" id="imageModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg"
            style="position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);width: 90%;" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="" alt="" id="modal_image" style="width:100%;height:auto;">
                </div>
            </div>
        </div>
    </div>


    <!-- Warning Volume -->
    <audio id="audioi">
        <source src="warning.mp3" type="audio/mp3">
    </audio>


    <!-- Nav -->
    <div class="wrapper superUp">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h5><img src="settings.svg" style="width:10%;height:auto;" alt=""> 設定</h5>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <div class="input-group justify-content-center mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">溫度限制</span>
                        </div>
                        <input type="number" style="width:35%;" class="form-control" name="" value="37.5"
                            id="max_temperature">
                        <div class="input-group-append">
                            <input type="button" value="修改" class="btn btn-light form-control" id="max_change">
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="input-group justify-content-center mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">溫度補償</span>
                        </div>
                        <input type="number" style="width:35%;" class="form-control" name="" value="0"
                            id="temperature_gain">
                        <div class="input-group-append">
                            <input type="button" value="修改" class="btn btn-light form-control" id="gain_change">
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="input-group justify-content-center mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">顯示數量</span>
                        </div>
                        <input type="number" style="width:35%;" class="form-control" name="" value="5"
                            id="temperature_row">
                        <div class="input-group-append">
                            <input type="button" value="修改" class="btn btn-light form-control" id="row_change">
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="content">
            <button type="button" id="sidebarCollapse" class="navbar-btn">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
    <!-- Nav -->


    <!-- Main -->
    <div>


        <!-- Top Block -->
        <div class="row mb-5 mx-auto" style="width:90%;">
            <div class="col-12 text-center p-0 mt-5">


                <!-- Header -->
                <img src="logo-w.png" style="width:60px;height:60px;" alt="">
                <h3 class="text-white text-center" style="font-size:30px;">新北市紅外線熱像儀</h3>
                <h3 class="text-white text-center" style="font-size:30px;">跨校自製資訊電子化防疫工具</h3>
                <!-- Header -->


                <!-- Option -->
                <div class="container">
                    <div class="row">
                        <div class="input-group justify-content-center">
                            <input type="text" name="" class="p-2" placeholder="輸入密碼" id="sendtext">
                            <div class="input-group-append">
                                <input type="button" id="sendbutton" value="進階模式" class="btn btn-outline-light">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="ml-3 mt-3">
                            <span class="text-white">即時更新</span>
                            <label style="margin-top: 5px;">
                                <input class="btn-toggle checki" id="UpdateCheck" type="checkbox">
                                <i class="dot"></i>
                            </label>
                            <span class="text-white">發燒總覽</span>
                        </div>
                    </div>
                    <div class="row justify-content-center" id="AllRecordDiv">
                        <div class="ml-3 mt-3">
                            <span class="text-white">近期紀錄</span>
                            <label style="margin-top: 5px;">
                                <input class="btn-toggle checki" id="AllRecord" type="checkbox">
                                <i class="dot"></i>
                            </label>
                            <span class="text-white">更早紀錄</span>
                        </div>
                    </div>
                    <div id="modal2">
                        <p style="font-size:24px;" class="text-white">有人體溫過高</p>
                        <button type="button" class="btn btn-primary mx-auto" id="closeModal">關閉音效</button>
                    </div>
                </div>
                <!-- Option -->


            </div>
        </div>
        <!-- Top Block -->


        <!-- Table Block -->
        <div class="container">
            <div class="row">
                <div class="col-12 mx-auto" style="width:90%;">
                    <table class="table table-dashed text-light" style="font-size:25px;">
                        <thead>
                            <tr>
                                <th style="width: 50%">日期時間</th>
                                <th style="width: 10%">溫度</th>
                                <th style="width: 40%">照片</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Table Block -->



        <input type="button" value="" id="disbutton" style="display: none;">
    </div>
    <!-- Main -->


    <!-- Temperature Video -->
    <div class="video">
        開啟熱成像
    </div>
    <canvas id="canvas" width="80" height="60"></canvas>
    <div class="color-bar">
        <div class="top" id="max"></div>
        <div class="bottom" id="min"></div>
    </div>

    <div id="camera">

    </div>

    <script>
        let audio;
        let opening = false;
        let passwordval = false;
        let lastHot = true;
        let warning = true;
        function init() {
            audio = document.getElementById("audioi");
            audio.addEventListener('ended', loopAudio, false);
        }
        function loopAudio() {
            audio.loop = true;
            audio.load();
            audio.play();
            audio.pause();
        }
        document.addEventListener('touchstart', function () {
            document.getElementsByTagName('audio')[0].play();
            document.getElementsByTagName('audio')[0].pause();
        });
        function startQuery() {
            if (opening && warning) {
                // console.log($("#UpdateCheck").prop("checked"));
                $.ajax({
                    url: "query.php",
                    async: true,
                    data: {
                        status: (($("#UpdateCheck").prop("checked")) ? $("#UpdateCheck").prop("checked") : false),
                        AllCheck: (($("#AllRecord").prop("checked")) ? $("#AllRecord").prop("checked") : false)
                    },
                    success: function (data) {
                        if (data == "" || data.indexOf("<td>") == -1) {
                            $("tbody").html("暫無資料");
                        }
                        else {
                            $("tbody").html(data);
                        }
                        lastHot = $("#UpdateCheck").prop("checked");
                    },
                    error: function (data) {
                        $("tbody").html("伺服器已關閉");
                    }
                })
            }
            setTimeout(startQuery, 500);
        }

        function take_snapshot() {
            Webcam.snap(function(e){
                $.post("upload_image.php",{"image":e},function(file_name){
                    console.log(file_name);
                });
            });
        }
        $(function () {
            $("#modal2").hide();
            $("#AllRecordDiv").slideUp();
            $("#123").modal();
            $('#123').on('hidden.bs.modal', function (e) {
                opening = true;
            })
            $("#UpdateCheck").change(function () {
                if ($("#UpdateCheck").prop("checked"))
                    $("#AllRecordDiv").slideDown();
                else
                    $("#AllRecordDiv").slideUp();
            });
            startQuery();
            setInterval(() => {
                $.get("sendToHot.php");
            }, 30000);

            // Detect temperature
            setInterval(() => {
                $.get("send.php",
                    function (data) {
                        if (data == "1" && warning) {
                            $("#modal2").show();
                            $("#disbutton").trigger("click");
                            warning = false;
                            audio.currentTime = 0;
                            if (audio.paused)
                                audio.play();
                            $.ajax({
                                url: "query.php",
                                async: true,
                                data: {
                                    status: (($("#UpdateCheck").prop("checked")) ? $("#UpdateCheck").prop("checked") : false),
                                    AllCheck: (($("#AllRecord").prop("checked")) ? $("#AllRecord").prop("checked") : false)
                                },
                                success: function (data) {
                                    if (data == "" || data.indexOf("<td>") == -1) {
                                        $("tbody").html("暫無資料");
                                    }
                                    else {
                                        $("tbody").html(data);
                                    }
                                    lastHot = $("#UpdateCheck").prop("checked");
                                },
                                error: function (data) {
                                    $("tbody").html("伺服器已關閉");
                                }
                            })
                        }
                    })
            }, 200);


            var open_video = false;
            var canvas = document.getElementById('canvas');
            var ctx = canvas.getContext('2d');
            var ws = null;

            if (document.body.clientWidth <= 900) {// phone
                var width = parseInt(document.body.clientWidth * 0.8);
                var height = parseInt(width * 0.75);
                $("#canvas").css({ "width": width + "px", "height": height + "px", "right": (document.body.clientWidth * 0.1 + 15) + "px", "display": "none", "bottom": "10px", "position": "fixed" });
                $(".color-bar").css({ "height": height, "right": (document.body.clientWidth * 0.1 - 15) + "px", "display": "none", "bottom": "10px", "position": "fixed" });
            } else {// pc
                open_video = true;
                var width = parseInt(document.body.clientWidth * 0.2);
                var height = parseInt(width * 0.75);
                $("#canvas").css({ "width": width + "px", "height": height + "px", "right": "60px", "bottom": "50px" });
                $(".color-bar").css({ "height": height, "right": "30px", "bottom": "50px" });
                ws = new WebSocket("ws://" + location.hostname + ":8181");
                ws.onmessage = function (e) {
                    if (!open_video) {
                        return;
                    }
                    var data = e.data;
                    if (data.indexOf("|") != -1) {
                        var a = data.split("|");
                        var max = parseFloat(a[0]);
                        var min = parseFloat(a[1]);
                        $(".top").text(max);
                        $(".bottom").text(min);
                    } else {
                        var img = new Image();
                        img.onload = function () {
                            ctx.drawImage(img, 0, 0);
                        };
                        img.src = "data:image/jpeg;base64," + data;

                    }

                };

                ws.onclose = function () {
                    alert("失去連線")
                }
            }
            $(this).text((open_video) ? "關閉熱成像" : "開啟熱成像");

            // setting webcam
            Webcam.set({
                width: parseInt(document.body.clientWidth * 0.2 * 0.75 / 9 * 16),
                height: parseInt(document.body.clientWidth * 0.2 * 0.75),
                dest_width: 1280,
                dest_height: 720,
                image_format: 'jpeg',
                jpeg_quality: 90,
                force_flash: false,
                flip_horiz: true,
                fps: 30
            });

            // start webcam
            Webcam.attach('#camera');

            var frame_limit = false;
            $(".video").click(function () {
                open_video = !open_video;
                $(this).text((open_video) ? "關閉熱成像" : "開啟熱成像");
                $("#canvas").css({ "display": (open_video) ? "block" : "none" });
                $(".color-bar").css({ "display": (open_video) ? "block" : "none" });
                if (open_video) {
                    if (ws == null) {
                        ws = new WebSocket("ws://" + location.hostname + ":8181");
                        ws.onmessage = function (e) {
                            if (!open_video) {
                                return;
                            }
                            var data = e.data;
                            if (data.indexOf("|") != -1) {
                                var a = data.split("|");
                                var max = parseFloat(a[0]);
                                var min = parseFloat(a[1]);
                                $(".top").text(max);
                                $(".bottom").text(min);
                            } else {
                                frame_limit = !frame_limit;
                                if (frame_limit) {
                                    return;
                                }
                                var img = new Image();

                                img.onload = function () {

                                    ctx.drawImage(img, 0, 0);
                                };
                                img.src = "data:image/jpeg;base64," + data;
                            }

                        };

                        ws.onclose = function () {
                            alert("失去連線")
                        }
                    }
                    $("#canvas").show();

                } else {
                    $("#canvas").hide();

                }
            });


            // Option Change
            $("#max_change").click(function () {
                $.get("change1.php", { value: $("#max_temperature").val() });
            })
            $("#gain_change").click(function () {
                $.get("change2.php", { value: $("#temperature_gain").val() });
            })
            $("#row_change").click(function () {
                $.get("change3.php", { value: $("#temperature_row").val() });
            })


            $("#disbutton").click(function () {
                audio.play();
            })


            // Close Warning Modal
            $('#closeModal').click(function (e) {
                $("#modal2").hide();
                warning = true;
                play = true;
                audio.pause();
            })

            $("#sendbutton").click(function () {
                $.get("login.php", { password: $("#sendtext").val() }, function (data) {
                    if (data == "1234") {
                        $("#sendbutton").hide();
                        $("#sendtext").hide();
                    }
                });
            })
        })
    </script>
</body>

</html>