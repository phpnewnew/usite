<script src="/assets/javascripts/header.js"></script>
<div class="page">
<div class="content">
<?php
include("../includes/header.php");
include("../../dao/item_dao.php");
include("../../dao/shop_dao.php");
?>


	<div style="margin-top:20px; padding-bottom:5px; margin-bottom:10px">
		<!--�������-->
		<div class="box_shadow"  style="text-align:left; padding:10px; font-size:14px;height:260px">
			<div style="float:left">
				<img src="http://img02.taobaocdn.com/imgextra/i2/130896155/T2sjy6Xi8aXXXXXXXX_!!130896155.jpg" />
			</div>
			<div style="float:left; padding-left:10px;line-height:30px;">
				<div>
					<a href="/d/productlist?ptid=1">
						<img src="http://img02.taobaocdn.com/imgextra/i2/130896155/T2Nm95XnpaXXXXXXXX_!!130896155.jpg" width="186px" height="260px" />
					</a>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<!--�������-->
		<div>
			<div style="text-align:left; padding-top:20px; font-size:14px;padding-bottom:10px">
				������Ь��
			</div>
			<div class="box_shadow new_div" style="padding:10px;padding-left:13px">
				<div style="display:block;">
					<ul class="new_list">
						<?php
							$ms = $itemDAO->findItemsByWhere("where status=1 and ishot=1 order by displayorder limit 10");
							$i=0;
							foreach($ms as $m)
							{
								$i++;
								
								$atext = "<a href='/d/item?id=".$m->id."' target='_blank'>";
								$img = "<img border='0' src='".$m->picurl."'>";
								$caption = "<div><span>".$m->caption."</span></div>";

								
						?>
							<li class="p<?php echo $i?>">
									<?php echo $atext?>
									<?php echo $img?>
										<?php echo $caption?>
									
									</a>
							</li>
							
						<?php
								
							}
							
						?>
						<li class="p11">
							<a href="/d/productlist?ptid=1&tid=10">
							<img border='0' src='/assets/images/gaogen.jpg'>
							</a>
						</li>
						<li class="p12"></li>
						<li class="p13">
							<a href="/d/productlist?ptid=1&tid=4">
							<img border='0' src='/assets/images/xdx.jpg'>
							</a>
						</li>	
						<li class="p14">
							<a href="/d/productlist?ptid=1&tid=7">
							<img border='0' src='/assets/images/pogen.jpg'>
							</a>
						</li>
						<li class="p15"></li>
						<li class="p16">
							<a href="/d/productlist?ptid=1&tid=11">
							<img border='0' src='/assets/images/jujia.jpg'>
							</a>
						</li>
						<li class="p17"></li>
						<li class="p18">
							<a href="/d/productlist?ptid=1&tid=5">
							<img border='0' src='/assets/images/nvxue.jpg'>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	
	
	
		<!--��������-->
		<div style="text-align:left; padding-top:20px; font-size:14px;">
			<a href="/d/productlist?cid=1" style="font-size:14px; color:black">�����ǹ�ϵ</a>
		</div>
		<div class="box_shadow" style="margin-top:10px">
			<div style="padding:10px; float:left; ">
				<a href="/d/productlist?cid=1" style="position:relative" target="_blank">
					<img src="http://img04.taobaocdn.com/imgextra/i4/130896155/T2pYe6XmVXXXXXXXXX_!!130896155.jpg" width="385px" height="300px" />
					<span class="currtitle">�������С����</span>
				</a>
			</div>
			<div style="float:left; width:520px;padding:10px;padding-top:10px">
				<div style="font-size:14px; text-align:center; width:120px; height:30px; line-height:30px; margin:auto; background-color:#FE9EB0">
					С����С����
				</div>
				<div style="line-height:25px; height:126px; padding-top:15px; padding-left:60px;">
				
					ÿ���˶�����һ˫��Ь����Ϊ��˫��Ь����㵽�����õĵط�ȥ��<br/>��һ�̺�������ǵã�ÿ��Ů�˶���Ҫһ˫Ư����Ь�ӣ�<br/>��Ϊ�����Դ�����ȥһ�������ĵط������������Ķ������ӡ�<br/>��һ˫Ư���ĸ߸�Ь�����ܴ�����ȥ������Զ�ĵط���
	   
				</div>
				<div>
					<div class="tm_products" style="width:520px">
						<?php
							$ps = $itemDAO->findItemsByWhere("where catid=1 and isrecommand=1 order by displayorder limit 0,4");
							foreach($ps as $p)
							{
						?>
							<div class="item">
								<a href="/d/item?id=<?php echo $p->id?>" target="_blank">
									<img src="<?php echo $p->picurl?>" />
								</a>
							</div>
						<?php
							}
						?>
						
						
						<div style="clear:both"></div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<!--����ʱ�й�-->
		<div style="text-align:left; padding-top:20px; font-size:14px;">
			<a href="/d/productlist?cid=2" style="font-size:14px; color:black">���Ϻ�������Ь</a>
		</div>
		<div style="padding-top:10px">
			<div class="box_shadow" style="padding:10px;float:left; width:645px;">
				<div style="float:left">
					<a href="/d/productlist?cid=2" style="position:relative" target="_blank">
						<img src="http://img01.taobaocdn.com/imgextra/i1/130896155/T2S3S7XdhXXXXXXXXX_!!130896155.jpg" width="290px" height="246px" />
						<span class="currtitle">ÿ���˶Գ��������Լ������</span>
					</a>
				</div>
				<div style="float:left;width:350px; ">
					<div style="font-size:14px; text-align:center; width:120px; height:30px; line-height:30px; margin:auto; background-color:#FE9EB0">
						���ļ���
					</div>
					<div style="line-height:25px;padding-left:10px;height:80px; width:320px;padding-top:15px;">
						ϲ������9cm�ĸ߸�Ь���ڴ���ϣ����ּ�ϸ�ĸ������������µ�ϸϸ�ĸ�����Ů����˵��һ���ջ�פ�㶼�н�ͷ�߸�Ь��ʢ����һ�����ӯ
					</div>
					<div style="padding-top:12px;padding-left:10px;">
						<div class="ss_products">
							<?php
								$ps = $itemDAO->findItemsByWhere("where catid=2 and isrecommand=1 order by displayorder limit 1,3");
								foreach($ps as $p)
								{
							?>
								<div class="item">
									<a href="/d/item?id=<?php echo $p->id?>" target="_blank">
										<img src="<?php echo $p->picurl?>" />
									</a>
								</div>
							<?php
								}
							?>
							
							
							<div style="clear:both"></div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="box_shadow" style="padding:10px;float:left; margin-left:15px;padding-bottom:8px">
				<div>
					
					<?php
						$ps = $itemDAO->findItemsByWhere("where catid=2 and isrecommand=1 order by displayorder limit 1");
						foreach($ps as $p)
						{
					?>
						
							<a href="/d/item?id=<?php echo $p->id?>" target="_blank">
								<img src="<?php echo $p->picurl?>" width="250px" height="250px" />
							</a>
						
					<?php
						}
					?>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	
		<!--ͨ��Ů��Ҳ����-->
		<div style="text-align:left; padding-top:20px; font-size:14px;">
			<a href="/d/productlist?cid=3" style="font-size:14px; color:black">ͨ��Ů��Ҳ����</a>
		</div>
		<div style="padding-top:10px">
			<div class="box_shadow" style="padding:10px;float:left; width:720px; ">
				<div style="float:left;">
					<div>
						<div class="mz_products">
							<?php
								$ps = $itemDAO->findItemsByWhere("where catid=3 and isrecommand=1 order by displayorder limit 0,3");
								foreach($ps as $p)
								{
							?>
								
								<div class="item">
									<a href="/d/item?id=<?php echo $p->id?>" target="_blank">
										<img src="<?php echo $p->picurl?>" />
									</a>
								</div>
								
							<?php
								}
							?>
							
							<div style="clear:both"></div>
						</div>
					</div>
					<div style="width:380px; padding:10px;overflow:hidden">
						<div style="font-size:14px; text-align:center; width:180px; height:30px; line-height:30px; margin:auto; background-color:#FE9EB0">
							Ь����Ů�˵���һ����
						</div>
						<div style="line-height:23px;padding-top:5px; ">
							�߸�Ь��Ů�˵���������Ů����Խ�е�ֱ����Դ�����߸�Ь��Ů���ܻ��һ���ĺ��޸��Ե�Ů�˶�����ӱ���������к�����Ⱥ�ĸо��� ��Ů�˴��ϸ߸�Ь�߸�Ь�㲻ֻ�Ǹ߸�Ь�ˡ��߸�Ь��С˵�����һ������������Ư��������������ĥ�����ۺ۵������ϲ���ֵļ��󣬴�����ʱ΢���ʹ�У�������·��������������Щ��Ů����������һ��ϸ��

						</div>
					</div>
				</div>
				<div style="float:right;padding-right:10px">
					<a href="/d/productlist?cid=3" style="position:relative" target="_blank">
						<img src="http://img02.taobaocdn.com/imgextra/i2/130896155/T2Xwu7XdtXXXXXXXXX_!!130896155.jpg" width="300px" height="300px" />
						<span class="currtitle">Ь���˸���</span>
					</a>
				</div>
				
				<div class="clear"></div>
			</div>
			<div class="box_shadow" style="float:left; margin-left:10px;width:200px;height:324px; text-align:center;">
				
				<?php
					$ps = $itemDAO->findItemsByWhere("where catid=3 and isrecommand=1 order by displayorder limit 3,2");
					foreach($ps as $p)
					{
				?>
					
					
					<div style="margin-top:8px;border:1px solid #e1e1e1;width:150px">
						<a href="/d/item?id=<?php echo $p->id?>" target="_blank">
							<img src="<?php echo $p->picurl?>" width="145px" height="145px" />
						</a>
					</div>
					
				<?php
					}
				?>
			</div>
			<div class="clear"></div>
		</div>
	
	
		<!--��������-->
		<div style="text-align:left; padding-top:20px; font-size:14px;">
			<a href="/d/productlist?cid=4" style="font-size:14px; color:black">ӵ�б㲻������</a>
		</div>
		<div style="margin-top:10px; padding-bottom:5px; ">
			<div class="index_div1 box_shadow">
				<div style="padding:10px; float:left; ">
					<a href="/d/productlist?cid=4" style="position:relative" target="_blank">
						<img src="http://img01.taobaocdn.com/imgextra/i1/130896155/T2j1G7XfXXXXXXXXXX_!!130896155.jpg" width="385px" height="244px" />
						<span class="currtitle">ÿ���˶���һ˫���ʵ�Ь��</span>
					</a>
				</div>
				<div style="float:left; width:520px;padding:10px;padding-top:10px">
					<div style="font-size:14px; text-align:center; width:180px; height:30px; line-height:30px; margin:auto; background-color:#FE9EB0">
						������������Զ��׷��
					</div>
					<div style="line-height:25px; height:80px; padding-top:5px; padding-left:20px;">
					
						����˵,ÿ���˶�Ӧ����һ˫��Ь����Ϊ��˫��Ь������㵽�����õĵط�ȥ��
						һ˫�õ�Ь�Ӳ�һ��Ҫ�ܰ���Ҳ��һ��Ҫ��Ư��,��һ��Ҫ�����ʣ���˫Ь���Դ����߱�����ȥ���κεط���
		   
					</div>
					<div>
						<div class="tm_products"  style="width:520px">
							<?php
								$ps = $itemDAO->findItemsByWhere("where catid=4 and isrecommand=1 order by displayorder limit 0,4");
								foreach($ps as $p)
								{
							?>
								<div class="item">
									<a href="/d/item?id=<?php echo $p->id?>" target="_blank">
										<img src="<?php echo $p->picurl?>" />
									</a>
								</div>
							<?php
								}
							?>
							<div style="clear:both"></div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		
		<!--�Ƽ�����-->
		<div style="padding-top:10px; font-size:14px;">
			<a href="/d/shops" style="font-size:14px; color:black">�Ƽ���Ь��</a>
		</div>
		<?php
			$s = $shopDAO->findShopByWhere("where status=1 and isrecommand=1 order by displayorder limit 1");
			if($s->id)
			{
		?>
				<div class="box_shadow" style="margin-top:10px;padding:15px;">
					<div style="float:left;">
						<div style="border:1px solid #f1f1f1;width:250px;height:300px">
						
							<a href="<?php echo $s->shopurl ."?nick_uz=". $s->nick?>" target="_blank">
								<img border="0" src="<?php echo $s->picurl?>" width="250px" height="300px" />
							</a>
						</div>
					</div>
					<div style="float:left;width:300px;overflow:hidden;overflow:hidden;margin-left:20px">
						<div>
							<a href="<?php echo $s->shopurl ."?nick_uz=". $s->nick?>" target="_blank" style="font-size:18px;color:#5B5B5B;font-weight:800">
								<?php echo $s->shopname?>
							</a>
						</div>
						<div style="padding-top:10px; line-height:20px;height:100px; overflow:hidden">
							<?php echo $s->briefdesc?>
						</div>
						<div style="padding-top:10px; line-height:20px;">
							<div style="float:left">
								<div style="border:1px solid #f1f1f1;width:80px;height:80px;">
									<a href="<?php echo $s->shopurl ."?nick_uz=". $s->nick?>" target="_blank">
										<img src="<?php echo $s->shoplogo?>" width="80px" height="80px" />
									</a>
								</div>
							</div>
							<div style="float:left;margin-left:10px;padding-top:15px;color:#5B5B5B">
								<div><a href="<?php echo $s->shopurl ."?nick_uz=". $s->nick?>" target="_blank"><?php echo $s->nick?></a></div>
								<div style="margin-top:10px">�ƹ�</div>
							</div>
							
							<div style="clear:both"></div>
						</div>
						<div style="margin-top:30px;">
							<div style="height:30px;width:80px;line-height:30px; background-color:#e69;text-align:center;">
								<a href="<?php echo $s->shopurl ."?nick_uz=".$s->nick?>" target="_blank" style="color:white;">
									ȥ������
								</a>
							</div>
						</div>
					</div>
					<div style="float:left;width:20px;margin-left:24px"><span>���֮��</span></div>
					<div class="shopitemlist">
						<?php 
							$items = $itemDAO->findItemsByWhere("where seller='".$s->nick."' and isnew=1 limit 4");
							foreach($items as $item)
							{
						?>
								<div class="shopitem">
									<a href="<?php echo $item->buyurl?>" target="_blank">
									<img border="0" src="<?php echo $item->picurl?>" width="150px" height="150px" />
									<div class="shopitemtext">
										<div class="itemcaption"><?php echo $item->caption?></div>
										<div class="itembrief"><?php echo $item->briefdesc?></div>
									</div>
									</a>
								</div>
						<?php
								
							}
						?>
						<div style="clear:both"></div>
					</div>
					<div style="clear:both"></div>
				</div>
		<?php
			}
		?>
		
		
	
	</div>
	
	
	
	
</div>

<?php include("../includes/footer.php");?>

<div class="bottom" style="margin-top:10px">
	<div class="sns-widget" data-comment='{
		"isAutoHeight":true,
		"param":{
			"target_key":"aimeili-uz",
			"type_id":"1100061",
			"fId":"",
			"rec_user_id":"-1",
			"view":"detail_list",
			"title":"Ь��.����ϵ��ջ�",
			"moreurl":"http://aimeili.uz.taobao.com",
			"canFwd":"1"},
		"paramList":{"view":"list_trunPage","pageSize":"5"}}'>
	</div>   

</div>
</div>











