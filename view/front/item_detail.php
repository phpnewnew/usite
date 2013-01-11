<script src="/assets/javascripts/header.js"></script>
<div class="page">
	<div class="content">
	<?php
	include("../includes/header.php");
	include("../../dao/item_dao.php");
	
	$pid = isset($_GET["id"])?$_GET["id"]:"";
	
	$pid = intval($pid);
	
	$model =  $itemDAO->findItemById($pid);
	
	
	?>
		<div style="margin-top:20px; padding-bottom:5px; margin-bottom:10px">
			<div class="clearfix itemdetail" >
				<div class="box_shadow" style="padding:10px; float:left; width:640px ">
					
					<div style="border:1px solid #e1e1e1; padding:2px;width:320px; float:left;">
						<a href="<?php echo $model->buyurl?>" style="margin:auto" target="_blank">
							<img src="<?php echo $model->picurl?>" width="320px" />
							
						</a>
					</div>
					<div style="float:left">
						<div class="caption">
							<?php echo $model->caption?>
						</div>
						<div style="padding-left:10px; margin-top:20px">
							<a class="price_buy" href="<?php echo $model->buyurl?>" target="_blank">
								<span class="price">￥<?php echo number_format($model->price,0)?></span>
								<span class="buy">去购买</span>
							</a>
						</div>
						<div style="padding-left:10px; margin-top:20px">
							
							<div style="float:left;">
								<div data-like='{
									text:"喜欢",
									skinType:1,
									type:2,
									key:"<?php echo $model->numiid ?>",
									client_id:68
								}'
								class="sns-widget">喜欢</div>
							</div>
							<div style="float:left;padding-left:10px">
								<div data-sharebtn='{
								 skinType:3,
								 type:"webpage",
								 app_id:"1100061",
								 key:"/d/item?id=<?php echo $model->id?>",
								 comment:"<?php echo $model->caption?>",
								 pic:"<?php echo $model->picurl?>",
								 title:"鞋柜.足尖上的诱惑",
								 client_id:170383, 
								 isShowFriend:false
								}'
								class="sns-widget sns-sharebtn sns-widget-ui dpshare">	
								</div>
							</div>
							<div style="clear:both"></div>
						</div>
						<div style="padding-left:10px; margin-top:10px;width:295px;overflow:hidden">
							<a href="#" style="height:30px; line-height:30px; background-color:#e69;padding:5px;color:white">+收入鞋柜</a>(已被 62 人收入)
						</div>
						<div style="padding-left:10px; margin-top:10px;width:295px;overflow:hidden">
							<?php echo $model->briefdesc?>
						</div>
					</div>
					<div class="clear"></div>
					
					
					<div style="padding-top:30px">
						<div class="sns-widget" data-comment='{
							"isAutoHeight":true,
							"param":{
								"target_key":"aimeili-item-<?php echo $model->id?>",
								"type_id":"1100061",
								"fId":"",
								"rec_user_id":"-1",
								"view":"detail_list",
								"title":"<?php echo $model->title?>",
								"moreurl":"/d/item?id=<?php echo $model->id?>",
								"canFwd":"1"},
							"paramList":{"view":"list_trunPage","pageSize":"10"}}'>
						</div>   
					</div>
				</div>
				<div class=" box_shadow" style="float:left; width:270px;padding:5px;padding-top:10px;margin-left:10px">
					
					<div style="color:#e69;font-size:14px;font-weight:800;">为你推荐</div>
					<div style="padding-top:10px;">
						<div class="tm_products" style="width:260px">
							<?php
								$ps = $itemDAO->findItemsByWhere("where catid=".$model->catid." order by displayorder limit 0,10");
								foreach($ps as $p)
								{
							?>
								<div class="item">
									<a href="<?php echo $p->buyurl?>" target="_blank">
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
	</div>
	
	<?php include("../includes/footer.php");?>

	
	
</div>











