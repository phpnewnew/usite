<?php
require_once("dbconfig.php");

class ShopCat  extends BaseDO{
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
    public $displayorder;
	
	

}

/**
 * onsale item DAO
 * @author leijuan
 */
class ShopCatDAO
{
    /**
     * pdo
     * @var PDOTemplate
     */
    protected $pdo;

    /**
     * 构造函数
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
    public function findShopCatById($id)
    {
        $sql = "SELECT * FROM shop_cat WHERE id=" . $id;
        $row = $this->pdo->query($sql)->fetch();
        return new ShopCat($row);
    }
	
	 /**
     * 根据条件查询用户列表
     * @param  $userId
     * @return array
     */
    public function findShopCatsByWhere($where)
    {
        $users = array();
        $sql = "SELECT * FROM shop_cat " . $where;
        foreach ($this->pdo->query($sql) as $row) {
            $users[] = new ShopCat($row);
        }
        return $users;
    }
	
	
	


   
}

/**
 * @global
 */
$shopCatDAO = new ShopCatDAO();