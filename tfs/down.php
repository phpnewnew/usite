<?

if($fileStoreService->isFileExist($_POST['filename'])){
$result1 = $fileStoreService->getBinaryFile($_POST['filename']) ;
header('Content-Description: File Transfer'); 
header('Content-Type: application/octet-stream'); 
header('Content-Disposition: attachment; filename='.urlencode_utf8($_POST['filename']) );
header('Content-Transfer-Encoding: binary'); 
header('Expires: 0'); 
header('Cache-Control: must-revalidate, post-check=0, pre-check=0'); 
header('Pragma: public');  
echo $result1;
}else{
echo "文件不存在，请确定文件路径是否正确！";
}
?>