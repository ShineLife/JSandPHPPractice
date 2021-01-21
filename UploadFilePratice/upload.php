<?php
	for($i=0;$i< count($_FILES['file']['name']);$i++){
		$exten = '.'.pathinfo($_FILES['file']['name'][$i],PATHINFO_EXTENSION);
		$name = md5_file($_FILES['file']['tmp_name'][$i]);
		move_uploaded_file($_FILES['file']['tmp_name'][$i],"img/".$name.$exten);
		echo "img/".$name.$exten."<br>";
	}