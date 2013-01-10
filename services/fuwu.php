
 <?
print "服务测试： <br>";
print "context:" . $context->getBrowser() . "<br>";
print "tair测试： <br>";
print "tair set 方法:" . $cacheService->set("121","2323",12) . "<br>";
print "tair get 方法:" . $cacheService->get("121") . "<br>";
print "************************************ <br>";
print "TFS测试： <br>";
$result1 = $fileStoreService->saveTextFile("ssssssssssss","/tfs/test2.txt") ;
if($result1){
	print "success";
}
print "TFS saveTextFile 方法:" . $result1 . "<br>";
$result2 = $fileStoreService->getFileText("/tfs/test2.txt") . "<br>";
print "TFS getFileText方法:" . $result2 . "<br>";
print "************************************ <br>";
print "log测试： <br>";
$appLog->info("infolog");
$appLog->warn("infolog");
$appLog->error("infolog");
print "************************************ <br>";
print "mysql测试： <br>";
$db = new PDO();
$count = $db->exec("INSERT INTO `test6` (`id`, `name`, `time`, `price`, `description`) VALUES (22, 'sdshdso22', '15:31:36', 1.2, NULL);");
print "mysql测试：exec insert success" .$count ."<br>" ;
/**
$dbms='mysql';     //数据库类型 Oracle 用ODI,对于开发者来说，使用不同的数据库，只要改这个，不用记住那么多的函数了
$host='10.232.31.142'; //数据库主机名
$dbName='tae';    //使用的数据库
$user='tae';      //数据库连接用户名
$pass='tae';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";
 try {
    $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象，就是创建了数据库连接对象$dbh
    print "连接成功<br/>";
    //你还可以进行一次搜索操作
    foreach ($dbh->query('select * from `tae_app_versions` where app_id=9954') as $row) {
        print_r($row); //你可以用 echo($GLOBAL); 来看到这些值
    }
    
    $dbh = null;
} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}
**/
//$smarty = new Smarty();

//$smarty->display("templates/view.tpl");

 ?>



