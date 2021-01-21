<?php
		$exten = '.'.pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
		$name = md5_file($_FILES['file']['tmp_name']);
		move_uploaded_file($_FILES['file']['tmp_name'],"img/".$name.$exten);
		echo "img/".$name.$exten;