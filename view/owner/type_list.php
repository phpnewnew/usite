
<?

  include("../../dao/sto_type_dao.php");
  
  $create = isset($_POST["create"])?$_POST["create"]:"";
  if($create=="create")
  {
	$tname = isset($_POST["typename"])?$_POST["typename"]:"";
	$pid = isset($_POST["parentid"])?$_POST["parentid"]:"0";
	
	$tm = new StoType();
	$tm->typename = $tname;
	$tm->parentid = $pid;
	$tm->status="1";
	
	$pkid = $stoTypeDAO->createType($tm);
	
  }
  
  
  //edit and delete
  $fl = isset($_POST["submit"])?$_POST["submit"]:"";
  $delete  = isset($_POST["deletebtn"])?$_POST["deletebtn"]:"";
  if(strpos($fl,"edit")!==false)
  {

	$id = substr($fl,4);
	
	$model = $stoTypeDAO->findStoTypeById($id);
	
	
	$typename = isset($_POST["typename".$id])?$_POST["typename".$id]:"";
	$parentid = isset($_POST["parentid".$id])?$_POST["parentid".$id]:"";
	
	$updatesql = "update sto_type set typename=?,parentid=? where id=?";
	$sth = $aimiliPDO->prepare($updatesql);
	$sth->execute(array($typename,$parentid, $id) );

       
	
	
	
	
  }
  //DELETE
  if(strpos($delete,"delete")!==false)
  {
	$id = substr($delete,6);
	
	$updatesql = "update sto_type set status=? where id=?";
	$sth = $aimiliPDO->prepare($updatesql);
	$sth->execute(array("0", $id) );
  }
  
?>
<div style="background-color:#f1f1f1;padding:10px">
<div>
<?php
include("header.php");
?>


<form action="/d/admin/type_list" method="POST">

<table style="line-height:30px;">
<tr>
<td>分类名称</td>
<td>上级分类</td>

<td>操作</td>
</tr>
<tr>
<td><input type="text" name="typename"  /></td>
<td>
	<select name="parentid">
		<option value="0">---</option>
		<?php
			$ts = $stoTypeDAO->findTypesByWhere("where parentid=0");
			foreach($ts  as $t)
			{
				
				echo "<option value=".$t->id.">".$t->typename."</option>";
				
				
			}
		?>
	</select>
</td>

<td><input type="submit" name="create" value="create" /></td>
</tr>
<?php
	$where ="where 1=1 ";
	
	$models = $stoTypeDAO->findTypesByWhere($where." order by id");
	
	
	foreach($models as $model)
	{
	?>
		<tr>
			<td>
				<input type="submit" name="submit" value="edit<?php echo $model->id?>"/>
				<input type="submit" name="deletebtn" value="delete<?php echo $model->id?>"/>
			</td>
			
			<td><input type="text" name="typename<?php echo $model->id?>" value="<?php echo $model->typename?>"/></td>
			
			<td>
				<select name="parentid<?php echo $model->id?>">
				<option value="0">---</option>
				<?php
					
					foreach($ts  as $t)
					{
						if($t->id == $model->parentid)
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
	
		</tr>
	<?php 
	}
?>
	
</table>
</form>
</div>
</div>