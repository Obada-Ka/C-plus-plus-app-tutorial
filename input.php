<?php 
    include('conn.php');
    require 'class.general.php';
    $postdata = file_get_contents("php://input");
    $post = json_decode($postdata);
    $array = (array) $postdata;
    if (empty($postdata)==false) {
     
        $qu = $post->qID;
    }
    header('Content-Type: application/json');
    $geti = new general();
    $getO = $geti->getInputs($qu);
    echo json_encode(array('input' => $getO));

?>