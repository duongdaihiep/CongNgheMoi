<?php 
	include ("../myClass/classCNM.php");
	$p = new cnmoi();
	$masv=$_REQUEST['masv'];

	if(isset($masv))
	{
		$p->themxoasua("delete from sinhvien where masv = '$masv'");
	}
?>