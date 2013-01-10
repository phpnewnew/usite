
<?
  include("../../dao/shop_dao.php");
  include("../../dao/shop_cat_dao.php");
 
  
  $cats = $shopCatDAO->findShopCatsByWhere("");
 
  
	$pagenum = isset($_GET['page'])?$_GET['page']:'0';
	$pagenum = intval($pagenum);
	$pagesize =20;
  
  //search param
  $sscatid = isset($_GET["sscatid"])?$_GET["sscatid"]:"";

  $ssisrecommand = isset($_GET["ssisrecommand"])?$_GET["ssisrecommand"]:"";
 
  $ssstatus = isset($_GET["ssstatus"])?$_GET["ssstatus"]:"";
  $ssnick = isset($_GET["ssnick"])?$_GET["ssnick"]:"";
  
  //edit and delete
  $fl = isset($_POST["submit"])?$_POST["submit"]:"";
  $delete  = isset($_POST["deletebtn"])?$_POST["deletebtn"]:"";
  
  if(strpos($fl,"edit")!==false)
  {

	$id = substr($fl,4);
	
	
	
	$shopname = isset($_POST["shopname".$id])?$_POST["shopname".$id]:"";
	$picurl = isset($_POST["picurl".$id])?$_POST["picurl".$id]:"";
	$shoplogo = isset($_POST["shoplogo".$id])?$_POST["shoplogo".$id]:"";
	$catid = isset($_POST["catid".$id])?$_POST["catid".$id]:"";
	$displayorder = isset($_POST["displayorder".$id])?$_POST["displayorder".$id]:"";
	$briefdesc = isset($_POST["briefdesc".$id])?$_POST["briefdesc".$id]:"";
	$isrecommand = isset($_POST["isrecommand".$id])?$_POST["isrecommand".$id]:"0";
	$status = isset($_POST["status".$id])?$_POST["status".$id]:"0";
	$viewnum = isset($_POST["viewnum".$id])?$_POST["viewnum".$id]:"0";
	
	$item = new Shop();
	$item->id = $id;
	$item->shopname = $shopname;
	$item->picurl = $picurl;
	$item->shoplogo = $shoplogo;
	$item->catid = $catid;
	$item->status = $status;
	$item->briefdesc = $briefdesc;
	$item->displayorder = $displayorder;
	$item->viewnum = $viewnum;
	$item->isrecommand = $isrecommand;

	$shopDAO->updateItem($item);
	
	
	
  }
  //DELETE
  if(strpos($delete,"delete")!==false)
  {
	$id = substr($delete,6);
	
	$itemDAO->deleteItem($id);
  }
  
  //audit
  $audit = isset($_POST["audit"])?$_POST["audit"]:"";
  
  if($audit=="audit")
  {
	$ids = isset($_POST["checkbox[]"])?$_POST["checkbox[]"]:"";
	//var_dump($ids);
	foreach($ids as $id)
	{
		$id = addcslashes($id);
		
		
		$itemDAO->auditItem($id);
	}
	
  }
  
?>
<div style="background-color:#f1f1f1;padding:10px">
<div>
<?php
include("header.php");
?>

<form action="/d/admin/shop_list" method="GET">
<div>
	
	掌柜:<input type="text" name="ssnick" value="<?php echo $ssnick?>" />
	分类:
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
	
	状态:
	<select name="ssstatus">
		<option value="">---</option>
		<option value="1">通过</option>
		<option value="0">待审</option>
		<option value="2">拒绝</option>
	</select>
	推荐:
	<select name="ssisrecommand">
		<option value="">---</option>
		<option value="1">是</option>
		<option value="0">否</option>
	</select>
	
	
	<input type="submit" value="搜索" />
	
</div>
</form>
<form action="/d/admin/shop_list" method="POST">

<table style="line-height:30px;" class="admin_listtable">
<tr>
<td>修改</td>
<td>选择</td>
<td>logo</td>
<td>picurl</td>
<td>分类</td>
<td>卖家</td>
<td>店名</td>
<td>属性</td>
<td>序号</td>
<td>状态</td>
<td>浏览数</td>
<td>描述</td>
</tr>
<?php
	$where ="where 1=1 ";
	if(strlen($sscatid)>0)
		$where.=" and catid=".$sscatid;
	
	if(strlen($ssisrecommand)>0)
		$where.=" and isrecommand=".$ssisrecommand;
	
	if(strlen($ssstatus)>0)
		$where.=" and status='".$ssstatus."'";
	if(strlen($ssnick)>0)
		$where.=" and nick='".$ssnick."'";
		
	//总数量
	$totalcount = $shopDAO->getCountByWhere($where);
	$totalcount = intval($totalcount);
	
	$where .=" order by displayorder,id desc limit ".$pagesize*$pagenum.",".$pagesize;
	$models = $shopDAO->findShopsByWhere($where);
	
	
	foreach($models as $model)
	{
	?>
		<tr>
			<td>
				<input type="submit" name="submit" value="edit<?php echo $model->id?>"/>
				<input type="submit" name="deletebtn" value="delete<?php echo $model->id?>"/>
			</td>
			<td>
				<input type="checkbox" name="checkbox[]" value="<?php echo $model->id?>" /> 
			</td>
			<td><input type="text" name="shoplogo<?php echo $model->id?>" value="<?php echo $model->shoplogo?>"/></td>
			<td><input type="text" name="picurl<?php echo $model->id?>" value="<?php echo $model->picurl?>"/></td>
			<td>
				<select name="catid<?php echo $model->id?>">
				<?php
					
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
			<td><?php echo $model->nick?></td>
			<td><input type="text" name="shopname<?php echo $model->id?>" value="<?php echo $model->shopname?>"/></td>
		
			
			<td>
				<?php 
					
					
					if($model->isrecommand=="1")
						echo "<input type='checkbox' name='isrecommand".$model->id."' value='1' checked='true' />推荐";
					else
						echo "<input type='checkbox' name='isrecommand".$model->id."' value='1' />推荐";
					
				?>
			</td>
			
			
			<td><input type="text" class="txt50"  name="displayorder<?php echo $model->id?>" value="<?php echo $model->displayorder?>"/></td>
			<td><input type="text" class="txt50" name="status<?php echo $model->id?>" value="<?php echo intval($model->status)?>"/></td>
			<td><input type="text" class="txt50" name="viewnum<?php echo $model->id?>" value="<?php echo intval($model->viewnum)?>"/></td>
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
			
			$param = "ssstatus=".$ssstatus."&sscatid=".$sscatid."&ssnick=".$ssnick."&ssisrecommand=".$ssisrecommand;
			$viewpage = $page->ViewPage($totalcount,$totalpage,$pagenum,$pagesize,$param,"/d/admin/shop_list");
			echo $viewpage;
		?>
	</div>
</div>
</form>
</div>
</div>