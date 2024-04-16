<?php
    include ("../myClass/classCNM.php");
    $p = new cnmoi();
    $masv = $_REQUEST['masv'];
    if(isset($masv)) {

        $p->xemSV("select * from sinhvien where masv = '$masv' order by id asc");

    } else {

        $p->xemSV("select * from sinhvien order by id asc");

    }
?>