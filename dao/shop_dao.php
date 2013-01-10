<?php
require_once("dbconfig.php");


class Shop extends BaseDO
{
	/**
     * @var
     */
    public $id;
	
	/**
     * @var
     */
    public $sid;
	
	/**
     * @var
     */
    public $shopname;

     /**
     * @var
     */
    public $shoplogo;

    /**
     * @var
     */
    public $catid;
	
	/**
     * @var
     */
    public $status;
	
	/**
     * @var
     */
    public $createtime;
	
	/**
     * @var
     */
    public $nick;
	
	public $briefdesc;
	
	public $picurl;
	public $shopurl;
	
	public $isrecommand;
	
	public $lovenum;
	
	public $displayorder;
	
	public $viewnum;
	
	
	public function getClickUrl()
	{
		return $shopurl."?nick_uz=".$nick;
	}
	

}


class ShopDAO
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


    public function findShopById($id)
    {
        $sql = "SELECT * FROM shop WHERE id=" .$id;
        $row = $this->pdo->query($sql)->fetch();
        return new Shop($row);
    }
	
	public function findShopByWhere($where)
    {
        $sql = "SELECT * FROM shop " .$where;
        $row = $this->pdo->query($sql)->fetch();
        return new Shop($row);
    }
	
	public function getCountByWhere($where)
	{
		$sql = "SELECT count(id) as ct FROM shop " .$where;
        $row = $this->pdo->query($sql)->fetch();
		if($row)
			return $row["ct"];
		else
			return 0;
		
	}
	
    public function findShopsByWhere($where)
    {
		
		$ps = array();
        $sql = "SELECT * FROM shop ".$where;
        foreach ($this->pdo->query($sql) as $row) {
	
            $ps[] = new Shop($row);
        }
        return $ps;
    }
	
	public function createShop($model)
    {
		
        $sth = $this->pdo->prepare('insert into shop( shopname, sid,picurl,shoplogo, catid,status, createtime, nick,briefdesc,shopurl,isrecommand,lovenum,displayorder,viewnum)
                           values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
        $sth->execute(array($model->shopname,$model->sid,$model->picurl, $model->shoplogo, $model->catid,$model->status,$model->createtime,$model->nick,$model->briefdesc,$model->shopurl,$model->isrecommand,$model->lovenum,$model->displayorder,"0") );
        return $this->pdo->lastInsertId();
    }
	
	
	public function updateItem($model)
    {
		$sql = "update shop set shopname=?,picurl=?,shoplogo=?,catid=?,displayorder=?,briefdesc=?,isrecommand=?,status=?,viewnum=? where id=?";
        $sth = $this->pdo->prepare($sql);
        $sth->execute(array($model->shopname, $model->picurl, $model->shoplogo,$model->catid, $model->displayorder,$model->briefdesc,$model->isrecommand,$model->status,$model->viewnum,$model->id));
    }
	
	public function addViewNum($id)
	{
		$this->pdo->exec("update shop set viewnum=viewnum+1 where id=".$id);
	}

  
}

/**
 * @global
 */
$shopDAO = new ShopDAO();

