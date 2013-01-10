<?php
require_once("dbconfig.php");


class Item extends BaseDO
{
	/**
     * @var
     */
    public $id;
	
	/**
     * @var
     */
    public $numiid;

     /**
     * @var
     */
    public $caption;

    /**
     * @var
     */
    public $picurl;
	
	/**
     * @var
     */
    public $buyurl;
	
	/**
     * @var
     */
    public $catid;
	
	/**
     * @var
     */
    public $typeid;
	
	public $ptypeid;
	
	public $status;
	
	public $lovenum;
	
	public $createtime;
	
	public $seller;
	
	public $displayorder;
	
	public $briefdesc;
	
	public $marketprice;
	public $price;
	
	public $ishot;
	
	public $isnew;
	
	public $isrecommand;
	
	public $begintime;
	
	public $endtime;
	
	public $source;
	public $contact;

}


class ItemDAO
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


    public function findItemById($id)
    {
        $sql = "SELECT * FROM item WHERE id=" .$id;
        $row = $this->pdo->query($sql)->fetch();
        return new Item($row);
    }
	
	public function findItemByNumIid($numiid)
    {
        $sql = "SELECT * FROM item WHERE numiid=" .$numiid;
        $row = $this->pdo->query($sql)->fetch();
		if($row)
			return new Item($row);
		else
			return null;
    }
	
    public function findItemsByWhere($where)
    {
		
		$ps = array();
        $sql = "SELECT * FROM item ".$where;
        foreach ($this->pdo->query($sql) as $row) {
	
            $ps[] = new Item($row);
        }
        return $ps;
    }
	
	public function getCountByWhere($where)
	{
		$sql = "SELECT count(id) as ct FROM item " .$where;
        $row = $this->pdo->query($sql)->fetch();
		if($row)
			return $row["ct"];
		else
			return 0;
		
	}
	
	
	public function createItem($model)
    {
		
        $sth = $this->pdo->prepare('insert into item( numiid, caption, picurl,buyurl, catid, typeid,createtime,seller,status,lovenum,displayorder,briefdesc,price,ishot,isnew,isrecommand,ptypeid,marketprice,begintime,endtime,source,contact)
                           values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
        $sth->execute(array($model->numiid, $model->caption, $model->picurl,$model->buyurl,$model->catid,$model->typeid,date("Y-m-d H:i:s"),
                           $model->seller,$model->status,$model->lovenum,$model->displayorder,$model->briefdesc,$model->price,$model->ishot,$model->isnew,$model->isrecommand,$model->ptypeid,$model->marketprice,$model->begintime,$model->endtime,$model->source,$model->contact) );
        return $this->pdo->lastInsertId();
    }
	
	public function updateItem($model)
    {
        $sth = $this->pdo->prepare('update item set caption = ?, picurl = ?, price = ?, buyurl = ?, catid = ?, seller = ? , displayorder = ?,briefdesc=?,ishot=?,isnew=?,isrecommand=?,typeid=?,ptypeid=? ,marketprice=?,begintime=?,endtime=?,status=?  WHERE id = ?');
        $sth->execute(array($model->caption, $model->picurl, $model->price,$model->buyurl, $model->catid,$model->seller,$model->displayorder,$model->briefdesc,$model->ishot,$model->isnew,$model->isrecommand,$model->typeid,$model->ptypeid,$model->marketprice,$model->begintime,
		$model->endtime,$model->status,$model->id));
    }
	public function deleteItem($id)
    {
       
        $this->pdo->exec("delete from item where id=".$id."");
    }
	public function auditItem($id)
    {
       
        $this->pdo->exec("update item set status=1 where id=".$id."");
    }

  
}

/**
 * @global
 */
$itemDAO = new ItemDAO();

