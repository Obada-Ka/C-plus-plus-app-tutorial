<?php
include('conn.php');
header("Content-Type: application/json; charset=UTF-8");
header('Content-type: text/html; charset=UTF-8');

#require 'class.general.php';
$response = array();
$postdata=array();
#$getInfo = new general();
$postdata = file_get_contents("php://input");
$post = json_decode($postdata);
$array = (array) $postdata;
if (empty($postdata)==false) {
 
    $cd = $post->code;
    $te = $post->tid;
    $su = $post->sidd;
    $qu = $post->qid;

    
    #$t = $cd;
    
    #$input = $getInfo->getInputs($qu);
    
    #$output = $getInfo->getOutputs($qu);
   
    #$CheckResult = $getInfo->checkCode($code,$input,$output);

    #if($CheckResult){
    $result = mysqli_query($connection,"INSERT INTO homeworks (tid,sidd,qid, code) VALUES('$te','$su','$qu','$cd')");
    
    

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

} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>