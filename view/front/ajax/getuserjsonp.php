<?php	include("../../../dao/user_member_dao.php");	$callback = $_GET["callback"]; 	$_loginUser = $context->getBrowser();	$username ="";	$member = null;	if(!empty($_loginUser))	{			$tnick=$_loginUser->getNick();						$tnick= htmlspecialchars($tnick);						$member = $userMemberDAO->findMmeberByTnick($tnick);		if($member)		{			if(strlen($member->username) >0)				$username = $member->username;			else				$username = substr($tnick,0,1)."***";		}		else		{			$user = new UserMember();			$user->username="";			$user->status="1";			$user->tid = "";			$user->tnick = $tnick;			$user->score="10";			$user->avatar="";								$pk = $userMemberDAO->createMember($user);			if($pk >0)				$username = substr($tnick,0,1)."***";					}	}		echo $callback.'({"username":"'.$username.'"})'; ?>