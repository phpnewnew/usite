<script src="/assets/javascripts/header.js"></script>
<div class="page">
<div class="content">
	<?php
	include("../includes/header.php");

	include("../../dao/item_dao.php");
	

	$result ="";
	
	$flag = isset($_POST["submitflag"])?$_POST["submitflag"]:"";
	if($flag =="1")
	{
		$numiid = isset($_POST["numiid"])?$_POST["numiid"]:"";
		$numiid = addcslashes($numiid);
		if(strlen($numiid)==0)
		{
			$result ="����д��ƷID";
		}
		else
		{
			$item = $itemDAO->findItemByNumIid($numiid);
		
			if($item)
			{
				if($item->status=="0")
					$result ="�����";
				else if($item->status=="1")
					$result ="��ͨ��";
				else if($item->status=="2")
					$result ="δͨ��".$item->briefdesc;
				else
					$result ="�����";
			}
			else
			{
				$result ="������";
			}
		}
		
		
		
		
	
	
		
	}
	


	
	
	
	?>
	
	<div style="margin-top:20px; padding:3px; background-color:#D2394B;width:943px;">
		<div style="float:left;background-color:#FFE6F8;width:300px;min-height:400px;">
			<div style="text-align:center; margin-left:20px; margin-right:20px; margin-top:10px; background-color:#FF2D71; height:40px; line-height:40px">
				 <span style="color:White; font-size:16px;">�̼ұ�������</span>
			</div>
			<div style=" margin-left:20px; margin-right:20px; margin-top:30px; border:1px dashed #FF2D71">
				<?php include("zs_left.php");?>
			</div>
		</div>
		<div style="float:left;margin-left:3px;background-color:#FFE6F8;min-height:400px;width:620px;padding:10px">
			<div style="padding-bottom:10px"><a href="/d/zs" style="color:red">������ҳ</a> > ��ѯ�������</div>
			<form action="/d/chaxun" method="POST">
				<input type="hidden" name="submitflag" value="1" />
				<table class="admin_listtable" style="line-height:30px">
					<tr>
						<td align="right">��ƷID:</td>
						<td style="padding-left:5px">
							<input type="text" class="numiid txtgray" name="numiid" maxlength="20" />(����������id=123123123�����ֲ���)
						</td>
					</tr>
					
					<tr>
						<td></td>
						<td style="padding:5px">
							<input type="submit" class="bmbtn btn1" value="��ѯ" />
							
						</td>
					</tr>
					<tr>
						<td align="right">��˽��:</td>
						<td style="padding-left:5px">
							
							<span style="color:red"><?php echo $result?></span>
						</td>
					</tr>
				</table>
				
			</form>	
		</div>
		<div style="clear:both;"></div>
	</div>
	
	<?php include("../includes/footer.php");?>
	
	<div style="height:10px;">&nbsp;</div>
</div>

</div>