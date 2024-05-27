<?php
include './API.php';
$p = new docAPI;

if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $p->getProducts("SELECT * FROM products WHERE product_id = " . $id);
} else if(isset($_REQUEST['os']) && isset($_REQUEST['price'])){
    $os =urldecode($_GET['os']);
    $price = urldecode($_GET['price']);
    
    if($price == 'Dưới 3.000.000'){
        $priceCondition = '< 3000000';
    } else if($price == '3.000.000-6.000.000'){
        $priceCondition = 'BETWEEN 3000000 AND 6000000';
    } else if($price == '6.000.000-12.000.000'){
        $priceCondition = 'BETWEEN 6000000 AND 12000000';
    } else if($price == 'Trên 12.000.000'){
        $priceCondition = '> 12000000';
    }
    
    if($os == "IOS"){
        $p->getProducts("SELECT * FROM products WHERE brand = 'APPLE' AND price " . $priceCondition);
    } else {
        $p->getProducts("SELECT * FROM products WHERE brand != 'APPLE' AND price " . $priceCondition);
    }
} else {
    $p->getProducts("SELECT * FROM products");
}
?>
