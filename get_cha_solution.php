<?php
include('conn.php');
header("Content-Type: application/json; charset=UTF-8");
header('Content-type: text/html; charset=UTF-8');
$postdata = file_get_contents("php://input");
$post = json_decode($postdata);
$hq = array();
$connection = new mysqli("localhost", "root", "","tutorial2");
if (empty($postdata)==false) {
    
       $qID = $post->qID;
       
}
    $result = mysqli_query($connection,"SELECT code FROM questionscode WHERE qID  = '$qID'");
     
    if ($result) {
        if( mysqli_num_rows($result) > 0 ) {
            while($row2 = mysqli_fetch_assoc( $result )) {

                $hq[] = $row2;
            }  
                
          echo json_encode($hq,JSON_UNESCAPED_UNICODE);
            } else {
                echo "Whoops! No Result!";
            }

        
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }

?>