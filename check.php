<?php
    include('conn.php');
    require 'class.general.php';
    $input = array();
    $output = array();
    $getInfo = new general();
    $code = $getInfo->getCode();
    
    $input = $getInfo->getInputs();
    
    $output = $getInfo->getOutputs();
   
    $getInfo->checkCode($code,$input,$output);
    


?>