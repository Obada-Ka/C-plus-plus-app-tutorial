<?php
include('conn.php');
require 'class.general.php';
$response = array();
$postdata=array();
$post = array();
$input = array();
$output = array();
$getInfo = new general();
$postdata = file_get_contents("php://input");
$post = json_decode($postdata);
$array = (array) $postdata;
if (empty($postdata)==false) {
 
    $cd = $post->code;
    $qu = $post->qID;
    
    $code = $cd;
    
    $input = $getInfo->getInputs($qu);
    
    $output = $getInfo->getOutputs($qu);
   
    $CheckResult = $getInfo->checkCode($code,$input,$output);
    

    if($CheckResult){
    $result = mysqli_query($connection,"INSERT INTO answercode (code , qID) VALUES('$cd', '$qu')");

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
}
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>