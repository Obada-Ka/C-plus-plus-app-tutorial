<?php
    include('conn.php');
    include('compile.php');
    
    class general {
        
        public function getCode(){
            $connection = new mysqli("localhost", "root", "","tutorial2");
            $sqlCommand = $connection->Prepare("SELECT code FROM questionscode WHERE qID = ?");
            $sqlCommand->bind_param('i',$_GET["idCode"]);
            $sqlCommand->execute();
            $code = array();
            $result = $sqlCommand->get_result();
            if( mysqli_num_rows($result) > 0 ) {
                while($row2 = mysqli_fetch_assoc( $result )) {

                    $code = $row2['code'];
                }  
                } else {
                    echo "Whoops! No Result!";
                }

                return $code;

        }
        public function Student1000(){
            $connection = new mysqli("localhost", "root", "","tutorial2");
            mysqli_set_charset($connection,"utf8");
            $sqlCommand = "SELECT * FROM student WHERE tid = 1000";
                $result5 = array();
                $result4 = mysqli_query($connection,$sqlCommand) or die (mysqli_error($connection));
                mysqli_close($connection);
                if( mysqli_num_rows($result4) > 0 ) {
                    $row1=array();
                    while( $row1 = mysqli_fetch_assoc($result4)) {
                        
                      
                       $result5=$row1;
                        
                    }
                    header("Content-Type: application/json; charset=UTF-8");
                    
                    print(json_encode($row,JSON_UNESCAPED_UNICODE));
                   
                    
                } else {
                    echo "Whoops! No Result!";
                }
                return $result5;

        }
        public function upstudent($id,$tid){
            header("Content-Type: application/json; charset=UTF-8");
            $connection = new mysqli("localhost", "root", "","tutorial2");
            for($i = 0 ; $i<sizeof($id) ; $i++) {
            $sql = "UPDATE student SET tid = '$tid[$i]' WHERE id = '$id[$i]' ";
            $sqlCommand = mysqli_query($connection,$sql);
            }
        }
        public function getQues(){
            $connection = new mysqli("localhost", "root", "","tutorial2");
            mysqli_set_charset($connection,"utf8");
            $sqlCommand = "SELECT * FROM questions";
                $result4 = array();
                $result4 = mysqli_query($connection,$sqlCommand) or die (mysqli_error($connection));
                mysqli_close($connection);
                if( mysqli_num_rows($result4) > 0 ) {
                    $row=array();
                    while( $row1 = mysqli_fetch_assoc($result4)) {
                        
                      
                       $row[]=$row1;
                        
                    }
                    header("Content-Type: application/json; charset=UTF-8");
                    
                    print(json_encode($row,JSON_UNESCAPED_UNICODE));
                   
                    
                } else {
                    echo "Whoops! No Result!";
                }

           

        }
        public function getHques(){
            header("Content-Type: application/json; charset=UTF-8");
            $connection = new mysqli("localhost", "root", "","tutorial2");
            $sqlCommand = $connection->Prepare("SELECT * FROM homeques WHERE tid = ? ");
            mysqli_query($connection,"SET NAMES 'utf8'");
            $sqlCommand->bind_param('i',$_GET["tid"]);
            $sqlCommand->execute();
            $stu = array();
            $result = $sqlCommand->get_result();
            if( mysqli_num_rows($result) > 0 ) {
                while($row2 = mysqli_fetch_assoc( $result )) {

                    $stu[] = $row2;
                   
                } 
                   
                #print(json_encode($stu,JSON_UNESCAPED_UNICODE));
                } else {
                    echo "Whoops! No Result!";
                } 
                

                #return array($stu,$qu);
                return $stu;

        }
        public function student($e,$p){
            header("Content-Type: application/json; charset=UTF-8");

            $connection = new mysqli("localhost", "root", "","tutorial2");
            $sql = "SELECT * FROM student WHERE email = '$e' and password ='$p' ";
            mysqli_query($connection,"SET NAMES 'utf8'");
            $sqlCommand = mysqli_query($connection,$sql);
            $hq = array();
            if( mysqli_num_rows($sqlCommand) > 0 ) {
                while($row2 = mysqli_fetch_assoc( $sqlCommand )) {

                    $hq[] = $row2;
                }  
                    
                json_encode($hq,JSON_UNESCAPED_UNICODE);
                } else {
                    echo "Whoops! No Result!";
                }
            return $hq;

        }
        
        public function teacher1($e,$p){
            header("Content-Type: application/json; charset=UTF-8");
            $connection = new mysqli("localhost", "root", "","tutorial2");
            $sql = "SELECT * FROM teacher WHERE email = '$e' and password ='$p' ";
            mysqli_query($connection,"SET NAMES 'utf8'");
            $sqlCommand = mysqli_query($connection,$sql);
            $hp = array();
            if( mysqli_num_rows($sqlCommand) > 0 ) {
                while($row2 = mysqli_fetch_assoc( $sqlCommand )) {

                    $hp = $row2;
                }  
                    
                //print(json_encode($hq,JSON_UNESCAPED_UNICODE));
                } else {
                    echo "Whoops! No Result!";
                }
            return $hp;

        }

        public function Teacher(){
            $connection = new mysqli("localhost", "root", "","tutorial2");
            mysqli_set_charset($connection,"utf8");
            $sqlCommand = "SELECT * FROM teacher";
                $result4 = array();
                $result4 = mysqli_query($connection,$sqlCommand) or die (mysqli_error($connection));
                mysqli_close($connection);
                if( mysqli_num_rows($result4) > 0 ) {
                    $row=array();
                    while( $row1 = mysqli_fetch_assoc($result4)) {
                        
                      
                       $row[]=$row1;
                        
                    }
                    header("Content-Type: application/json; charset=UTF-8");
                    
                    print(json_encode($row,JSON_UNESCAPED_UNICODE));
                   
                    
                } else {
                    echo "Whoops! No Result!";
                }


        }
    
        public function getStu(){
            $connection = new mysqli("localhost", "root", "","tutorial2");
            $sqlCommand = $connection->Prepare("SELECT * FROM homeworks WHERE tid = ? and qid=?");
            $sqlCommand->bind_param('ii',$_GET["tid"],$_GET["qid"]);
            $sqlCommand->execute();
            $stu = array();
            $result = $sqlCommand->get_result();
            if( mysqli_num_rows($result) > 0 ) {
                while($row2 = mysqli_fetch_assoc( $result )) {

                    $stu[] = $row2;
                
                   
                }  
                } else {
                    echo "Whoops! No Result!";
                }

                #return array($stu,$qu);
                return $stu;

        }
        

           
        public function getInputs($qID){
            $connection = new mysqli("localhost", "root", "","tutorial2");
            $sql = "SELECT input FROM inputs WHERE questionID = $qID";
            $sqlCommand = mysqli_query($connection,$sql);
            $inp = array();
            if( mysqli_num_rows($sqlCommand) > 0 ) {
                while($row2 = mysqli_fetch_assoc( $sqlCommand )) {

                    $inp[] = $row2['input'];
                }  
                } else {
                    echo "Whoops! No Result!";
                }
            return $inp;

        }
    

        public function getOutputs($qID){
            $connection = new mysqli("localhost", "root", "","tutorial2");
            $sql = "SELECT output FROM inputs WHERE questionID = $qID";
            $sqlCommand = mysqli_query($connection,$sql);
            $out = array();
            if( mysqli_num_rows($sqlCommand) > 0 ) {
                while($row2 = mysqli_fetch_assoc( $sqlCommand )) {
                    
                    $out[] = $row2['output'];
                }  
                } else {
                    echo "Whoops! No Result!";
                }
            return $out;
        }

        public function checkCode($Code , $Inputs=array(), $Out = array() ){
            $CheckOutputs = array();
            $counter = 0;
            $ok = false;

            for($i = 0; $i<sizeof($Inputs) ; $i++){
                
                 $CheckOutputs[] = compiler($Code,
                 $Inputs[$i]);
                 if (strpos($CheckOutputs[$i],"error")!=false)
                 {
                     $ok = true;
                     break;
                     
                 }
                }
                
            if($ok == false){
            for($i = 0; $i < sizeof($Out) ; $i++){
                $x=  str_replace("\r\n","\n",$Out[$i]);
                if(strcmp($CheckOutputs[$i],$x)== 0){
                        
                      $counter = $counter + 1;
                      $correct [$i] = 1;
                  }
                  else {
                      
                     $counter = $counter - 1;
                     $correct[$i] = 0;
                  }
            }
            if($counter == sizeof($Out)){
                echo json_encode(array('result' => $res = 'Accepted'));
                return true;
               
                
            }
            else {
                 //json_encode(array('result' => $res2 = 'uncorrect'));
                 
                
                for ($j = 0 ; $j<sizeof($correct) ; $j++){
                    if($correct[$j] == 0){
                    $uncorrect1[] = $Inputs[$j];
                    $uncorrect2[] = $Out[$j];
                    }
                }
                
                
                //echo json_encode();
                //echo json_encode(array('outputs' => $res3 = str_replace("\r\n","",$uncorrect2)));
                $arr = array('result'=>'uncorrect' , 'Wrong inputs'=>$uncorrect1=str_replace("\r\n"," ",$uncorrect1) , 'Wrong outputs'=>$uncorrect2=str_replace("\r\n","",$uncorrect2));
                echo json_encode($arr);
             }
            }
            elseif($ok == true)
            {
                echo json_encode(array('errors' => $res4 = str_replace("\r\n","",explode('main.cpp:',$CheckOutputs[0]))));
            }
       
        }
        public function upparticipants($id,$status){
            header("Content-Type: application/json; charset=UTF-8");
            $connection = new mysqli("localhost", "root", "","tutorial2");
            for($i = 0 ; $i<sizeof($id) ; $i++) {
            $sql = "UPDATE participants_students SET status = '$status[$i]' WHERE id = '$id[$i]' ";
            $sqlCommand = mysqli_query($connection,$sql);
            }
        }
    }



?>