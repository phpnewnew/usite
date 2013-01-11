<?php
include("../dao/sto_product_dao.php");




function findProducts($where){
    global $stoProductDAO;
    $items = $stoProductDAO->findProductsByWhere($where);
    return json_encode($items);
}

?>
