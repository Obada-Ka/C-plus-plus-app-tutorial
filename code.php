<?php

    require 'class.general.php';
    $getc = new general();
    $getC = $getc->getCode();
    echo json_encode(array('code' => $getC));
    
?>

