<script src="/assets/javascripts/header.js"></script>
<div class="page">
	<div class="content">
		<?php
			include("../includes/header.php");
			
			$loginuser = $context->getBrowser();
			$username ="";
			if(!empty($loginuser))
			{
				$tnick=$loginuser->getNick();
				$tnick= htmlspecialchars($tnick);
				
				$member = $userMemberDAO->findMmeberByTnick($tnick);
				if($member)
				{
					if(strlen($member->username)===0)
					{
						$username = substr($member->tnick,0,1)."***";
					}
					else
						$username = $member->username;
				}
				else
				{
					
				}
			}
			
			
			//����post
			$postedit = isset($_POST["postedit"])?$_POST["postedit"]:"";
			if($postedit=="1")
			{
				$username = isset($_POST["username"])?$_POST["username"]:"";
				if(strlen($username)>0)
				{
					if($member)
					{
						$sth = $aimiliPDO->prepare('update user_member set username = ? WHERE id = ?');
						$sth->execute(array($username, $member->id));	
					}
				}
			}
			
		?>


		<div style="margin-top:20px;padding-left:2px;  padding-bottom:5px; margin-bottom:10px">
			<div class="box_shadow" style="padding:10px;">
				<span style="font-size:14px;color:green">�ҵ�Ь��</span>
			</div>
			<div class="box_shadow" style="padding:10px; margin-top:10px;min-height:100px;">
				<form method="POST" action="/d/userinfo">
					<input type="hidden" name="postedit" value="1" />
					<div>
						����Ь����ĳƺ���<input type="text" name="username" value="<?php echo $username;?>" />
						<input type="submit" name="submit" style="width:50px; height:20px;border:0;" value="�޸�"/>
					</div>
					<div style="padding-top:10px">
						����ǰ�Ļ�����<?php echo $member->score;?>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php include("../includes/footer.php");?>
</div>















