<?php
include "../enter/connect.php";

if (isset($_GET["coachId"])) {
    $coachId = $_GET["coachId"];
    
    $query = "SELECT seat_num FROM SEAT_T WHERE coach_id = $coachId";
    $result = mysqli_query($con, $query);
    
    $seatData = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $seatData[] = $row;
    }
    
    echo json_encode($seatData);
} else {
    echo "Invalid request.";
}

mysqli_close($con);
?>
