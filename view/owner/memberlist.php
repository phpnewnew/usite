<?
  include("../../dao/user_member_dao.php");
  
  $member = new UserMember();
  $member->username = "huangyang_110";
  $member->tid = "13699922";
  $member->score = "0";
  $member->avatar = "";
  
  $rtn = $userMemberDAO->createMember($member);
  echo $rtn;
  
  
?>