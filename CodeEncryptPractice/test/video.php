<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <script src="jquery.min.js"></script>
    <style>
        body {
            position: fixed;
            left: 0px;
            right: 0px;
            top: 0px;
            bottom: 0px;
        }

        canvas {
            height: 97vh;
            width: calc(97vh * 1.333);
            display: inline-block;
        }

        .color-bar {
            display: inline-block;
            color: #999;
            text-shadow: 0px 0px 1px #000;
            text-align: center;
            position: relative;
            width: 40px;
            height: 97vh;
            font-size: 9px;
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
    </style>
</head>

<body>
    <canvas id="canvas" width="80" height="60"></canvas>
    <div class="color-bar">
        <div class="top"></div>
        <div class="bottom"></div>
    </div>
    <script>

        $(function () {
            var canvas = document.getElementById('canvas');
            var ctx = canvas.getContext('2d');
            var ws = new WebSocket("ws://" + location.hostname + ":8181");
            ws.onmessage = function (e) {
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
        });


    </script>
</body>

</html>