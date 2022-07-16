<?php
include('conn.php');
header("Content-Type: application/json; charset=UTF-8");
header('Content-type: text/html; charset=UTF-8');
$postdata = file_get_contents("php://input");
$post = json_decode($postdata);

$connection = new mysqli("localhost", "root", "","tutorial2");
if (empty($postdata)==false) {
    
       $name = $post->name;
       $sid = $post->sid;
       $un_number = $post->un_number;
       $tid = $post->tid;
       $txtquiz = $post->txtquiz;
       $txtcode = $post->txtcode;
}

    //mysqli_query($connection,"SET NAMES 'utf8'");
    $result1 = mysqli_query($connection , "DELETE FROM participants_solutions WHERE txtquiz ='$txtquiz' and sid = '$sid' ");
    $result = mysqli_query($connection,"INSERT INTO
    participants_solutions (name , sid ,  un_number , tid , txtquiz , txtcode) 
    values('$name' , '$sid' , '$un_number' , '$tid' , '$txtquiz' , '$txtcode')");

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