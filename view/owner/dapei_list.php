
<?
  include("../../dao/dapei_dao.php");
  include("../../dao/sto_cat_dao.php");
  $cats = $stoCatDAO->findCatsByWhere("");
  
  $edit = isset($_POST["edit"])?$_POST["edit"]:"";
  $delete  = isset($_POST["delete"])?$_POST["delete"]:"";
  if(strpos($edit,"edit")!==false)
  {

	$id = substr($edit,4);
	
	$model = $daPeiDAO->findById($id);
	{
		
	}
	
	$fid = isset($_POST["fid".$id])?$_POST["fid".$id]:"";
	$caption = isset($_POST["caption".$id])?$_POST["caption".$id]:"";

	$orderno = isset($_POST["orderno".$id])?$_POST["orderno".$id]:"";
	
	$briefdesc = isset($_POST["briefdesc".$id])?$_POST["briefdesc".$id]:"";
	$begindate = isset($_POST["begindate".$id])?$_POST["begindate".$id]:"";
	$enddate = isset($_POST["enddate".$id])?$_POST["enddate".$id]:"0";

	$isrecommand = isset($_POST["isrecommand".$id])?$_POST["isrecommand".$id]:"0";
	
	$item = new DaPei();
	$item->id = $id;
	$item->fid = $fid;
	$item->caption = $caption;
	$item->begindate = $begindate;
	$item->enddate = $enddate;
	$item->orderno = $orderno;

	$item->briefdesc = $briefdesc;

	$item->isrecommand = $isrecommand;
	
	$daPeiDAO->updateDaPei($item);
	
	
	
	
  }
  //DELETE
  if(strpos($delete,"delete")!==false)
  {
	$id = substr($delete,6);
	
	$daPeiDAO->deleteItem($id);
  }

  
?>
<div style="background-color:#f1f1f1;padding:10px">
<div>
<?php
include("header.php");
?>


<form action="/d/admin/dapei_list" method="POST">

<table style="line-height:30px;">
<tr>
<td>风格</td>
<td>标题</td>
<td>开始时间</td>
<td>结束时间</td>
<td>推荐</td>
<td>序号</td>
<td>推荐理由</td>
<td>操作</td>
</tr>
<?php
	$where ="where status=1 ";
	
	$models = $daPeiDAO->findAllByWhere($where." order by orderno");
	
	foreach($models as $model)
	{
	?>
		<tr>
			<td>
				<select name="fid<?php echo $model->id?>">
				<?php
					foreach($cats  as $cat)
					{
						if($cat->id == $model->fid)
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
				
				<input type="text" name="caption<?php echo $model->id?>" value="<?php echo $model->caption?>"/>
			</td>
			<td>
				
				<input type="text" name="begindate<?php echo $model->id?>" value="<?php echo $model->begindate?>"/>
			</td>
			<td>
				
				<input type="text" name="enddate<?php echo $model->id?>" value="<?php echo $model->enddate?>"/>
			</td>
			<td>
				<?php 
					if($model->isrecommand=="1")
						echo "<input type='checkbox' name='isrecommand".$model->id."' value='1' checked='true' />推荐";
					else
						echo "<input type='checkbox' name='isrecommand".$model->id."' value='0' />推荐";
				?>
			</td>
			<td>
				
				<input type="text" name="orderno<?php echo $model->id?>" value="<?php echo $model->orderno?>"/>
			</td>
			<td>
				<input type="text" name="briefdesc<?php echo $model->id?>" value="<?php echo $model->briefdesc?>"/>
			</td>
			<td>
				<a href="/d/admin/dapei_detail?id=<?php echo $model->id?>">查看</a>
				<input type="submit" name="edit" value="edit<?php echo $model->id?>" />
				<input type="submit" name="delete" value="delete<?php echo $model->id?>" />
			</td>
			
		</tr>
	<?php 
	}
?>
	
</table>
</form>
</div>
</div>