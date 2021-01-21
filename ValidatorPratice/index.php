<!DocType html>
<html lang="en">
<head>
<title>圖片驗證</title>
<script src="../jquery.min.js"></script>
</head>
<script>
	$(function(){
		$("#btn_new").click(function(){
			$.get("rand.php",function(data){
				data = data.split('');
				for(var i = 1;i<=9;i++){
					$("#cimg"+i).attr('src','img.php?id='+data[i-1]);
				}
			});
			
		}).click();
		$("#btn_send").click(function(){
			var text = "";
			for(var i = 1;i<=9;i++){
					text += $("#cimg"+i).attr('sma');
			}
			$.get("check.php",{answer:text},function(data){
				if(data){
					alert("Correct!");
				}else{
					alert("Wrong!");
				}
			})
		})
		$(".checkimg").click(function(){
			if($(this).attr('sma') == 0){
				$(this).attr('sma',1);
				$(this).parent().css('border-color','red');
			}else{
				$(this).attr('sma',0);
				$(this).parent().css('border-color','black');
			}
		})
	});
</script>
<body>
	<div id="space2">
		<div style="display:inline-block;width:50px;height:50px;border:1px solid black;">
			<img class="checkimg" sma="0" width="99%" height="99%" id="cimg1">
		</div>
		<div style="display:inline-block;width:50px;height:50px;border:1px solid black;">
			<img class="checkimg" sma="0" width="99%" height="99%" id="cimg2">
		</div>
		<div style="display:inline-block;width:50px;height:50px;border:1px solid black;">
			<img class="checkimg" sma="0" width="99%" height="99%" id="cimg3">
		</div>
		<br>
		<div style="display:inline-block;width:50px;height:50px;border:1px solid black;">
			<img class="checkimg" sma="0" width="99%" height="99%" id="cimg4">
		</div>
		<div style="display:inline-block;width:50px;height:50px;border:1px solid black;">
			<img class="checkimg" sma="0" width="99%" height="99%" id="cimg5">
		</div>
		<div style="display:inline-block;width:50px;height:50px;border:1px solid black;">
			<img class="checkimg" sma="0" width="99%" height="99%" id="cimg6">
		</div>
		<br>
		<div style="display:inline-block;width:50px;height:50px;border:1px solid black;">
			<img class="checkimg" sma="0" width="99%" height="99%" id="cimg7">
		</div>
		<div style="display:inline-block;width:50px;height:50px;border:1px solid black;">
			<img class="checkimg" sma="0" width="99%" height="99%" id="cimg8">
		</div>
		<div style="display:inline-block;width:50px;height:50px;border:1px solid black;">
			<img class="checkimg" sma="0" width="99%" height="99%" id="cimg9">
		</div>
		<br>
	</div>
	<h3>請選擇3的倍數</h3>
	<input type="button" id="btn_send" value="送出">
	<input type="button" id="btn_new" value="驗證碼重新產生">
</body>
</html>