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
			$result ="请填写商品ID";
		}
		else
		{
			$item = $itemDAO->findItemByNumIid($numiid);
		
			if($item)
			{
				if($item->status=="0")
					$result ="待审核";
				else if($item->status=="1")
					$result ="已通过";
				else if($item->status=="2")
					$result ="未通过".$item->briefdesc;
				else
					$result ="待审核";
			}
			else
			{
				$result ="不存在";
			}
		}
		
		
		
		
	
	
		
	}
	


	
	
	
	?>
	
	<div style="margin-top:20px; padding:3px; background-color:#D2394B;width:943px;">
		<div style="float:left;background-color:#FFE6F8;width:300px;min-height:400px;">
			<div style="text-align:center; margin-left:20px; margin-right:20px; margin-top:10px; background-color:#FF2D71; height:40px; line-height:40px">
				 <span style="color:White; font-size:16px;">商家报名中心</span>
			</div>
			<div style=" margin-left:20px; margin-right:20px; margin-top:30px; border:1px dashed #FF2D71">
				<?php include("zs_left.php");?>
			</div>
		</div>
		<div style="float:left;margin-left:3px;background-color:#FFE6F8;min-height:400px;width:620px;padding:10px">
			<div style="padding-bottom:10px"><a href="/d/zs" style="color:red">报名首页</a> > 查询报名结果</div>
			<form action="/d/chaxun" method="POST">
				<input type="hidden" name="submitflag" value="1" />
				<table class="admin_listtable" style="line-height:30px">
					<tr>
						<td align="right">商品ID:</td>
						<td style="padding-left:5px">
							<input type="text" class="numiid txtgray" name="numiid" maxlength="20" />(宝贝链接里id=123123123的数字部分)
						</td>
					</tr>
					
					<tr>
						<td></td>
						<td style="padding:5px">
							<input type="submit" class="bmbtn btn1" value="查询" />
							
						</td>
					</tr>
					<tr>
						<td align="right">审核结果:</td>
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