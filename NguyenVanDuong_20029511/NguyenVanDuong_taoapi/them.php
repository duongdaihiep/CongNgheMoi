<?php
    include("./classtaoapi.php");
    $p=new taoAPI;
    $ten=$_REQUEST["ten"];
    $thongso=$_REQUEST["thongso"];
    $gia=$_REQUEST["gia"];
    $baohanh=$_REQUEST["baohanh"];
    if (isset($ten)&&isset($thongso)&&isset($gia)&&isset($baohanh)){
        $p->themxoasua("insert into tbl_cpu (ten,thongso,gia,baohanh) value('$ten','$thongso','$gia','$baohanh')");
        echo "thanh cong";
    }else{
        echo "error";
    } 

?>