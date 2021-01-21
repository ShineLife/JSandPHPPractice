<?php
$sql = new PDO("mysql:host=127.0.0.1;dbname=temperature;charset=utf8;", "phpmyadmin", "1234");
$sql->query("insert into temperature values(0,".$_GET['max'].",CURRENT_TIMESTAMP(),'')")->FetchAll();
?>