<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>照片輪播</title>
</head>
<script>
    var jsimg = new Array("001.jpg","002.jpg","003.jpg","004.jpg","005.jpg");
    setInterval("randomImg()",1000);
    function randomImg(){
        var index = Math.floor(Math.random() * jsimg.length);
        document.getElementById("tat").innerHTML = "<img src='"+jsimg[index]+"' width=200 height=200>";
    }
</script>
<body onload="randomImg()">
    <div id="tat"></div>
</body>
</html>