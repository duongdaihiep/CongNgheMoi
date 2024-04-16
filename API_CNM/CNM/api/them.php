<?php
	include ("../myClass/classCNM.php");
	$p = new cnmoi();
	$masv=$_REQUEST['masv'];
	$hodem=$_REQUEST['hodem'];
	$ten=$_REQUEST['ten'];
	
	if(isset($masv) && isset($hodem) && isset($ten))
	{
		$p->themXoaSua("insert into sinhvien(masv,hodem,ten) values ('$masv','$hodem','$ten')");
	}
?>