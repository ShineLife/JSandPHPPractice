<?php
    include("sql.php");
    if($_GET["status"] == "false")
    {
        $datas = $sql->query("SELECT `id`,`date`, max(`value`) + " . floatval(isset($_COOKIE["temperature_gain"]) ? $_COOKIE["temperature_gain"] : "0") . " as `value`, image FROM `temperature` GROUP BY `date` ORDER BY `id` DESC limit ". $_COOKIE["temperature_row"])->fetchAll();
    }
    else
    {
        if($_GET["AllCheck"] == "true")
            $datas = $sql->query("SELECT `id`, `date`, max(`value`) + " . floatval(isset($_COOKIE["temperature_gain"]) ? $_COOKIE["temperature_gain"] : "0") . " as `value`, image FROM `temperatures` GROUP BY `date` ORDER BY `id` DESC")->fetchAll();
        else
            $datas = $sql->query("SELECT `id`, `date`, max(`value`) + " . floatval(isset($_COOKIE["temperature_gain"]) ? $_COOKIE["temperature_gain"] : "0") . " as `value`, image FROM `temperature` WHERE `value` + " . floatval(isset($_COOKIE["temperature_gain"]) ? $_COOKIE["temperature_gain"] : "0") . " >= " . (isset($_COOKIE["max_temperature"]) ? $_COOKIE["max_temperature"] : "37.5") . " GROUP BY `date` ORDER BY `id` DESC")->fetchAll();
    }
    
    foreach($datas as $data) {
        $data["value"] = floatval($data["value"]);
    ?>
         <tr <?=$data["value"] >= (isset($_COOKIE["max_temperature"]) ? $_COOKIE["max_temperature"] : '37.5') ? "style='color:tomato;background-color:white;'" : "style=''"?>>
            <td><?=$data["date"]?></td>
            <td <?=$data["value"] >= (isset($_COOKIE["max_temperature"]) ? $_COOKIE["max_temperature"] : '37.5') ? "style='color:tomato;'" : "style=''"?>><?=number_format($data["value"], 2)?></td>
            <td style="">
            <?php
                if($data["value"] >= (isset($_COOKIE["max_temperature"]) ? $_COOKIE["max_temperature"] : '37.5')){
            ?>
                <img <?=isset($_SESSION["validate"]) && $_SESSION["validate"] ? "" : "hidden"?> id="image<?=$data['id']?>" onclick="ShowImage('image<?=$data['id']?>')" src="data:image/jpeg;base64, <?=$data["image"]?>" style="width: 70%;height: auto;" alt="">
            <?php
                }
            ?>
            </td>
        </tr>
    <?php
    }
?>
<script>
    function ShowImage(id){
        $("#imageModal").modal();
        $("#modal_image").attr("src", $("#" + id).attr("src"));
    }
</script>
