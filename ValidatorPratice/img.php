<?php
	$img = imagecreate(30,30);
	imagecolorallocate($img,255,255,255);
	$black = imagecolorallocate($img,0,0,0);
	imagestring($img,5,10,8,$_GET['id'],$black);
	header("Content-Type:image/png");
	imagepng($img);
	imagedestroy($img);