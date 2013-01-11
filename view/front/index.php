<script src="/assets/javascripts/header.js"></script>
<div class="page">
<div class="content">
<?php
include("../includes/header.php");
include("../../dao/item_dao.php");
include("../../dao/shop_dao.php");
?>


	<div style="margin-top:20px; padding-bottom:5px; margin-bottom:10px">
		<!--顶部广告-->
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
		<!--顶部广告-->
		<div>
			<div style="text-align:left; padding-top:20px; font-size:14px;padding-bottom:10px">
				我是美鞋控
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
	
	
	
		<!--甜美优雅-->
		<div style="text-align:left; padding-top:20px; font-size:14px;">
			<a href="/d/productlist?cid=1" style="font-size:14px; color:black">甜蜜糖果系</a>
		</div>
		<div class="box_shadow" style="margin-top:10px">
			<div style="padding:10px; float:left; ">
				<a href="/d/productlist?cid=1" style="position:relative" target="_blank">
					<img src="http://img04.taobaocdn.com/imgextra/i4/130896155/T2pYe6XmVXXXXXXXXX_!!130896155.jpg" width="385px" height="300px" />
					<span class="currtitle">蝴蝶结和小清新</span>
				</a>
			</div>
			<div style="float:left; width:520px;padding:10px;padding-top:10px">
				<div style="font-size:14px; text-align:center; width:120px; height:30px; line-height:30px; margin:auto; background-color:#FE9EB0">
					小甜美小优雅
				</div>
				<div style="line-height:25px; height:126px; padding-top:15px; padding-left:60px;">
				
					每个人都该有一双好鞋，因为这双好鞋会带你到最美好的地方去。<br/>那一刻后我深深记得，每个女人都需要一双漂亮的鞋子，<br/>因为她可以带着我去一个美丽的地方，遇到令我心动的男子。<br/>而一双漂亮的高跟鞋，则能带着我去更美更远的地方。
	   
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
		<!--潮流时尚馆-->
		<div style="text-align:left; padding-top:20px; font-size:14px;">
			<a href="/d/productlist?cid=2" style="font-size:14px; color:black">恋上韩流潮美鞋</a>
		</div>
		<div style="padding-top:10px">
			<div class="box_shadow" style="padding:10px;float:left; width:645px;">
				<div style="float:left">
					<a href="/d/productlist?cid=2" style="position:relative" target="_blank">
						<img src="http://img01.taobaocdn.com/imgextra/i1/130896155/T2S3S7XdhXXXXXXXXX_!!130896155.jpg" width="290px" height="246px" />
						<span class="currtitle">每个人对潮流都有自己的理解</span>
					</a>
				</div>
				<div style="float:left;width:350px; ">
					<div style="font-size:14px; text-align:center; width:120px; height:30px; line-height:30px; margin:auto; background-color:#FE9EB0">
						美的极致
					</div>
					<div style="line-height:25px;padding-left:10px;height:80px; width:320px;padding-top:15px;">
						喜欢踩着9cm的高跟鞋走在大街上，那种极细的跟那种美到极致的细细的跟，对女人来说是一种诱惑，驻足都市街头高跟鞋上盛开着一朵朵轻盈
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
	
		<!--通勤女生也优雅-->
		<div style="text-align:left; padding-top:20px; font-size:14px;">
			<a href="/d/productlist?cid=3" style="font-size:14px; color:black">通勤女生也优雅</a>
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
							鞋子是女人的另一张脸
						</div>
						<div style="line-height:23px;padding-top:5px; ">
							高跟鞋是女人的象征，是女人优越感的直接来源。穿高跟鞋的女人总会从一扎的毫无个性的女人堆里脱颖而出绝对有鹤立鸡群的感觉。 当女人穿上高跟鞋高跟鞋便不只是高跟鞋了。高跟鞋在小说里成了一个完美的隐喻漂亮的甚至看不出磨损与折痕的外表，欢喜热闹的假象，穿上它时微妙的痛感，和走起路来骄傲的声音这些是女人生活经验里的一个细节

						</div>
					</div>
				</div>
				<div style="float:right;padding-right:10px">
					<a href="/d/productlist?cid=3" style="position:relative" target="_blank">
						<img src="http://img02.taobaocdn.com/imgextra/i2/130896155/T2Xwu7XdtXXXXXXXXX_!!130896155.jpg" width="300px" height="300px" />
						<span class="currtitle">鞋美人更美</span>
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
	
	
		<!--休闲舒适-->
		<div style="text-align:left; padding-top:20px; font-size:14px;">
			<a href="/d/productlist?cid=4" style="font-size:14px; color:black">拥有便不再奢求</a>
		</div>
		<div style="margin-top:10px; padding-bottom:5px; ">
			<div class="index_div1 box_shadow">
				<div style="padding:10px; float:left; ">
					<a href="/d/productlist?cid=4" style="position:relative" target="_blank">
						<img src="http://img01.taobaocdn.com/imgextra/i1/130896155/T2j1G7XfXXXXXXXXXX_!!130896155.jpg" width="385px" height="244px" />
						<span class="currtitle">每个人都有一双舒适的鞋子</span>
					</a>
				</div>
				<div style="float:left; width:520px;padding:10px;padding-top:10px">
					<div style="font-size:14px; text-align:center; width:180px; height:30px; line-height:30px; margin:auto; background-color:#FE9EB0">
						舒适是我们永远的追求
					</div>
					<div style="line-height:25px; height:80px; padding-top:5px; padding-left:20px;">
					
						有人说,每个人都应该有一双好鞋，因为这双好鞋，会带你到最美好的地方去。
						一双好的鞋子不一定要很昂贵，也不一定要很漂亮,但一定要很舒适，这双鞋可以带你走遍你想去的任何地方。
		   
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
		
		<!--推荐店铺-->
		<div style="padding-top:10px; font-size:14px;">
			<a href="/d/shops" style="font-size:14px; color:black">推荐好鞋店</a>
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
								<div style="margin-top:10px">掌柜</div>
							</div>
							
							<div style="clear:both"></div>
						</div>
						<div style="margin-top:30px;">
							<div style="height:30px;width:80px;line-height:30px; background-color:#e69;text-align:center;">
								<a href="<?php echo $s->shopurl ."?nick_uz=".$s->nick?>" target="_blank" style="color:white;">
									去店里逛逛
								</a>
							</div>
						</div>
					</div>
					<div style="float:left;width:20px;margin-left:24px"><span>镇店之宝</span></div>
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
			"title":"鞋柜.足尖上的诱惑",
			"moreurl":"http://aimeili.uz.taobao.com",
			"canFwd":"1"},
		"paramList":{"view":"list_trunPage","pageSize":"5"}}'>
	</div>   

</div>
</div>











