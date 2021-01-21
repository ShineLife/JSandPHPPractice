<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新北市紅外線熱像儀跨校自製資訊電子化防疫工具</title>
    <?php
        session_start();
        setcookie("max_temperature", 37.5);
        setcookie("temperature_gain", 0);
        setcookie("temperature_row", 5);
        $_SESSION["validate"] = false;
        include("start.php");
    ?>
</head>
<body>
    
</body>
</html>