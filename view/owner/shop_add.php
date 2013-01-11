<?
  include("../../dao/shop_dao.php");
  include("../../dao/shop_cat_dao.php");
  
  include("../../top/topclient.php");
  include("../../top/ShopGetRequest.php");
  
  $fl = isset($_POST["submit"])?$_POST["submit"]:"";
  $topbtn = isset($_POST["topbtn"])?$_POST["topbtn"]:"";
  
  $_shopname= "";
  $_sid ="";
  $_picurl= "";
  $_nick ="";

  
  if($topbtn=="apiget")
  {
		$nick = isset($_POST["nick"])?$_POST["nick"]:"";
		if(strlen($nick)>0)
		{
			$c = new TopClient;
			


			//实例化具体API对应的Request类
			$req = new ShopGetRequest();      //top 封装的php文件
			$req->setFields("sid,nick,title,pic_path");
			$req->setNick(htmlspecialchars($nick));
			$resp = $c->execute($req);   
			
			
			$item =$resp->shop;
			$_shopname = $item->title;
			$_sid = $item->sid;
			$_picurl = "http://logo.taobao.com/shop-logo".$item->pic_path;
	
			$_nick =$item->nick;
			
		}
		
  }
  
  if($fl=="submit")
  {
	
  
	$sid = isset($_POST["sid"])?$_POST["sid"]:"";
	$nick = isset($_POST["nick"])?$_POST["nick"]:"";
	$shoplogo = isset($_POST["shoplogo"])?$_POST["shoplogo"]:"";
	$picurl = isset($_POST["picurl"])?$_POST["picurl"]:"";
	$title = isset($_POST["shopname"])?$_POST["shopname"]:"";
	$catid = isset($_POST["catid"])?$_POST["catid"]:"";
	
	$displayorder = isset($_POST["displayorder"])?$_POST["displayorder"]:"";
	
	$briefdesc = isset($_POST["briefdesc"])?$_POST["briefdesc"]:"";
	
	$item = new Shop();
	$item->sid = $sid;
	$item->shopname = $title;
	$item->shoplogo = $shoplogo;
	$item->picurl = $picurl;
	$item->shopurl = "http://shop".$sid.".taobao.com";
	$item->catid = $catid;
	$item->nick = $nick;
	$item->status = "1";
	$item->isrecommand = "0";
	$item->lovenum = "0";
	$item->createtime = date('Y-m-d H:i:s');

	$item->displayorder = $displayorder;
	$item->briefdesc = $briefdesc;
	$id = $shopDAO->createShop($item);
	
	echo $id;
	
	
  }
  
?>
<div style="background-color:#f1f1f1;padding:10px">
<div>
<?php
include("header.php");
?>
<form action="/d/admin/shop_add" method="POST">
<table style="line-height:30px;">


<tr>
<td>掌柜：</td>
<td>
	<input type="text" name="nick"  value="<?php echo $_nick?>" />
	<input type="submit" name="topbtn" value="apiget"   />
</td>
</tr>

<tr>
<td>商店名称：</td>
<td>
	<input type="text" name="shopname" value="<?php echo $_shopname?>"  />
</td>
</tr>

<tr>
<td>商店名称：</td>
<td>
	<input type="text" name="sid" value="<?php echo $_sid?>"  />
</td>
</tr>

<tr>
<td>Logo图片：</td>
<td>
	<input type="text" name="shoplogo" value="<?php echo $_picurl?>"  />
	<img src="<?php echo $_picurl?>" width="50px" height="50px"/>
</td>
</tr>

<tr>
<td>宣传图片：</td>
<td>
	<input type="text" name="picurl"  />
</td>
</tr>

<tr>
<td>分类：</td>
<td>
	<select name="catid">
		<?php
			$cs = $shopCatDAO->findShopCatsByWhere("");
			foreach($cs as $c)
			{
				echo "<option value=".$c->id.">".$c->catname."</option>";
			}
		?>
	</select>
</td>
</tr>

<tr>
<td>序号</td>
<td>
	<input type="text" name="displayorder" value="1000"  />
</td>
</tr>
<tr>
<td>品牌故事</td>
<td>
	<textarea name="briefdesc" style="width:400px;"></textarea>
</td>
</tr>
<tr>
<td></td>
<td>
	
	<input type="submit" name="submit" value="submit"   />
</td>
</tr>
<tr>
</table>
</div>
</div>