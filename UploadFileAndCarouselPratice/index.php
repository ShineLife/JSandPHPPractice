<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上傳多檔案</title>
<script src="../jquery.min.js"></script>
</head>
<script>
	$(function(){
		var imgary = [];
		$("#file").on('change',function(event){
			event.preventDefault();
			for(var i = 0;i<this.files.length;i++){
				var formd = new FormData();
				formd.append("file",this.files[i]);
				$.ajax({
					url:"upload.php",
					data:formd,
					type:"POST",
					processData:false,
					cache:false,
					contentType:false,
					success:function(data){
						imgary.push(data);
					}
				});
			}
		})
		$("#btn_reset").click(function(){
			imgary = [];
		})
		function SetTime(){
			console.log(imgary);
			if(imgary.length > 0){
				var rndnum = Math.floor((Math.random() * imgary.length));
				console.log(rndnum);
				console.log(imgary);
				$("#img").attr('src',imgary[rndnum]);
			}
			Fade();
			setTimeout(SetTime,6000);
		}
		function Slide(){
			$("#img").slideDown(3000);
			$("#img").slideUp(3000);
		}
		function Fade(){
			$("#img").fadeIn(3000);
			$("#img").fadeOut(3000);
		}
		SetTime();
		setTimeout(SetTime,6000);
	})
</script>
<body>
	<input type="file" multiple id="file">
	<input type="button" id="btn_reset" value="重設圖片">
	<br>
	<img id="img" style="width:500px;height:500px;">
</body>
</html>
