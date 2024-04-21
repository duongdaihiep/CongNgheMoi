<?php
    include("./classtaoapi.php");
    $p=new taoAPI;
    $id=$_REQUEST["id"];
    echo $id;
    if (isset($id)){
        $p->themxoasua("delete from TBL_cpu where id=$id");
        echo "thanh cong";
    }
    else {
        echo "khong thanh cong";
    }



?>