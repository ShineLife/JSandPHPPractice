<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上傳多檔案</title>
<script src="../jquery.min.js"></script>
<script src="../bootstrap.min.js"></script>
<link rel="stylesheet" href="../bootstrap.min.css">
<link rel="stylesheet" href="../bootstrap-responsive.min.css">
<style>
	.item{
		width:100%;
		height:500px;
	}
</style>
</head>
<script>
	$(function(){
		$('.carousel').carousel({
			interval:"2000"
		});
	})
</script>
<body>
	<div id="myCarousel" class="carousel slide">
	  <!-- Carousel items -->
		 <div class="carousel-inner">
			<div class="active item">
				<img src="img/1.jpg" style="width:100%;height:100%;">
			</div>
			<div class="item">
				<img src="img/12321.jpg" style="width:100%;height:100%;">
			</div>
			<div class="item">
				<img src="img/images.jpg" style="width:100%;height:100%;">
			</div>
		 </div>
	</div>
</body>
</html>
