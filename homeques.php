<?php
     require 'class.general.php';
    $gets = new general();
    $getS = $gets->getHques();
    echo json_encode($getS);


?>