<?
print "--��ʼ�ϴ��ļ� --<br>";
if($fileStoreService->isFileExist($_POST['filename'])){
	$deleteResult = $fileStoreService->deleteFile($_POST['filename']);
}
$result1 = $fileStoreService->saveBinaryFile($_FILES['userfile']->getContent(),$_POST['filename']) ;
if($result1){
	print $_POST['filename'] . "�ϴ��ļ��ɹ���" "<br>";
}else{
	print $_POST['filename'] . "�ϴ��ļ�ʧ�ܣ�" "<br>";
}
 ?>



