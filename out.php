<?php
    
    include('conn.php');
    
    require 'class.general.php';
    $postdata = file_get_contents("php://input");
    //convert it to array
    $post = json_decode($postdata);
    $array = (array) $postdata;
    if (empty($postdata)==false) {
     
        $qu = $post->qID;
    }

    $geto = new general();
    $getO = $geto->getOutputs($qu);
    echo json_encode(array('output' => $getO));

?>