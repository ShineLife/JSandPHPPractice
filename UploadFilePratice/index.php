<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上傳多檔案</title>
<script src="../jquery.min.js"></script>
</head>
<script>
	function sub(){
		$("#form").ajaxSubmit(function(){});
		return false;
	}
</script>
<body>
	<form id="form" enctype="multipart/form-data" action="upload.php" method="POST" onsubmit="return sub()">
		<input type="file" multiple name="file[]" id="file">
		<input type="submit" value="Upload">
	</form>
</body>
</html>
