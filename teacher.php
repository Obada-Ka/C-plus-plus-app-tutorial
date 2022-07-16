<?php
    
    include('conn.php');
    #header("Content-Type: application/json; charset=UTF-8");
    
    require 'class.general.php';
    $postdata = file_get_contents("php://input");
    //convert it to array
    $post = json_decode($postdata);
    $array = (array) $postdata;
    if (empty($postdata)==false) {
     
        $e = $post->email;
        $p=$post->password;
    }

    $geto = new general();
    $getO = $geto->teacher1($e,$p);
    #print(json_encode(array('ques' => $getO,JSON_UNESCAPED_UNICODE)));
    echo json_encode($getO);

?>