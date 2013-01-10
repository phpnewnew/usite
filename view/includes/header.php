<?php
include("../../dao/user_member_dao.php");
?>
<input type="hidden" class="domain" value="<?php echo $_taeServer?>" />
<div style=" width:950px; " >
	<div class="headertop">
		<div style="float:left">
			<img src="/assets/images/logo_3.png" />
		</div>
		<div class="clear"></div>
		<div class="likeuz">&nbsp;</div>
	</div>
	
	<div style="padding-left:10px">
		<div style="float:left">
			<div style=" margin-right:20px; min-width:80px; height:26px;line-height:26px; clear:both">
				»¶Ó­Äú
				<a href="/d/userinfo" class="username">
					
				</a> 
			</div>
		</div>
		<div style="float:left">
			<div>
				<div data-sharebtn='{
				 skinType:3,
				 type:"webpage",
				 app_id:"1100061",
				 key:"xxx.uz.taobao.com",
				 comment:"#ÓÆÓÆUÕ¾#ÓÆÓÆUÕ¾½éÉÜ",
				 pic:"http://img01.taobaocdn.com/imgextra/i1/130896155/T2778SXjFdXXXXXXXX_!!130896155.png",
				 title:"ÓÆÓÆUÕ¾",
				 client_id:123456, 
				 isShowFriend:false
				}'
				class="sns-widget sns-sharebtn sns-widget-ui sns-sharebtn-index">	
				</div>
			</div>
			
		</div>
		
		<div class="clear"></div>
	</div>
	<div style="height:30px; margin-top:10px;">
		<?php 
			$URL=$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			$homeclass = "";
			$productclass1 ="";
			$productclass2 ="";
			$productclass3 ="";
			$s12class ="";
			$shopclass="";
			$zsclass ="";
			if(strpos($URL,'index'))
			{
				$homeclass="on";
			}
			else if(strpos($URL,'dapei'))
			{
				$dapeiclass="on";
			}
			else if(strpos($URL,'productlist'))
			{
				
				
				$ptid = isset($_GET["ptid"])?$_GET["ptid"]:"";
				
				
				
				if($ptid =="1")
				{
					$productclass1="on";
				}
				else if($ptid =="20")
					$productclass2="on";
				else if($ptid =="30")
					$productclass3="on";
			
			}
			else if(strpos($URL,'s12'))
			{
				$s12class="on";
			}
			else if(strpos($URL,'shop'))
			{
				$shopclass="on";
			}
			else if(strpos($URL,'zs')||strpos($URL,'baoming')||strpos($URL,'chaxun'))
			{
				$zsclass="on";
			}
			else
				$homeclass="on";
		?>
		<ul class="nav">
			
			<li  class="<?php echo $homeclass;?>"><a href="/d/index">Ê×Ò³</a></li>
			<!--<li class="<?php echo $s12class;?>"><a href="/d/s12">Ë«12Ð¬»á</a></li>-->
			<li class="<?php echo $productclass1;?>"><a href="/d/productlist?ptid=1">ÉÌÆ·Ò³</a></li>
			<li class="<?php echo $zsclass;?>" ><a href="/d/zs">ÕÐÉÌÒ³</a></li>
		</ul>
	</div>
	
</div>



