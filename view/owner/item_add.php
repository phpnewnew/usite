
<?
  include("../../dao/item_dao.php");
  include("../../dao/sto_cat_dao.php");
  include("../../dao/sto_type_dao.php");
  
  include("../../top/topclient.php");
  include("../../top/ItemGetRequest.php");
  
  $fl = isset($_POST["submit"])?$_POST["submit"]:"";
  $topbtn = isset($_POST["topbtn"])?$_POST["topbtn"]:"";
  
  $_caption= "";
  $_picurl ="";
  $_numiid= "";
  $_buyurl= "";
  $_nick ="";
  $_price ="";
  $_begintime = date('Y-m-d 0:0:0');
  $_endtime = date('Y-m-d 23:59:59',strtotime('14 day'));
  if($topbtn=="apiget")
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
  
  if($fl=="submit")
  {
	
  
	$caption = isset($_POST["caption"])?$_POST["caption"]:"";
	$numiid = isset($_POST["numiid"])?$_POST["numiid"]:"";
	$picurl = isset($_POST["picurl"])?$_POST["picurl"]:"";
	$buyurl = isset($_POST["buyurl"])?$_POST["buyurl"]:"";
	$catid = isset($_POST["catid"])?$_POST["catid"]:"";
	$seller = isset($_POST["seller"])?$_POST["seller"]:"";
	$displayorder = isset($_POST["displayorder"])?$_POST["displayorder"]:"";
	$typeid = isset($_POST["typeid"])?$_POST["typeid"]:"";
	$price = isset($_POST["price"])?$_POST["price"]:"";
	$briefdesc = isset($_POST["briefdesc"])?$_POST["briefdesc"]:"";
	$ishot = isset($_POST["ishot"])?$_POST["ishot"]:"0";
	$isnew = isset($_POST["isnew"])?$_POST["isnew"]:"0";
	$isrecommand = isset($_POST["isrecommand"])?$_POST["isrecommand"]:"0";
	$ptypeid = isset($_POST["ptypeid"])?$_POST["ptypeid"]:"";
	$marketprice = isset($_POST["marketprice"])?$_POST["marketprice"]:"";
	$begintime = isset($_POST["begintime"])?$_POST["begintime"]:"";
	$endtime = isset($_POST["endtime"])?$_POST["endtime"]:"";
	
	$item = new Item();
	$item->numiid = $numiid;
	$item->caption = $caption;
	$item->picurl = $picurl;
	$item->buyurl = $buyurl;
	$item->catid = $catid;
	$item->ptypeid = $ptypeid;
	$item->typeid = $typeid;
	$item->status = "1";
	$item->lovenum = "0";
	$item->createtime = date('Y-m-d H:i:s');
	$item->seller = $seller;
	$item->displayorder = $displayorder;
	$item->price = $price;
	$item->briefdesc = $briefdesc;
	$item->ishot = $ishot;
	$item->isnew = $isnew;
	$item->isrecommand = $isrecommand;
	$item->marketprice = $marketprice;
	$item->begintime = $begintime;
	$item->endtime = $endtime;
	$item->source = "1";
	
	$id = $itemDAO->createItem($item);
	
	echo $id;
	
	
  }
  
?>
<div>
<div class="content">
<?php
include("header.php");
?>

<input type="hidden" class="domain" value="<?php echo $_taeServer?>" />
<form action="/d/admin/item_add" method="POST">
<table style="line-height:30px;">
<tr>
<td>ID：</td>
<td>
	<input type="text" name="numiid" value="<?php echo $_numiid?>"  />
	<input type="submit" name="topbtn" value="apiget"   />
</td>
</tr>
<tr>
<td>标题：</td>
<td>
	<input type="text" name="caption"  value="<?php echo $_caption?>" style="width:400px"/>
</td>
</tr>
<tr>
<td>市场价格</td>
<td>
	<input type="text" name="marketprice"  value="<?php echo $_price?>" />
</td>
</tr>
<tr>
<td>活动价格</td>
<td>
	<input type="text" name="price"  value="<?php echo $_price?>" />
</td>
</tr>
<tr>
<td>卖家</td>
<td>
	<input type="text" name="seller" value="<?php echo $_nick?>"  />
</td>
</tr>
<tr>
<td>图片：</td>
<td>
	<input type="text" name="picurl" value="<?php echo $_picurl?>" style="width:400px" />
	<img src="<?php echo $_picurl?>" width="50px" height="50px" />
</td>
</tr>
<tr>
<td>链接：</td>
<td>
	<input type="text" name="buyurl" value="<?php echo $_buyurl?>" style="width:400px" />
	<a href="<?php echo $_buyurl?>" target="_blank">查看商品</a>
</td>
</tr>
<tr>
<td>一级分类：</td>
<td>
	<select class="ptype" name="ptypeid">
		<option value="">---</option>
		<?php
			$cs = $stoTypeDAO->findTypesByWhere("where parentid=0");
			foreach($cs as $c)
			{
				echo "<option value=".$c->id.">".$c->typename."</option>";
			}
		?>
	</select>
</td>
</tr>
<tr>
<td>二级分类：</td>
<td>
	<select class="type2" name="typeid">
		<option value="">---</option>
		<?php
			$cs = $stoTypeDAO->findTypesByWhere("where parentid<>0");
			foreach($cs as $c)
			{
				echo "<option value=".$c->id.">".$c->typename."</option>";
			}
		?>
	</select>
</td>
</tr>
<tr>
<td>风格：</td>
<td>
	<select class="cat" name="catid">
		<option value="">---</option>
		<?php
			$cs = $stoCatDAO->findCatsByWhere("");
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
<td>开始日期</td>
<td>
	<input type="text" name="begintime" value="<?php echo $_begintime?>"  />
</td>
</tr>
<tr>
<td>结束日期</td>
<td>
	<input type="text" name="endtime" value="<?php echo $_endtime?>"  />
</td>
</tr>
<tr>
<td>描述</td>
<td>
	<textarea style="width:400px" name="briefdesc"></textarea>
</td>
</tr>
<tr>
<td>属性</td>
<td>
	<input type="checkbox" name="ishot" value="1" />热销
	<input type="checkbox" name="isnew" value="1" />新品
	<input type="checkbox" name="isrecommand" value="1" />推荐
</td>
</tr>
<tr>
<td></td>
<td>
	
	<input type="submit" name="submit" value="submit"   />
</td>
</tr>

</table>
</form>
</div>
</div>
<script src="/assets/javascripts/item_add.js"></script>