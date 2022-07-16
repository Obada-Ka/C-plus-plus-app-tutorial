<?php
    
    include('conn.php');
    header("Content-Type: application/json; charset=UTF-8");
    require 'class.general.php';
    $postdata = file_get_contents("php://input");
    $array = array();
    $posts = json_decode($postdata, true);
    $id = array();
    $status = array();
    if (empty($postdata)==false) {
    foreach($posts as $post){
        $id[] = $post['id'];
        $status[] = $post['status'];
    }
    }
   
    $geto = new general();
    $getO = $geto->upparticipants($id,$status);
  
    

?>