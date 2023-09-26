<?php
include "../enter/connect.php";

session_start();

if (!isset($_SESSION["user_id"]) || !isset($_SESSION["user_name"])) {
    // Handle the case when the user is not logged in
    header("HTTP/1.1 401 Unauthorized");
    exit();
}

// Get the selected seat from the POST data
$selectedSeat = isset($_POST['selected_seat']) ? $_POST['selected_seat'] : '';

if (empty($selectedSeat)) {
    // Handle the case when no seat is selected
    header("HTTP/1.1 400 Bad Request");
    exit();
}

// Get the current time
$currentDateTime = date('Y-m-d H:i:s');

// Insert the booking into the BOOK_T table
$query = "INSERT INTO BOOK_T (user_id, book_seat, book_time) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "iss", $_SESSION["user_id"], $selectedSeat, $currentDateTime);

$response = array();

if (mysqli_stmt_execute($stmt)) {
    // Booking was successful
    $response["success"] = true;
} else {
    // Booking failed
    $response["success"] = false;
}

mysqli_close($con);

echo json_encode($response);
?>
