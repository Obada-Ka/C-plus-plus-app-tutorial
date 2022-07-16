<?php

include('conn.php');
header('Content-type:application/json');
$query = "SELECT * FROM code";
$result = mysqli_query($connection , $query);

if( mysqli_num_rows($result) > 0 ) {
    

    $row=array();
    
    while( $row1 = mysqli_fetch_assoc($result)) {
        

       $row[]=$row1;
        
    }
   
   echo json_encode(array('test1_code' => $row));
    
} else {
    echo "Whoops! No Result!";
}
exec();

mysqli_close($connect);

?>
