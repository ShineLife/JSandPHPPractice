<?php
    include("sql.php");
    date_default_timezone_set("Asia/Taipei");
    $datas = $sql->query(
        "SELECT * 
        FROM (SELECT 
        (`value` + " . floatval(isset($_COOKIE["temperature_gain"]) ? $_COOKIE["temperature_gain"] : '0') . ") as `value`, 
        `date` 
        FROM `temperature` 
        GROUP BY `date` 
        ORDER BY `id` DESC 
        LIMIT 3) AS `tablei`
        WHERE `value` >= " . ($_COOKIE["max_temperature"] ?: '0'))->fetchAll();
    $valid_data = array_filter($datas, function($data){
        return strtotime($data["date"] . " + 3 seconds") > strtotime(date("Y/m/d H:i:s"));
    });
    if(count($valid_data) != 0)
    {
        echo "1";
    }else
    {
        echo "0";
    }
?>
