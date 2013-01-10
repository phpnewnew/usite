<?
	
  include("../../dao/dapei_item_dao.php");
  include("../../dao/dapei_dao.php");
  //top api
  include("../../top/topclient.php");
  include("../../top/ItemGetRequest.php");
  
  $id = isset($_GET["id"])?$_GET["id"]:"";
	
  $id = htmlspecialchars($id);

  
  $create = isset($_POST["create"])?$_POST["create"]:"";
  $apibtn = isset($_POST["getapi"])?$_POST["getapi"]:"";
  $delete = isset($_POST["delete"])?$_POST["delete"]:"";
  //get item from taobao
  $_caption= "";
  $_picurl ="";
  $_numiid= "";
  $_buyurl= "";
  $_nick ="";
  $_price ="";
  if($apibtn=="getapi")
  {
		$numiid = isset($_POST["numiid"])?$_POST["numiid"]:"";
		if(strlen($numiid)>0)
		{
			$c = new TopClient;
			


			//实例化具体API对应的Request类
			$req = new ItemGetRequest();      //top 封装的php文件
			$req->setFields("num_iid,nick,price,title,pic_url,detail_url");
			$req->setNumIid($numiid);
			$resp = $c->execute($req);   
			
			
			$item =$resp->item;
			$_numiid = $item->num_iid;
			$_caption = $item->title;
			$_picurl = $item->pic_url."_310x310.jpg";
			$_buyurl = $item->detail_url;
			$_nick =$item->nick;
			$_price =$item->price;
		}
		
  }
  //create
  if($create=="create")
  {
	
	$dpid = isset($_POST["id"])?$_POST["id"]:"";
	$numiid = isset($_POST["numiid"])?$_POST["numiid"]:"";
	
	$caption = isset($_POST["caption"])?$_POST["caption"]:"";
	
	$buyurl = isset($_POST["buyurl"])?$_POST["buyurl"]:"";
	$picurl = isset($_POST["picurl"])?$_POST["picurl"]:"";
	$orderno = isset($_POST["orderno"])?$_POST["orderno"]:"";
	$price = isset($_POST["price"])?$_POST["price"]:"";

	$item = new DaPeiItem();
	$item->dpid = $dpid;
	$item->numiid = $numiid;
	$item->caption = $caption;
	$item->buyurl = $buyurl;
	$item->picurl = $picurl;
	$item->orderno = $orderno;
	$item->price = $price;
	$rtnid = $daPeiItemDAO->createDaPeiItem($item);

  }
  
  
  //DELETE
  if(strpos($delete,"delete")!==false)
  {
	$pk = substr($delete,6);
	
	$daPeiItemDAO->deleteItem($pk);
  }
  
?>
<div>
<div class="content">
<?php
include("header.php");
?>
<form action="/d/admin/dapei_detail?id=<?php echo $id?>" method="POST">
<table style="line-height:30px;">
<tr>
<td>商品ID</td>
<td>图片</td>
<td>商品名称</td>
<td>商品链接</td>
<td>价格</td>
<td>序号</td>
<td>操作</td>
</tr>
<tr>
<td>
	<input type="text" name="numiid" style="width:100px" value="<?php echo $_numiid?>" />
	<input type="submit" name="getapi" value="getapi" />
</td>
<td>
	<img src="<?php echo $_picurl?>" width="50px" height="50px"/>
	<input type="hidden" name="picurl" value="<?php echo $_picurl?>"/>
</td>
<td>
	<input type="text" name="caption" style="width:150px" value="<?php echo $_caption?>"/>
</td>
<td>
	<input type="text" name="buyurl" style="width:150px" value="<?php echo $_buyurl?>"/>
</td>
<td>
	<input type="text" name="price" value="<?php echo $_price?>"  />
</td>
<td>
	<input type="text" name="orderno" value="1000"  />
</td>



<td>
	<input type="submit" name="create" value="create"   />
</td>
</tr>
<?php 
	$cs  = $daPeiItemDAO->findAllByWhere("where dpid='".$id."' order by orderno");
	foreach($cs as $c)
	{
?>
	<tr>
		<td><?php echo $c->numiid?></td>
		<td><img src="<?php echo $c->picurl?>" width="50px" height="50px"/></td>
		<td><?php echo $c->caption?></td>
		<td><?php echo $c->buyurl?></td>
		<td><?php echo $c->price?></td>
		<td><?php echo $c->orderno?></td>
		<td>
			<input type="submit" name="delete" value="delete<?php echo $c->id?>"   />
		</td>
	</tr>
<?php 	
	}
	
?>

</table>
</div>
</div>