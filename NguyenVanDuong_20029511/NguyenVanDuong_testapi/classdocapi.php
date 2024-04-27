<?php
    class docAPI{
        private function getByUrl($url){
            $client=curl_init($url);
            curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
            $response=curl_exec($client);
            $results=json_decode($response);
            return $results;
        }
        public function xuatTBL_CPU($url){
            $results=$this->getByUrl($url);
            echo '<table width="800" border="1">
            <tbody>
              <tr>
                <td>stt</td>
                <td>ten</td>
                <td>thongso </td>
                <td>gia</td>
                <td>bao hanh</td>
              </tr>';
            foreach($results as $data){
                echo '<tr>
                <td>'.$data->id.'</td>
                <td>'.$data->ten.'</td>
                <td>'.$data->thongso.'</td>
                <td>'.$data->gia.'</td>
                <td>'.$data->baohanh.'</td>
              </tr>';
            }
            echo '</tbody>
            </table>';
        }
    }




?>
