<script src="/assets/javascripts/waterfall.js"></script>

<div class="page">
<div class="content">
	<?php
	include("../includes/header.php");
	include("../../dao/sto_cat_dao.php");
	include("../../dao/sto_type_dao.php");
	include("../../dao/item_dao.php");
	
	$ptid= isset($_GET['ptid'])?$_GET['ptid']:'1';
	$ptid= addslashes($ptid);
	$ptid = intval($ptid);
	
	$catid = isset($_GET['cid'])?$_GET['cid']:'';
	$typeid = isset($_GET['tid'])?$_GET['tid']:'';
	$pagenum = isset($_GET['page'])?$_GET['page']:'0';
	$pagenum = intval($pagenum);
	$pagesize =40;
	
	if(strlen($catid)>0)
		$catid = intval($catid);
	if(strlen($typeid)>0)
		$typeid = intval($typeid);
		
	$cs = $stoCatDAO->findCatsByWhere("where status=1 and ptypeid=".$ptid);
	$ts = $stoTypeDAO->findTypesByWhere("where status=1 and parentid=".$ptid);
	
	?>
	
	<div class="box_shadow" style="margin-top:20px;padding:15px;">
		<div style="color:gray; font-size:14px;">
			<div style="float:left;height:30px; line-height:30px">分类：</div>
			<div style="float:left;height:30px">
				<ul class="typelist">
				
				<?php
					if(strlen($typeid)==0)
						echo "<li class='on'><a href='/d/productlist?ptid=".$ptid."&cid=".$catid."'>不限</a></li>";
					else
						echo "<li><a href='/d/productlist?ptid=".$ptid."&cid=".$catid."'>不限</a></li>";
					foreach($ts as $t)
					{
						if($t->id==$typeid)
							echo "<li class='on'><a href='/d/productlist?ptid=".$ptid."&tid=".$t->id."&cid=".$catid."'>".$t->typename."</a></li>";
						else
							echo "<li><a href='/d/productlist?ptid=".$ptid."&tid=".$t->id."&cid=".$catid."'>".$t->typename."</a></li>";
					}
				?>
				<li class="clear"></li>
				</ul>
			</div>
			<div class="clear"></div>
			
		</div>
		<div style="margin-top:20px;">
			<div style="color:gray; font-size:14px;">
				<div style="float:left;height:30px; line-height:30px">风格：</div>
				<div style="float:left;height:30px">
					<ul class="typelist">
						<?php 	
							if(strlen($catid)==0)
								echo "<li class='on'><a href='/d/productlist?ptid=".$ptid."&tid=".$typeid."'>不限</a></li>";
							else
								echo "<li><a href='/d/productlist?ptid=".$ptid."&tid=".$typeid."'>不限</a></li>";
								
							foreach($cs as $c)
							{
								
							if($c->id==$catid)
								echo "<li class='on'><a href='/d/productlist?ptid=".$ptid."&tid=".$typeid."&cid=".$c->id."'>".$c->catname."</a></li>";
							else
								echo "<li><a href='/d/productlist?ptid=".$ptid."&tid=".$typeid."&cid=".$c->id."'>".$c->catname."</a></li>";
								
							}

							
						?>
						<li class="clear"></li>
					</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>

	

	
	<div class="wrap" name="wrap active" style="width:980px">

			
	<?php
		
		$where = "where status=1 and ptypeid=".$ptid;
		
		if(strlen($catid)>0)
		{
			
			$where .=" and catid='".$catid."'";
		}
		if(strlen($typeid)>0)
		{
			$where .=" and typeid='".$typeid."'";
		}
		//总数量
		$totalcount = $itemDAO->getCountByWhere($where);
		$totalcount = intval($totalcount);
		
		$where .=" order by rand() limit ".$pagesize*$pagenum.",".$pagesize;
		
		$ps = $itemDAO->findItemsByWhere($where);

		foreach($ps as $p)
		{
	?>
			<b class='mode'>
				<p class='pic'>
					<a href='<?php echo $p->buyurl?>' target="_blank"><img src='<?php echo $p->picurl?>' style='height:auto'/></a>
					
				</p>
				<span><a href='/d/item?id=<?php echo $p->id?>' target="_blank"> <?php echo $p->caption?></a></span>
				<p style="padding-top:5px;">
					<!--<a data="<?php echo $p->id?>" class="favImg">喜欢</a>

					<a class="favCount"><?php echo $p->lovenum?></a>
					<i></i>
					<span class="clear"></span>-->
					<div data-like='{
						text:"喜欢",
						skinType:1,
						type:2,
						key:"<?php echo $p->numiid ?>",
						client_id:68
					}'
					class="sns-widget">喜欢</div>
				</p>
				<p style="line-height:20px;padding-top:5px;color:#e69;">
					<?php echo $p->briefdesc?>
				</p>
			</b>
	<?php
		}
	?>

	</div>

	<div class="pagerlist" style="margin-top:10px">
		<div class="page-bottom tp">
			<?php 
				include("../includes/pager.php");
				$page = new Pager();
				
				$totalpage = ceil($totalcount/$pagesize);
				$viewpage = $page->ViewPage($totalcount,$totalpage,$pagenum,$pagesize,"ptid=".$ptid."&tid=".$typeid."&cid=".$catid,"/d/productlist");
				echo $viewpage;
			?>
		</div>
	</div>
	
	<?php include("../includes/footer.php");?>
</div>


</div>