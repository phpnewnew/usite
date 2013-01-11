<?
	
  include("../../dao/sto_cat_dao.php");
  include("../../dao/dapei_dao.php");

  
  $fl = isset($_POST["submit"])?$_POST["submit"]:"";

  if($fl=="submit")
  {
	
  
	$caption = isset($_POST["caption"])?$_POST["caption"]:"";
	
	$fid = isset($_POST["fid"])?$_POST["fid"]:"";
	$begindate = isset($_POST["begindate"])?$_POST["begindate"]:"";
	$enddate = isset($_POST["enddate"])?$_POST["enddate"]:"";
	$orderno = isset($_POST["orderno"])?$_POST["orderno"]:"";
	$briefdesc = isset($_POST["briefdesc"])?$_POST["briefdesc"]:"";
	$isrecommand = isset($_POST["isrecommand"])?$_POST["isrecommand"]:"0";
	
	$item = new DaPei();
	$item->fid = $fid;
	$item->caption = $caption;
	$item->begindate = $begindate;
	$item->enddate = $enddate;
	$item->orderno = $orderno;
	$item->isrecommand = $isrecommand;
	$item->status = "1";
	$item->lovenum = "0";
	$item->userid = "1";
	$item->viewnum = "0";
	$item->briefdesc = $briefdesc;
	
	$id = $daPeiDAO->createDaPei($item);
	
	if(intval($id)>0)
	{
		header("Location:".$_taeServer."/d/admin/dapei_detail?id=".$id);
	}
	
	
  }
  
?>
<div>
<div class="content">
<?php
include("header.php");
?>
<form action="/d/admin/dapei_add" method="POST">
<table style="line-height:30px;">
<tr>
<td>风格：</td>
<td>
	<select name="fid">
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
<td>标题：</td>
<td>
	<input type="text" name="caption" style="width:400px"/>
</td>
</tr>
<tr>
<td>开始时间</td>
<td>
	<input type="text" name="begindate"  value="<?php echo date('Y-m-d')?>" />
</td>
</tr>
<tr>
<td>结束时间</td>
<td>
	<input type="text" name="enddate"  value="<?php echo date('Y-m-d',strtotime("30 day"))?>" />
</td>
</tr>
<tr>
<td>序号</td>
<td>
	<input type="text" name="orderno" value="1000"  />
</td>
</tr>

<tr>
<td>属性</td>
<td>
	<input type="checkbox" name="isrecommand" value="1" />推荐
</td>
</tr>
<tr>
<td>推荐理由</td>
<td>
	<textarea style="width:400px" type="text" name="briefdesc"></textarea>
</td>
</tr>
<tr>
<td></td>
<td>
	
	<input type="submit" name="submit" value="submit"   />
</td>
</tr>

</table>
</div>
</div>