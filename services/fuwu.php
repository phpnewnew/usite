
 <?
print "������ԣ� <br>";
print "context:" . $context->getBrowser() . "<br>";
print "tair���ԣ� <br>";
print "tair set ����:" . $cacheService->set("121","2323",12) . "<br>";
print "tair get ����:" . $cacheService->get("121") . "<br>";
print "************************************ <br>";
print "TFS���ԣ� <br>";
$result1 = $fileStoreService->saveTextFile("ssssssssssss","/tfs/test2.txt") ;
if($result1){
	print "success";
}
print "TFS saveTextFile ����:" . $result1 . "<br>";
$result2 = $fileStoreService->getFileText("/tfs/test2.txt") . "<br>";
print "TFS getFileText����:" . $result2 . "<br>";
print "************************************ <br>";
print "log���ԣ� <br>";
$appLog->info("infolog");
$appLog->warn("infolog");
$appLog->error("infolog");
print "************************************ <br>";
print "mysql���ԣ� <br>";
$db = new PDO();
$count = $db->exec("INSERT INTO `test6` (`id`, `name`, `time`, `price`, `description`) VALUES (22, 'sdshdso22', '15:31:36', 1.2, NULL);");
print "mysql���ԣ�exec insert success" .$count ."<br>" ;
/**
$dbms='mysql';     //���ݿ����� Oracle ��ODI,���ڿ�������˵��ʹ�ò�ͬ�����ݿ⣬ֻҪ����������ü�ס��ô��ĺ�����
$host='10.232.31.142'; //���ݿ�������
$dbName='tae';    //ʹ�õ����ݿ�
$user='tae';      //���ݿ������û���
$pass='tae';          //��Ӧ������
$dsn="$dbms:host=$host;dbname=$dbName";
 try {
    $dbh = new PDO($dsn, $user, $pass); //��ʼ��һ��PDO���󣬾��Ǵ��������ݿ����Ӷ���$dbh
    print "���ӳɹ�<br/>";
    //�㻹���Խ���һ����������
    foreach ($dbh->query('select * from `tae_app_versions` where app_id=9954') as $row) {
        print_r($row); //������� echo($GLOBAL); ��������Щֵ
    }
    
    $dbh = null;
} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}
**/
//$smarty = new Smarty();

//$smarty->display("templates/view.tpl");

 ?>



