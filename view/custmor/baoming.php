
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
			$msg =  "��������ƷID";
			$createflag =false;
		}
		if(strlen($price)==0)
		{
			$msg = "�����������";
			$createflag =false;
		}
	
		
		$c = new TopClient;
		//ʵ��������API��Ӧ��Request��
		$req = new ItemGetRequest();      //top ��װ��php�ļ�
		$req->setFields("num_iid,nick,price,title,detail_url,pic_url");
		$req->setNumIid($numiid);
		$resp = $c->execute($req);   
		
		
		$rtn =$resp->item;
		if($rtn==null)
		{
			$msg = "δ��ȡ����Ʒ";
			$createflag =false;
		}
		else
		{
			$seller = addslashes($rtn->nick);
			$nums = $itemDAO->getCountByWhere("where seller='".$seller."' and source = 2 ");
			if($nums > 4)
			{
				$msg = "ÿ���̼���౨��5���Ʒ";
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
				$msg =  "�����ύ�ɹ�";
			}
			else
			{
				$msg =  "�����ύʧ��";
			}
		}
	}
	
	$ts = $stoTypeDAO->findTypesByWhere("where parentid=".$ptid);
		
	$cs = $stoCatDAO->findCatsByWhere("where ptypeid=".$ptid);
	
	?>
	
	<div style="margin-top:20px; padding:3px; background-color:#D2394B;width:943px">
		<div style="float:left;background-color:#FFE6F8;width:300px;min-height:400px;">
			<div style="text-align:center; margin-left:20px; margin-right:20px; margin-top:10px; background-color:#FF2D71; height:40px; line-height:40px">
				 <span style="color:White; font-size:16px;">�̼ұ�������</span>
			</div>
			<div style=" margin-left:20px; margin-right:20px; margin-top:30px; border:1px dashed #FF2D71">
				<?php include("zs_left.php");?>
			</div>
		</div>
		<div style="float:left;margin-left:3px;background-color:#FFE6F8;min-height:380px;width:620px;padding:10px">
			<div style="padding-bottom:10px"><a href="/d/zs" style="color:red">������ҳ</a> > ������</div>
			<form action="/d/baoming?ptid=<?php echo $ptid?>" method="POST">
				<input type="hidden" name="submitflag" value="1" />
				<table class="admin_listtable" style="line-height:30px">
					<tr>
						<td align="right">��ƷID:</td>
						<td style="padding-left:5px">
							<input type="text" class="numiid" name="numiid" maxlength="20" />(����������id=123123123�����ֲ���)
						</td>
					</tr>
					<tr>
						<td align="right">���:</td>
						<td style="padding-left:5px">
							<input type="text" class="price" name="price" />(ֻ��д�۸�����)
						</td>
					</tr>
					<tr>
						<td align="right">��ϵ������:</td>
						<td style="padding-left:5px">
							<input type="text" class="contact" name="contact" />(����д��ϵ�����������������Ա��ϵ)
						</td>
					</tr>
					<tr>
						<td align="right">����:</td>
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
						<td align="right">���:</td>
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
							<input type="submit" class="bmbtn btn1" value="�ύ����" />
							<span class="errortext" style="color:red"><?php echo $msg?></span>
						</td>
					</tr>
				</table>
				
			</form>	
			<div style="margin-top:10px;font-size:14px;color:red">ע�����</div>
			<div style="padding-left:20px;line-height:20px;">
				1. ������ı�����������Ա���<br>
				2. ������ҳ������ҳ����Ϸ��������Ь�񺣱�<br>
				3. ������ͼ��ƤѢ��������ͼƬ����<br>
				3. ÿ������ÿ������ύ3������ͷ���Ա���<br>
				4. ���ͨ����������Ь��Ķ�Ӧ������չʾ<br>
			</div>
		</div>
		<div style="clear:both;"></div>
	</div>
	
	
	
	

	<?php include("../includes/footer.php");?>
	<div style="height:10px;">&nbsp;</div>
</div>
<script src="/assets/javascripts/baoming.js"></script>

</div>