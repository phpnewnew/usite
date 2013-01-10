<?php
require_once("dbconfig.php");




/**
 * 投票条目的分类
 * @author shihong
 */
class UserMember extends BaseDO
{
    /**
     * 用户名称
     * @var name
     */
    public $username;

    /**
     * 用户id
     * @var id
     */
    public $id;

   /**
     *状态（正常1、冻结0）
     * @var status
     */
    public $status;

    /**
     * 淘宝userid
     * @var memo
     */
    public $tid;
	
	/**
     * 淘宝userid
     * @var memo
     */
    public $tnick;

    /**
     * 积分
     * @var score
     */
    public $score;

    /**
     * 记录创建时间
     * @var DateTime
     */
    public $createtime;

    /**
     * 记录最后登录时间
     * @var DateTime
     */
    public $lastlogintime;
	
	 /**
     * 记录头像
     * @var DateTime
     */
    public $avatar;

}

/**
 * 投票条目分类数据访问层
 * @author shihong
 */
class UserMemberDAO
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

  /**
   * 根据id查询用户
   * @param  $id
   * @return UserMember
   */
    public function findMmeberById($id)
    {
        $sql = "SELECT * FROM user_member WHERE id=" . $id;
        $row = $this->pdo->query($sql)->fetch();
        if($row)
			return new UserMember($row);
		else
			return null;
    }
	
	/**
   * 根据tid查询用户
   * @param  $id
   * @return UserMember
   */
    public function findMmeberByTnick($tnick)
    {
        $sql = "SELECT * FROM user_member WHERE tnick='".$tnick."'";
		$q = $this->pdo->query($sql);
		if($q==null)
			return null;
		
        $row = $q->fetch();
		if($row)
			return new UserMember($row);
		else
			return null;
    }

    /**
     * 根据条件查询用户列表
     * @param  $userId
     * @return array
     */
    public function findMembersByWhere($where)
    {
        $users = array();
        $sql = "SELECT * FROM user_member " . $where;
        foreach ($this->pdo->query($sql) as $row) {
            $users[] = new UserMember($row);
        }
        return $users;
    }

    /**
     * createVoteCat
     * @param $voteCat
     * @return catid
     */
    public function createMember($model)
    {
		
        $sth = $this->pdo->prepare('insert into user_member( username, tid, tnick, createtime,score, avatar, lastlogintime,status)
                           values(?,?,?,?,?,?,?,?)');
        $sth->execute(array($model->username, $model->tid,$model->tnick, date("Y-m-d H:i:s"),
                           $model->score,$model->avatar,date("Y-m-d H:i:s"),'1') );
						   
        return $this->pdo->lastInsertId();
    }



    /**
     * deleteVoteCat
     * @param $id number
     * @return void
     */
    public function deleteMember($id)
    {
        $sth = $this->pdo->prepare('update user_member set status = ? WHERE id = ?');
        $sth->execute(array('0', $id));
    }
}

/**
 * @global
 */
$userMemberDAO = new UserMemberDAO();

