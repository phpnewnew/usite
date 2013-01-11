
<?
  include("../../dao/item_dao.php");
  include("../../dao/sto_cat_dao.php");
  include("../../dao/sto_type_dao.php");
  
  $cats = $stoCatDAO->findCatsByWhere("where status=1");
  $ts = $stoTypeDAO->findTypesByWhere("where status =1 and parentid=0");
  
	$pagenum = isset($_GET['page'])?$_GET['page']:'0';
	$pagenum = intval($pagenum);
	$pagesize =20;
  
  //search param
  $sscatid = isset($_GET["sscatid"])?$_GET["sscatid"]:"";
  $sstypeid = isset($_GET["sstypeid"])?$_GET["sstypeid"]:"";
  $ssisrecommand = isset($_GET["ssisrecommand"])?$_GET["ssisrecommand"]:"";
  $ssishot = isset($_GET["ssishot"])?$_GET["ssishot"]:"";
  $ssnumiid = isset($_GET["ssnumiid"])?$_GET["ssnumiid"]:"";
  $ssseller = isset($_GET["ssseller"])?$_GET["ssseller"]:"";
  
  //edit and delete
  $fl = isset($_POST["submit"])?$_POST["submit"]:"";
  $delete  = isset($_POST["deletebtn"])?$_POST["deletebtn"]:"";
  if(strpos($fl,"edit")!==false)
  {

	$id = substr($fl,4);
	
	$model = $itemDAO->findItemById($id);
	if($model)
	{
		$buyurl = $model->buyurl;
		$seller = $model->seller;
		$status = $model->status;
	}
	
	$caption = isset($_POST["caption".$id])?$_POST["caption".$id]:"";
	$picurl = isset($_POST["picurl".$id])?$_POST["picurl".$id]:"";
	
	$catid = isset($_POST["catid".$id])?$_POST["catid".$id]:"";
	
	$displayorder = isset($_POST["displayorder".$id])?$_POST["displayorder".$id]:"";
	$price = isset($_POST["price".$id])?$_POST["price".$id]:"";
	$briefdesc = isset($_POST["briefdesc".$id])?$_POST["briefdesc".$id]:"";
	$typeid = isset($_POST["typeid".$id])?$_POST["typeid".$id]:"";
	$ishot = isset($_POST["ishot".$id])?$_POST["ishot".$id]:"0";
	$isnew = isset($_POST["isnew".$id])?$_POST["isnew".$id]:"0";
	$isrecommand = isset($_POST["isrecommand".$id])?$_POST["isrecommand".$id]:"0";
	$marketprice = isset($_POST["marketprice".$id])?$_POST["marketprice".$id]:"0";
	$begintime = isset($_POST["begintime".$id])?$_POST["begintime".$id]:"";
	$endtime = isset($_POST["endtime".$id])?$_POST["endtime".$id]:"";
	
	$ptmodel = $stoTypeDAO->findStoTypeById($typeid);
	if($ptmodel)
		$ptypeid = $ptmodel->parentid;
	
	$item = new Item();
	$item->id = $id;
	$item->caption = $caption;
	$item->picurl = $picurl;
	$item->buyurl = $buyurl;
	$item->catid = $catid;
	$item->status = $status;
	$item->seller = $seller;
	$item->displayorder = $displayorder;
	$item->price = $price;
	$item->briefdesc = $briefdesc;
	$item->typeid = $typeid;
	$item->ptypeid = $ptypeid;
	$item->ishot = $ishot;
	$item->isnew = $isnew;
	$item->isrecommand = $isrecommand;
	$item->marketprice = $marketprice;
	$item->begintime = $begintime;
	$item->endtime = $endtime;
	$itemDAO->updateItem($item);
	
	
	
	
  }
  //DELETE
  if(strpos($delete,"delete")!==false)
  {
	$id = substr($delete,6);
	
	$itemDAO->deleteItem($id);
  }
  
?>
<div style="background-color:#f1f1f1;padding:10px">
<div>
<?php
include("header.php");
?>

<form action="/d/admin/item_list" methos="GET">
<div>
	商品ID:<input type="text" name="ssnumiid" value="<?php echo $ssnumiid?>" />
	卖家:<input type="text" name="ssseller" value="<?php echo $ssseller?>" />
	风格:
	<select class="catselect" name="sscatid">
		<option value="">---</option>
		<?php
			foreach($cats  as $cat)
			{
				if($cat->id == $sscatid)
				{
					echo "<option value=".$cat->id." selected='true'>".$cat->catname."</option>";
				}
				else
				{
					echo "<option value=".$cat->id.">".$cat->catname."</option>";
				}
				
			}
		?>
	</select>
	分类：
	<select class="typeselect" name="sstypeid">
		<option value="">---</option>
		<?php
			foreach($ts  as $t)
			{
				if($t->id == $sstypeid)
				{
					echo "<option value=".$t->id." selected='true'>".$t->typename."</option>";
				}
				else
				{
					echo "<option value=".$t->id.">".$t->typename."</option>";
				}
				
			}
		?>
	</select>
	推荐:
	<select name="ssisrecommand">
		<option value="">---</option>
		<option value="1">是</option>
		<option value="0">否</option>
	</select>
	热销:
	<select name="ssishot">
		<option value="">---</option>
		<option value="1">是</option>
		<option value="0">否</option>
	</select>
	
	<input type="submit" value="搜索" />
	
</div>
</form>
<form action="/d/admin/item_list" method="POST">

<table style="line-height:30px;" class="admin_listtable">
<tr>
<td>修改</td>
<td>图片</td>
<td>标题</td>
<td>原价</td>
<td>价格</td>
<td>图片</td>
<td>属性</td>
<td>风格</td>
<td>分类</td>
<td>序号</td>
<td>开始</td>
<td>结束</td>
<td>描述</td>
</tr>
<?php
	$where ="where 1=1 ";
	if(strlen($sscatid)>0)
		$where.=" and catid=".$sscatid;
	if(strlen($sstypeid)>0)
		$where.=" and typeid=".$sstypeid;
	if(strlen($ssisrecommand)>0)
		$where.=" and isrecommand=".$ssisrecommand;
	if(strlen($ssishot)>0)
		$where.=" and ishot=".$ssishot;
	if(strlen($ssnumiid)>0)
		$where.=" and numiid='".$ssnumiid."'";
	if(strlen($ssseller)>0)
		$where.=" and seller='".$ssseller."'";
		
	//总数量
	$totalcount = $itemDAO->getCountByWhere($where);
	$totalcount = intval($totalcount);
	
	$where .=" order by displayorder,id desc limit ".$pagesize*$pagenum.",".$pagesize;
	$models = $itemDAO->findItemsByWhere($where);
	
	
	foreach($models as $model)
	{
	?>
		<tr>
			<td>
				<input type="submit" name="submit" value="edit<?php echo $model->id?>"/>
				<input type="submit" name="deletebtn" value="delete<?php echo $model->id?>"/>
			</td>
			<td><a href="<?php echo $model->buyurl?>" target="_blank"><img src="<?php echo $model->picurl?>" width="50px" height="50px" /></a></td>
			
			<td><input type="text" name="caption<?php echo $model->id?>" value="<?php echo $model->caption?>"/></td>
			<td><input type="text" class="txt50" name="marketprice<?php echo $model->id?>" value="<?php echo $model->marketprice?>"/></td>
			<td><input type="text" class="txt50" name="price<?php echo $model->id?>" value="<?php echo $model->price?>"/></td>
			
			<td><input type="text" name="picurl<?php echo $model->id?>" value="<?php echo $model->picurl?>"/></td>
			<td>
				<?php 
					if($model->ishot=="1")
						echo "<input type='checkbox' name='ishot".$model->id."' value='1' checked='true' />热销";
					else
						echo "<input type='checkbox' name='ishot".$model->id."' value='1' />热销";
					
					if($model->isnew=="1")
						echo "<input type='checkbox' name='isnew".$model->id."' value='1' checked='true' />新品";
					else
						echo "<input type='checkbox' name='isnew".$model->id."' value='1' />新品";
					
					if($model->isrecommand=="1")
						echo "<input type='checkbox' name='isrecommand".$model->id."' value='1' checked='true' />推荐";
					else
						echo "<input type='checkbox' name='isrecommand".$model->id."' value='1' />推荐";
					
				?>
			</td>
			<td>
				<select name="catid<?php echo $model->id?>">
				<?php
					$cats = $stoCatDAO->findCatsByWhere("where ptypeid=".$model->ptypeid);
					foreach($cats  as $cat)
					{
						if($cat->id == $model->catid)
						{
							echo "<option value=".$cat->id." selected='true'>".$cat->catname."</option>";
						}
						else
						{
							echo "<option value=".$cat->id.">".$cat->catname."</option>";
						}
						
					}
				?>
				</select>
			</td>
			<td>
				<select name="typeid<?php echo $model->id?>">
				<?php
					$ts = $stoTypeDAO->findTypesByWhere("where parentid=".$model->ptypeid);
					foreach($ts  as $t)
					{
						if($t->id == $model->typeid)
						{
							echo "<option value=".$t->id." selected='true'>".$t->typename."</option>";
						}
						else
						{
							echo "<option value=".$t->id.">".$t->typename."</option>";
						}
						
					}
				?>
				</select>
			</td>
		
			<td><input type="text" class="txt50"  name="displayorder<?php echo $model->id?>" value="<?php echo $model->displayorder?>"/></td>
			<td><input type="text" name="begintime<?php echo $model->id?>" value="<?php echo $model->begintime?>"/></td>
			<td><input type="text" name="endtime<?php echo $model->id?>" value="<?php echo $model->endtime?>"/></td>
			<td><input type="text" name="briefdesc<?php echo $model->id?>" value="<?php echo $model->briefdesc?>"/></td>
		</tr>
	<?php 
	}
?>
	
</table>
<div class="pagerlist" style="margin-top:10px">
	<div class="page-bottom tp">
		<?php 
			include("../includes/pager.php");
			$page = new Pager();
			
			$totalpage = ceil($totalcount/$pagesize);
			
			$param = "sscatid=".$sscatid."&sstypeid=".$sstypeid."&ssnumiid=".$ssnumiid."&ssisrecommand=".$ssisrecommand."&ssseller=".$ssseller."&ssishot=".$ssishot;
			$viewpage = $page->ViewPage($totalcount,$totalpage,$pagenum,$pagesize,$param,"/d/admin/item_list");
			echo $viewpage;
		?>
	</div>
</div>
</form>
</div>
</div>