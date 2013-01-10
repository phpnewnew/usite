<?php
include("../dao/vote_cat_dao.php");
include("../dao/vote_item_dao.php");
include("../dao/vote_info_dao.php");

/**
 * ����ͶƱ
 * @param  $jsonInfo ͶƱ��Ϣ
 * @return number
 */
function addVoteInfo($jsonInfo)
{
    global $voteInfoDAO;
    $item = json_decode($jsonInfo,true);
    $voteInfo = new VoteInfo($item);

    return $voteInfoDAO->createVoteInfo($voteInfo);
}

function findVoteInfosBySellerId($userId){
    global $voteInfoDAO;
    $items = $voteInfoDAO->findVoteInfosBySellerId($userId);
    return json_encode($items);
}

/**
 * ��ѯͶƱ�������
 * @para $userId ����
 * @return string json����
 */
function queryVoteResult($userId)
{
    global $voteInfoDAO;
    $items = $voteInfoDAO->findVoteResultBySellerId($userId);
    return json_encode($items);
}

/**
 * ���ͶƱ��Ŀ
 * @param  $jsonInfo ͶƱ��Ŀ
 * @return number
 */
function addVoteitem($jsonInfo)
{
    global $voteItemDAO;
    $item = json_decode($jsonInfo,true);
    $voteItem = new VoteItem($item);
    return $voteItemDAO->createVoteItem($voteItem);
}

/**
 * ��ȡ����ͶƱ��Ŀ
 * @param  $userId ����
 * @return string
 */
function queryVoteItems($userId)
{
    global $voteItemDAO;
    $items = array();
    $items = $voteItemDAO->findVoteItemsBySellerId($userId);
    return json_encode($items);
}

/**
 * ɾ��ͶƱ��Ŀ
 * @param  $userId ����
 * @return string
 */
function deleteVoteItem($userId, $id)
{
    global $voteItemDAO;
    $voteItemDAO->deleteVoteItem($userId, $id);
}

?>
