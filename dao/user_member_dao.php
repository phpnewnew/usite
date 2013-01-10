<?php
require_once("dbconfig.php");




/**
 * ͶƱ��Ŀ�ķ���
 * @author shihong
 */
class UserMember extends BaseDO
{
    /**
     * �û�����
     * @var name
     */
    public $username;

    /**
     * �û�id
     * @var id
     */
    public $id;

   /**
     *״̬������1������0��
     * @var status
     */
    public $status;

    /**
     * �Ա�userid
     * @var memo
     */
    public $tid;
	
	/**
     * �Ա�userid
     * @var memo
     */
    public $tnick;

    /**
     * ����
     * @var score
     */
    public $score;

    /**
     * ��¼����ʱ��
     * @var DateTime
     */
    public $createtime;

    /**
     * ��¼����¼ʱ��
     * @var DateTime
     */
    public $lastlogintime;
	
	 /**
     * ��¼ͷ��
     * @var DateTime
     */
    public $avatar;

}

/**
 * ͶƱ��Ŀ�������ݷ��ʲ�
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
   * ����id��ѯ�û�
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
   * ����tid��ѯ�û�
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
     * ����������ѯ�û��б�
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

