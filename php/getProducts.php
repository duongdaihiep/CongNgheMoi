<?php
    include './API.php';
    $p= new docAPI;
    $id=$_REQUEST['id'];
    if(isset($id)){
        $p->getProducts("SELECT * FROM products WHERE product_id = " . $id);
    }else{
        $p->getProducts("SELECT * FROM products");
    }
?>