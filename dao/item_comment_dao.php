<?php
require_once("dbconfig.php");


class ItemComment extends BaseDO
{
	/**
     * @var
     */
    public $id;
	
	/**
     * @var
     */
    public $itemid;

     /**
     * @var
     */
    public $userid;

    /**
     * @var
     */
    public $comment;
	
	/**
     * @var
     */
    public $createtime;
	
	

}


class ItemCommentDAO
{
    /**
     *
     * @var $pdo
    */
    protected $pdo;

    public function __construct()
    {
        global $aimiliPDO ;
        $this->pdo = $aimiliPDO;
    }


    public function findById($id)
    {
        $sql = "SELECT * FROM item_comment WHERE id=" .$id;
        $row = $this->pdo->query($sql)->fetch();
        return new ItemComment($row);
    }
	
    public function findAllByWhere($where)
    {
		
		$ps = array();
        $sql = "SELECT * FROM item_comment ".$where;
        foreach ($this->pdo->query($sql) as $row) {
	
            $ps[] = new ItemComment($row);
        }
        return $ps;
    }

  
}

/**
 * @global
 */
$itemCommentDAO = new ItemCommentDAO();

