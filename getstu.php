<?php 
require 'class.general.php';
header('Content-Type: application/json');


#$gets = new general();
/*
$getq = new general();
$getC = $getc->getstu();
$getQ = $getq->getstu(); */
#$array = $gets->getstu();
#$x = $array[0];
#$y = $array[1];*/
    $gets = new general();
    $getS = $gets->getStu();
    echo json_encode($getS);
#echo json_encode( $ul['sidd']);


    ?>