<?php
include('conn.php');
$sql = "SELECT * FROM participants_students ";
$sqlCommand = mysqli_query($connection,$sql);
$out = array();

if( mysqli_num_rows($sqlCommand) > 0 ) {
    while($row2 = mysqli_fetch_assoc( $sqlCommand )) {
        
        $out[] = $row2;
    }  
    }
echo json_encode ($out);

?>