<?php
    include('conn.php');
    include ('compile.php');
?>

<html>
<head></head>
<style>
.txterea{
resize: none;
outline: none;
width: 300px;
height: 400px;
border: 3px solid #ccc;
padding: 5px; font-family: Tahoma, sans-serif;
background-position: bottom right;
background-repeat: no-repeat;
font-size: 25px;
color: #000;
}
</style>
<body>
<form method="POST">
  <textarea name="cppcode" style="background:white" placeholder="enter C++" class="txterea"><?php
$c = array();
$query = "SELECT code FROM questionscode WHERE qID = 2";
$result = mysqli_query($connection , $query);
if( mysqli_num_rows($result) > 0 ) {
       while($row = mysqli_fetch_assoc( $result )) {

           $c[] = $row['code'];
           echo $c[0];
}  
    
} else {
    echo "Whoops! No Result!";
}
mysqli_close($connect);
       
?></textarea>
  
<textarea class="form-control" name="cppcode3" style="background:white" placeholder="inputs" rows="10" cols="50">
<?php

$query = "SELECT input FROM inputs WHERE questionID = 2";
$result = mysqli_query($connection , $query);
$in = array();
if( mysqli_num_rows($result) > 0 ) {
       while($row = mysqli_fetch_assoc( $result )) {
           $in[] = $row['input'];
           
}
    
    
} else {
    echo "Whoops! No Result!";
}
  /* for($i = 0; $i<sizeof($in) ; $i++){
                    echo $in[$i] ;
                    echo PHP_EOL;
    } */
    $query = "SELECT output FROM inputs WHERE questionID = 2";
    $result = mysqli_query($connection , $query);
    $counter = 0;
    $out = array();
    $o = array();
    $row2 = array();
    if( mysqli_num_rows($result) > 0 ) {
       while($row2 = mysqli_fetch_assoc( $result )) {
           $out[] = $row2['output'];
        }  
        } else {
            echo "Whoops! No Result!";
        }
    mysqli_close($connect);
    for($i = 0; $i<sizeof($in) ; $i++){
                   
                    $o[] =  compiler($c[$i],
                    $in[$i]);
        //echo $o[$i];
       // echo PHP_EOL;
       // echo $out[$i];
        
    
    }
    
    for($i = 0; $i < 1 ; $i++){
      $x=  str_replace("\r\n","\n",$out[$i]);
      echo $x;
         echo strcmp($o[$i],$out[$i]);
        if(strcmp($o[$i],$x)== 0){
          
            $counter = $counter + 1;
        }
        else {
            
           $counter = $counter - 1;
        }    
           //echo $o[$i];
           //echo $out[$i];
        //    echo strlen($o[$i]);
        //    echo strlen($out[$i]);
           for($j = 0; $j <= strlen($x) ; $j++){
        
            echo "The value in out[ " . $j ."] is = ". ord($x[$j]);
            //if(ord($out[$i][$j])==13) $out[$i][$j]=10;
            echo PHP_EOL;
            //str_replace 
            
            }
            for($j = 0; $j <= strlen($o[$i]) ; $j++){
        
                echo "The value in o[ " . $j ."] is = ". ord($o[$i][$j]);
                echo PHP_EOL;
                }
                
        
    }
      
   
      
       
?>  
</textarea>
    
   
  <textarea name="cppcode2" style="background:white" placeholder="See result" disabled class="txterea">

 <?php      
      if($counter == sizeof($out)){
          echo "done";
         
          
      }
      else {
          echo "uncorrect!";
          

          
      }
          
          
        
   
 ?></textarea>
    <textarea name="cppcode4" style="background:white" placeholder="errors" disabled class="txterea"> <?php if($error=="C:/Program Files (x86)/Dev-Cpp/MinGW64/bin/../lib/gcc/x86_64-w64-mingw32/4.9.2/../../../../x86_64-w64-mingw32/lib/../lib/libmingw32.a(lib64_libmingw32_a-crt0_c.o): In function `main':
C:/crossdev/src/mingw-w64-v3-git/mingw-w64-crt/crt/crt0_c.c:18: undefined reference to `WinMain'
collect2.exe: error: ld returned 1 exit status
"){echo "";} else echo $error; ?></textarea>
</form>
</body>
</html>