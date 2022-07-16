<?php
    
    include('conn.php');
    header("Content-Type: application/json; charset=UTF-8");
    
    require 'class.general.php';

    $geto = new general();
    $getO = $geto->Student1000();
    #print(json_encode(array('ques' => $getO,JSON_UNESCAPED_UNICODE)));
    echo json_encode(array($getO));

?>