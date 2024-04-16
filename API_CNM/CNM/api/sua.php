<?php
	include ("../myClass/classCNM.php");
	$p = new cnmoi();
	$masv=$_REQUEST['masv'];
	$hodem=$_REQUEST['hodem'];
	$ten=$_REQUEST['ten'];

	if(isset($masv) && isset($hodem) && isset($ten))
	{
		$p->themxoasua("update sinhvien set hodem='$hodem', ten='$ten' where masv='$masv'");
	}
?>