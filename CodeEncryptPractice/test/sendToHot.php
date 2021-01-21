<?php
    include("sql.php");
    if(isset($_SESSION["validate"]) && $_SESSION["validate"])
    {
        $sql->query("INSERT INTO `temperatures` SELECT 0, (`value` + " . (isset($_COOKIE["temperature_gain"]) ? $_COOKIE["temperature_gain"] : "0") . "), `date`, `image` FROM `temperature` WHERE `value` >= " . (isset($_COOKIE["max_temperature"]) ? $_COOKIE["max_temperature"] : '37.5') . "");
        $sql->query("DELETE FROM `temperature` WHERE TIME_TO_SEC(TIMEDIFF(NOW(), `date`)) > 15");
    }