<?php

class cnmoi {

	private function connect() 
	{
		$conn = mysql_connect("localhost", "cnmoi", "123");	
		if(!$conn) {
			echo 'Khong the ket noi duoc csdl';
			exit();
		}
		else {
			mysql_select_db("cnmoi_db");
			mysql_query("SET NAMES UTF8");
			return $conn;
		}
	}

	public function xemSV($sql) {
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if($i > 0) 
		{
			$dulieu = array();
			while($row = mysql_fetch_array($ketqua)) 
			{
				$id = $row['id'];
				$masv = $row['masv'];
				$hodem = $row['hodem'];
				$ten = $row['ten'];
				$dulieu[] = array('id'=>$id, 'masv'=>$masv, 'hodem'=>$hodem, 'ten'=>$ten);
			}
			header("content-Type:application/json; charset = UTF-8");
			echo json_encode($dulieu);

		} else {
			echo 'Khong co du lieu';
		}
	} 

	public function themXoaSua($sql)
	{
		$link=$this->connect();
		if(mysql_query($sql,$link))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
}

?>