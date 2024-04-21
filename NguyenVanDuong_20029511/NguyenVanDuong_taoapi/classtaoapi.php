<?php
    class taoAPI{
        private function connect(){
           $conn=mysql_connect("localhost","duong","123456");
           if (!$conn){
            echo "khongo et noi duoc csdl";
           }
           else {
            mysql_selectdb("test_gk");
            mysql_query("SET NAME UTF8");
            return $conn; 
           }
        }
        public function xemcpu($sql){
            $link=$this->connect();
            $ketqua=mysql_query($sql,$link);
            $i=mysql_num_rows($ketqua);
            if($i>0){
                $dulieu=array();
                while($row=mysql_fetch_array($ketqua)){
                    $id=$row["id"];
                    $ten=$row["ten"];
                    $thongso=$row["thongso"];
                    $gia=$row["gia"];
                    $baohanh=$row["baohanh"];
                    $dulieu[]=array("id"=>$id,"ten"=>$ten,"thongso"=>$thongso,"gia"=>$gia,"baohanh"=>$baohanh);
                }
                header('Content-Type:application/json; charset:utf-8');
                echo json_encode($dulieu);
            }else{
                echo "khong co du lieu";
            }
        }
        public function themxoasua($sql){
            $link=$this->connect();


            if(!mysql_query($sql,$link)){
                 return 0;
            }else {               
                return 1;
            }

        }
    }
?>