<?php
	session_start();
	$_SESSION['checkcode'] = "";
	$array = range(1,9);
	shuffle($array);
	for($i = 0;$i<9;$i++){
		if($array[$i] % 3 == 0){
			$_SESSION['checkcode'] .= "1";
		}else{
			$_SESSION['checkcode'] .= "0";
		}
	}
	echo(join('',$array));