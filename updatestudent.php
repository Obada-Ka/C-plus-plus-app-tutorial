<?php
    
    include('conn.php');
    header("Content-Type: application/json; charset=UTF-8");
    require 'class.general.php';
    $postdata = file_get_contents("php://input");
   
    $array = array();
    $posts = json_decode($postdata, true);
    $id = array();
    $tid = array();

    if (empty($postdata)==false) {
    foreach($posts as $post){
        $id[] = $post['id'];
        $tid[] = $post['tid'];
    }
    }
   
    $geto = new general();
    $getO = $geto->upstudent($id,$tid);
  
    

?>