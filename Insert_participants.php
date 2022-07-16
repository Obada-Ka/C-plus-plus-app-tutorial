<?php
include('conn.php');
header("Content-Type: application/json; charset=UTF-8");
header('Content-type: text/html; charset=UTF-8');
$postdata = file_get_contents("php://input");
$post = json_decode($postdata);
print_r($post);
$connection = new mysqli("localhost", "root", "","tutorial2");
if (empty($postdata)==false) {
    
       $name = $post->name;
       $tid = $post->tid;
       $sid = $post->sid;
       $un_number = $post->un_number;
       $status = $post->status;
}

    //mysqli_query($connection,"SET NAMES 'utf8'");

    $result = mysqli_query($connection,"INSERT INTO participants_students (name , tid , sid , un_number , status) values ('$name' , '$tid' , '$sid' , '$un_number' , '$status')");

     //check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Product successfully created.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }

?>