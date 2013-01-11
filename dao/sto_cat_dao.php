<?php
require_once("dbconfig.php");

class StoCat  extends BaseDO{
    /**
     * @var
     */
    public $id;

     /**
     * @var
     */
    public $status;

    /**
     * @var
     */
    public $catname;
	/**
     * @var
     */
    public $picurl;
	
	public $ptypeid;
	
	public $memo;

}

/**
 * onsale item DAO
 * @author leijuan
 */
class StoCatDAO
{
    /**
     * pdo
     * @var PDOTemplate
     */
    protected $pdo;

    /**
     * ���캯��
     * @param $pdo PDOTemplate pdo template
     */
    public function __construct()
    {
        global $aimiliPDO;
        $this->pdo =  $aimiliPDO;
    }

    /**
     * find onsale item by id
     * @param $id string item id
     * @return VoteInfo
     */
    public function findStoCatById($id)
    {
        $sql = "SELECT * FROM sto_cat WHERE id=" . $id;
        $row = $this->pdo->query($sql)->fetch();
        return new StoCat($row);
    }
	
	 /**
     * ����������ѯ�û��б�
     * @param  $userId
     * @return array
     */
    public function findCatsByWhere($where)
    {
        $users = array();
        $sql = "SELECT * FROM sto_cat " . $where;
        foreach ($this->pdo->query($sql) as $row) {
            $users[] = new StoCat($row);
        }
        return $users;
    }

	
   
}

/**
 * @global
 */
$stoCatDAO = new StoCatDAO();