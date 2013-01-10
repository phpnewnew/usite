<?
print "--开始上传文件 --<br>";
if($fileStoreService->isFileExist($_POST['filename'])){
	$deleteResult = $fileStoreService->deleteFile($_POST['filename']);
}
$result1 = $fileStoreService->saveBinaryFile($_FILES['userfile']->getContent(),$_POST['filename']) ;
if($result1){
	print $_POST['filename'] . "上传文件成功！" "<br>";
}else{
	print $_POST['filename'] . "上传文件失败！" "<br>";
}
 ?>



