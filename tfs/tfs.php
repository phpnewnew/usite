<html>

	<form enctype="multipart/form-data" action="/tfs/upload.php" method="POST">
		<!-- MAX_FILE_SIZE must precede the file input field -->
		<input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
		<!-- Name of input element determines name in $_FILES array -->
		上传文件: 
		<br/>
		<label>请输入文件路径:</label>
		<input name="filename" type="text" />
		<input name="userfile" type="file" />
		<br>
		<input class="button" type="submit" value="上传" />
	</form>
	<br>
	<br>
	<form action="/tfs/down.php" method="POST">
		下载文件: 
		<br>
		<label>请输入文件路径:</label>
		<input name="filename" type="text" />
		<br>
		<input class="button" type="submit" value="下载" />
		
	</form>
</html>


