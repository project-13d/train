<?php
include "../enter/connect.php";
session_start();

if (isset($_SESSION["user_id"]) && isset($_SESSION["user_name"])) {
    if (isset($_GET["selectedSeat"])) {
        $selectedSeat = $_GET["selectedSeat"];
        $userId = $_SESSION["user_id"];
        
        // Update the user_seat field in the USER_T table
        $updateQuery = "UPDATE USER_T SET user_seat = ? WHERE user_id = ?";
        $stmt = mysqli_prepare($con, $updateQuery);
        mysqli_stmt_bind_param($stmt, "si", $selectedSeat, $userId);
        
        if (mysqli_stmt_execute($stmt)) {
            $response = array("success" => true);
        } else {
            $response = array("success" => false);
        }
        
        mysqli_stmt_close($stmt);
    } else {
        $response = array("success" => false);
    }
} else {
    $response = array("success" => false);
}

mysqli_close($con);

echo json_encode($response);
?>
