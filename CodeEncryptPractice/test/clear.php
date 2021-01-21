<?php
$sql = new PDO("mysql:host=127.0.0.1;dbname=temperature;charset=utf8;", "phpmyadmin", "1234");
$sql->query("delete from temperature where TIMESTAMPDIFF(MINUTE,date,now()) >= 2")->FetchAll();
?>