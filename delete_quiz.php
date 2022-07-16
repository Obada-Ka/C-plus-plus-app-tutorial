<?php
include('conn.php');
$sql = "DELETE FROM participants_questions ";
$sqlCommand = mysqli_query($connection,$sql);
if ($sqlCommand) {
    // successfully inserted into database
    $response["success"] = 1;
    $response["message"] = "Product successfully created.";

    // echoing JSON response
    echo json_encode($response);
} else {
    // failed to insert row
    $response["success"] = 0;
    $response["message"] = "Oops! An error occurred.";

    // echoing JSON response
    echo json_encode($response);
}

?>