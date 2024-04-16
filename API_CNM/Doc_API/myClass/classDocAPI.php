<?php
	class docapi {
		private function getbyurl($url) 
		{

			$client=curl_init($url);
			curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
			$response=curl_exec($client);
			$results=json_decode($response);
			return $results;
			
		}
		public function xuatDanhSachSV($url)
		{
			$results=$this->getbyurl($url);
			echo '<table width="600" border="1" align="center" cellpadding="5" cellspacing="0">
					<tbody>
						<tr>
							<td width="60" align="center"> <b>STT</b> </td>
							<td width="150" align="center"> <b>MSSV</b> </td>
							<td width="260" align="center"> <b>Ho Dem</b> </td>
							<td width="100" align="center"> <b>Ten</b> </td>
						</tr>';	
			$dem=1;
			
			foreach($results as $data) {
				echo '<tr>
							<td align="center">'.$dem.'</td>
							<td align="center">'.$data->masv.'</td>
							<td align="center">'.$data->hodem.'</td>
							<td align="center">'.$data->ten.'</td>
					</tr>';
				$dem++;
			}
				echo '</tbody>
					</table>';
		}
	}
?>