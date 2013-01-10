<?php

/**
 *DOMAIN的基类
 */

class BaseDO{
     /**
     * convert domain to array
     * @return array
     */
    public function toArray()
    {
        $array = array();
        foreach ($this as $key => $value) {
            $array[$key] = $value;
        }
        return $array;
    }

    /**
     * 构造函数
     * @param  $array
     * @return void
     */
     public function __construct($array){
         $this->constructFromArray($array);
     }

    /**
     * construct domain from array
     * @param $array array
     * @return domain
     */
    private  function constructFromArray($array)
    {
        foreach ($this as $key => $value) {
            $value =$array[$key];
            if(empty($array[$key])){
               $value=  $array[strtoupper($key)];
            }
            $this->$key = $value;
        }
        return $this;
    }

}

/**
 * pdo variable
 * @global
 */
//$aimiliPDO = new PDO();

$mysqlHost = "localhost";
$mysqlPort='3306';
$dbName='aimeili';
$username='root';
$password='123456';
$dbConnection='jdbc:mysql://' . $mysqlHost . ':' . $mysqlPort . '/' . $dbName . '?characterEncoding=GBK'; 
$aimiliPDO = new PDO($dbConnection, $username, $password);



