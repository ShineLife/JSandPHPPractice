<?php
	session_start();
	if($_GET['answer']){
		if($_GET['answer'] == $_SESSION['checkcode']){
			echo true;
		}else{
			echo false;
		}
	}else{
		echo false;
	}