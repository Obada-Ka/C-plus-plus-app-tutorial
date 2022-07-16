<?php
include('conn.php');
header("Content-Type: application/json; charset=UTF-8");
header('Content-type: text/html; charset=UTF-8');

#require 'class.general.php';
$response = array();
$postdata=array();
$post = array();

#$getInfo = new general();
$postdata = file_get_contents("php://input");
$post = json_decode($postdata);
$array = (array) $postdata;
$namee=1;
$tid=1;
$age=1;
$collage=1;
$gender=1;
$email=1;
$password=1;
if (empty($postdata)==false) {
 
    $nm = $post->namee;
    $te = $post->tid;
    $em = $post->email;
    $ag = $post->age;
    $clg= $post->collage;
    $gn= $post->gender;
    $ps=$post->password;

    
    #$t = $cd;
    
    #$input = $getInfo->getInputs($qu);
    
    #$output = $getInfo->getOutputs($qu);
   
    #$CheckResult = $getInfo->checkCode($code,$input,$output);

    #if($CheckResult){
    $result = mysqli_query($connection,"INSERT INTO student (tid,namee,email, password,collage, age,gender) VALUES('$te','$nm','$em','$ps','$clg', '$ag','$gn')");
    
    

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