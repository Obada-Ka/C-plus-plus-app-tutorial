<?php
include('conn.php');
include('compile.php');
$response = array();
$postdata=array();
$post = array();
$ok = false;
$CheckOutputs = array();
$inputs=array();
$postdata = file_get_contents("php://input");
$post = json_decode($postdata);
$array = (array) $postdata;
if (empty($postdata)==false) {
 
    $cd = $post->code;
    $qu = $post->inputs;
}

 $CheckOutputs[] = compiler($cd,
    $qu);
     if (strpos($CheckOutputs[0],"error")!=false)
     {
         
        echo json_encode(array('errors' => $res4 = str_replace("\r\n","",explode('main.cpp:',$CheckOutputs[0]))));
     }
     else {
        echo json_encode(array('outputs' => $res4 =$CheckOutputs[0]));
     }
     
     
         
     
     
?>