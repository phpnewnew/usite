
<div class="page">
<div class="content">
	<?php
	include("../includes/header.php");
	include("../../dao/sto_cat_dao.php");
	include("../../dao/sto_type_dao.php");
	include("../../dao/item_dao.php");
	
	include("../../top/topclient.php");
	include("../../top/ItemGetRequest.php");
	
	$ptid = isset($_GET["ptid"])?$_GET["ptid"]:"1";
	
	$msg ="";
	$flag = isset($_POST["submitflag"])?$_POST["submitflag"]:"";
	if($flag =="1")
	{	
		$numiid = isset($_POST["numiid"])?$_POST["numiid"]:"";
		$numiid = addcslashes($numiid);
		
		$price = isset($_POST["price"])?$_POST["price"]:"";
		
		
		$catid = isset($_POST["catid"])?$_POST["catid"]:"";	
		$typeid = isset($_POST["typeid"])?$_POST["typeid"]:"";	
		$price = floatval($price);
		$contact = isset($_POST["contact"])?$_POST["contact"]:"";	
		$contact = addslashes($contact);
		$createflag = true;
		
		if(strlen($numiid)==0)
		{
			$msg =  "请输入商品ID";
			$createflag =false;
		}
		if(strlen($price)==0)
		{
			$msg = "请输入促销价";
			$createflag =false;
		}
	
		
		$c = new TopClient;
		//实例化具体API对应的Request类
		$req = new ItemGetRequest();      //top 封装的php文件
		$req->setFields("num_iid,nick,price,title,detail_url,pic_url");
		$req->setNumIid($numiid);
		$resp = $c->execute($req);   
		
		
		$rtn =$resp->item;
		if($rtn==null)
		{
			$msg = "未获取到商品";
			$createflag =false;
		}
		else
		{
			$seller = addslashes($rtn->nick);
			$nums = $itemDAO->getCountByWhere("where seller='".$seller."' and source = 2 ");
			if($nums > 4)
			{
				$msg = "每个商家最多报名5款产品";
				$createflag =false;
			}
		}
		
		
		if($createflag)
		{
			$caption = $rtn->title;
			$buyurl = $rtn->detail_url;
			$nick =$rtn->nick;
			$marketprice =$rtn->price;
			
			$item = new Item();
			$item->numiid = $numiid;
			$item->caption = $caption;
			$item->picurl = $rtn->pic_url ."_250x250.jpg";
			$item->buyurl = $buyurl;
			$item->catid = $catid;
			$item->ptypeid = $ptid;
			$item->typeid = $typeid;
			$item->status = "0";
			$item->lovenum = "0";
			$item->createtime = date('Y-m-d H:i:s');
			$item->seller = $nick;
			$item->displayorder = "1000";
			$item->price = $price;
			$item->briefdesc = "";
			$item->ishot = "0";
			$item->isnew = "0";
			$item->isrecommand = "0";
			$item->marketprice = $marketprice;
			$item->begintime =  date('Y-m-d 0:0:0',strtotime("1 day"));
			$item->endtime = date('Y-m-d 0:0:0',strtotime("30 day"));
			
			$item->source = "2";
			$item->contact = $contact;
			$id = $itemDAO->createItem($item);
			if($id>0)
			{
				$msg =  "报名提交成功";
			}
			else
			{
				$msg =  "报名提交失败";
			}
		}
	}
	
	$ts = $stoTypeDAO->findTypesByWhere("where parentid=".$ptid);
		
	$cs = $stoCatDAO->findCatsByWhere("where ptypeid=".$ptid);
	
	?>
	
	<div style="margin-top:20px; padding:3px; background-color:#D2394B;width:943px">
		<div style="float:left;background-color:#FFE6F8;width:300px;min-height:400px;">
			<div style="text-align:center; margin-left:20px; margin-right:20px; margin-top:10px; background-color:#FF2D71; height:40px; line-height:40px">
				 <span style="color:White; font-size:16px;">商家报名中心</span>
			</div>
			<div style=" margin-left:20px; margin-right:20px; margin-top:30px; border:1px dashed #FF2D71">
				<?php include("zs_left.php");?>
			</div>
		</div>
		<div style="float:left;margin-left:3px;background-color:#FFE6F8;min-height:380px;width:620px;padding:10px">
			<div style="padding-bottom:10px"><a href="/d/zs" style="color:red">报名首页</a> > 报名表单</div>
			<form action="/d/baoming?ptid=<?php echo $ptid?>" method="POST">
				<input type="hidden" name="submitflag" value="1" />
				<table class="admin_listtable" style="line-height:30px">
					<tr>
						<td align="right">商品ID:</td>
						<td style="padding-left:5px">
							<input type="text" class="numiid" name="numiid" maxlength="20" />(宝贝链接里id=123123123的数字部分)
						</td>
					</tr>
					<tr>
						<td align="right">活动价:</td>
						<td style="padding-left:5px">
							<input type="text" class="price" name="price" />(只填写价格数字)
						</td>
					</tr>
					<tr>
						<td align="right">联系人旺旺:</td>
						<td style="padding-left:5px">
							<input type="text" class="contact" name="contact" />(请填写联系人旺旺，方便审核人员联系)
						</td>
					</tr>
					<tr>
						<td align="right">分类:</td>
						<td style="padding-left:5px">
							<select name="typeid">
								<?php
									
									foreach($ts as $c)
									{
										echo "<option value=".$c->id.">".$c->typename."</option>";
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right">风格:</td>
						<td style="padding-left:5px">
							<select name="catid">
								<?php
									
									foreach($cs as $c)
									{
										echo "<option value=".$c->id.">".$c->catname."</option>";
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td style="padding:5px">
							<input type="submit" class="bmbtn btn1" value="提交报名" />
							<span class="errortext" style="color:red"><?php echo $msg?></span>
						</td>
					</tr>
				</table>
				
			</form>	
			<div style="margin-top:10px;font-size:14px;color:red">注意事项：</div>
			<div style="padding-left:20px;line-height:20px;">
				1. 报名活动的宝贝必须加入淘宝客<br>
				2. 店铺首页，宝贝页左侧上方必须挂有鞋柜海报<br>
				3. 宝贝主图无皮癣无文字且图片精美<br>
				3. 每个店铺每周最多提交3款宝贝供客服人员审核<br>
				4. 审核通过后您将在鞋柜的对应分类里展示<br>
			</div>
		</div>
		<div style="clear:both;"></div>
	</div>
	
	
	
	

	<?php include("../includes/footer.php");?>
	<div style="height:10px;">&nbsp;</div>
</div>
<script src="/assets/javascripts/baoming.js"></script>

</div>