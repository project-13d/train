<?php
session_start();

include "../enter/connect.php";

if (isset($_SESSION["user_id"])) {
    $userID = $_SESSION["user_id"];

    $deleteUserQuery = "UPDATE USER_T SET user_seat = '' WHERE user_id = '$userID'";
    $deleteUserResult = mysqli_query($con, $deleteUserQuery);

    $deleteBookingQuery = "DELETE FROM BOOK_T WHERE user_id = '$userID'";
    $deleteBookingResult = mysqli_query($con, $deleteBookingQuery);

    if ($deleteUserResult && $deleteBookingResult) {
        $response = array("success" => true);
    } else {
        $response = array("success" => false, "error" => mysqli_error($con));
    }
    

    mysqli_close($con);

    echo json_encode($response);
} else {
    $response = array("success" => false);
    echo json_encode($response);
}
?>
