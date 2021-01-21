<?php
if(isset($_POST['image'])){
    $_POST["image"] = str_replace("data:image/jpeg;base64,","",$_POST['image']);
    $img = imagecreatefromstring(base64_decode($_POST['image']));
    $file_name = "image/".microtime().".jpg";
    imagejpeg($img,$file_name);
    echo($file_name);
}



?>