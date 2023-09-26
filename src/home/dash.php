<?php
session_start();

include "../enter/connect.php";

if (isset($_SESSION["user_id"]) && isset($_SESSION["user_name"])) {
    $userID = $_SESSION["user_id"];
    $userName = $_SESSION["user_name"];
    
    $bookingQuery = "SELECT * FROM BOOK_T WHERE user_id = '$userID'";
    $bookingResult = mysqli_query($con, $bookingQuery);

    if ($bookingResult && mysqli_num_rows($bookingResult) > 0) {
        $alreadyBooked = true;
    } else {
        $alreadyBooked = false;
    }

    $query = "SELECT user_seat FROM USER_T WHERE user_id = $userID";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['selected_seat'] = $row['user_seat']; 
    }
    
} else {
    header("Location: ../enter/login.php");
    exit();
}


$userSeats = array();
$query = "SELECT user_seat FROM USER_T";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $userSeatList = explode(',', $row['user_seat']);
        
        $userSeats = array_merge($userSeats, $userSeatList);
    }
}

$query = "SELECT user_seat FROM USER_T WHERE user_id = $userID";
$result = mysqli_query($con, $query);

$userSeat = ""; 
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $userSeat = $row['user_seat'];

    $coachPart = explode('-', $userSeat)[0];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrainBooking.my</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css">
    <style>
        .overlay-container button {
            background-color: #fcb103;
            color: #fff; 
            border: none; 
            padding: 50px 57.5px; 
            margin: 5px; 
            margin-bottom: 40px;
            border-radius: 5px; 
            font-size: 16px; 
            transition: transform 0.2s ease-in-out;
        }

        .overlay-container i {
            font-size: 45px; 
        }

        .overlay-container button:hover {
            background-color: #d9d7f5;
            transform: scale(1.1);
        }

        .overlay-container span {
            color: wheat;
            border-bottom: 2px solid #fff; 
            padding-bottom: 2px;
            margin-left: 8.5px;
        }

        .label-input-container {
            display: flex;
        }

        .label-input {
            width: 18%;
            height: 30px;
            font-size: 16px;
            text-align: center;
            color: rgb(0, 0, 0);
            background-color: #e6f2fc;
            border-radius: 10px;
            margin-top: 1rem;
            margin-left: 5px;
            padding-bottom: 5px;
        }

        .label-input + .label-input {
            margin-left: 2rem;
        }

        .time {
            display: flex;
            align-items: center;
            margin-top: 1rem;
            margin-left: 3rem;
            background-color: #e6f2fc;
            padding: 5px;
            width: 14%;
            height: 30px;
            font-size: 15px;
            color: #000;
        }

        .time i {
            font-size: 24px;
            margin-right: 5px;
            margin-left: 1.4rem;
        }

        .time-input {
            border: none;
            background: none;
            font-size: 15px;
            width: 100%;
            outline: none;
        }

        .time + .time {
            margin-left: 1rem;
        }

        .label-input-container button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s, transform 0.3s;
            margin-top: 1rem;
            margin-left: 6rem;
        }

        .label-input-container button:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        .popup {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .popup-content h2 {
            text-align: center; 
            margin-bottom: 20px; 
        }

        .popup-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 5px;
        }

        .popup-close-btn {
            position: absolute;
            right: 25.5rem; 
            top: 13.5rem; 
            font-size: 24px;
            cursor: pointer;
            color: black;
            background: transparent; 
        }

        .popup-close-btn:hover {
            color: wheat;
        }

        .seat-button {
            background-color: #8393fc;
            width: 100px;
            height: 40px; 
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin: 10px;
            transition: background-color 0.3s, color 0.3s, transform 0.3s;
        }

        .seat-button:hover {
            background-color: wheat;
            transform: scale(1.1);
        }

        .booked-seat {
            background-color: #ccc; 
            cursor: not-allowed;
        }

        .seat-button[selected='true'] {
            background-color: red;
        }

        .selected-seat {
            background-color: red;
        }

        .banner {
            background-color: #f44336; 
            color: #fff; 
            text-align: center; 
            padding: 20px; 
            font-size: 16px; 
            font-weight: bold; 
            border-radius: 5px; 
            margin: 65px ; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
        }

        .banner {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

    </style>
</head>
<body>
    <?php include "header.php"; ?>
    <div class="content-container">
        <figure>
            <img src="../img/bg.jpeg" alt="background">
        </figure>
        <div class="overlay-text">
            <h2>Book Your Tickets Now & Enjoy The Ride</h2>
            <p>Select coach <span class="arrow">→</span> Select seats <span class="arrow">→</span> Get selected details <span class="arrow">→</span> Book</p>
        </div>
        <div class="overlay-container">
        <?php
            if ($alreadyBooked) {
                echo '<div class="banner">Thank You for booking with us. Have a nice day</div>';
            } else {
    
                $query = "SELECT * FROM COACH_T";
                $result = mysqli_query($con, $query);
            
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $coachName = $row["coach_num"];
                        $coachId = $row["coach_id"];
            
                        echo "<button onclick='selectCoach($coachId)' data-coach-id='$coachId'><i class='fas fa-train'></i> $coachName</button>";
                    }
                } else {
                    echo "No coaches available.";
                }
            }
            
            mysqli_close($con);
            ?>
            <span>Train Ticket Details</span>
            <div class="label-input-container">
            <input type="text" class="label-input" readonly value="Coach: <?php echo $coachPart; ?>" id="coachLabel">
            <input type="text" class="label-input" readonly value="Seat: <?php echo $userSeat; ?>" id="seatLabel">
                <div class="time">
                    <i class="material-icons-sharp">schedule</i>
                    <input type="text" class="time-input" readonly id="currentTime">
                </div>
                <div class="time">
                    <i class="material-icons-sharp">date_range</i>
                    <input type="text" class="time-input" readonly id="currentDate">
                </div>
                <button id="bookingButton"><?php echo $alreadyBooked ? 'Arrive' : 'Confirm Booking'; ?></button>
            </div>
        </div>
    </div>
    <div id="popup-container" class="popup">
        <div class="popup-content">
            <span id="close-popup-button" class="popup-close-btn">&times;</span>
        </div>
    </div>
<script>
    function updateTime() {
        const currentTimeInput = document.getElementById('currentTime');
        const currentDateInput = document.getElementById('currentDate');

        const now = new Date();

        const timeString = now.toLocaleTimeString();

        const dateString = now.toLocaleDateString();

        currentTimeInput.value = timeString;
        currentDateInput.value = dateString;
    }

    setInterval(updateTime, 1000);

    updateTime();

    let currentlySelectedButton = null;

    function selectCoach(coachId) {
        
        const popup = document.getElementById('popup-container');
        popup.style.display = 'block';

        
        const popupContent = document.querySelector('.popup-content');
        popupContent.innerHTML = `
            <span id="close-popup-button" class="popup-close-btn">&times;</span>
            <h2>Seats for Coach ${coachId}</h2>
            <div id="seat-buttons-container"></div>
        `;

        
        document.getElementById('close-popup-button').addEventListener('click', function() {
            popup.style.display = 'none'; 
        });

        
        const seatButtonsContainer = document.getElementById('seat-buttons-container');
        const xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const seatData = JSON.parse(xhr.responseText);
                createSeatButtons(seatData);
            }
        };

        
        xhr.open('GET', `fetch_seat_data.php?coachId=${coachId}`, true);
        xhr.send();
    }

    var userSeats = <?php echo json_encode($userSeats); ?>;

    function createSeatButtons(seatData) {
        const seatButtonsContainer = document.getElementById('seat-buttons-container');

        const selectedSeat = sessionStorage.getItem('selected_seat');

        
        seatData.forEach(function(seat) {
            const seatNum = seat.seat_num;
            

            const seatButton = document.createElement('button');
            seatButton.textContent = seatNum;
            seatButton.classList.add('seat-button');

            seatButton.setAttribute('data-seat-num', seatNum);

            
            if (seatNum === selectedSeat) {
                seatButton.setAttribute('selected', 'true');
            }

            seatButtonsContainer.appendChild(seatButton);

            
            if (userSeats.includes(seatNum)) {
                seatButton.classList.add('selected-seat');
            }

            
            seatButton.addEventListener('click', function() {
                
                const selectedSeat = seatNum;
                const userseat = sessionStorage.getItem('selected_seat');

                
                if (seatButton.classList.contains('selected-seat')) {
                    alert('Seat is already selected.');
                    return; 
                }

               
                sessionStorage.setItem('selected_seat', selectedSeat);

                alert(`You have selected seat ${selectedSeat}.`);

                <?php if (isset($_SESSION['user_id'])) { ?>
                    updateSelectedSeat(selectedSeat, seatButton); 
                <?php } ?>

                currentlySelectedButton = seatButton;

                window.location.reload();
            });
        });
    }


    
    function updateSelectedSeat(selectedSeat, seatButton) {
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    
                    console.log('User seat updated successfully.');

                    
                    seatButton.classList.add('selected-seat');
                } else {
                    
                    console.error('Error updating user seat.');
                }
            } else {
                
                console.error('Failed to update user seat.');
            }
        }
    };

    
    xhr.open('GET', `save_selected_seat.php?selectedSeat=${selectedSeat}`, true);
    xhr.send();
}

document.getElementById('bookingButton').addEventListener('click', function() {
    if ("<?php echo $alreadyBooked; ?>") {
    
        const xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        alert('You have arrived!');
                        window.location.href = 'dash.php';
                    } else {
                        alert('Failed to update booking status. Please try again later.');
                    }
                } else {
                    alert('Failed to update booking status. Please try again later.');
                }
            }
        };

        xhr.open('POST', 'delete_booking.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        
        xhr.send();

    } else {
        
        const selectedSeat = "<?php echo $_SESSION['selected_seat']; ?>";
        if (!selectedSeat) {
            alert('Please select a seat and coach before confirming booking.');
            return;
        }

        
        const xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        alert('Booking confirmed successfully!');
                        window.location.reload();
                    } else {
                        alert('Failed to confirm booking. Please try again later.');
                    }
                } else {
                    alert('Failed to confirm booking. Please try again later.');
                }
            }
        };

        xhr.open('POST', 'save_booking.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        
        xhr.send(`selected_seat=${selectedSeat}`);
    }
});

</script>
<?php include "footer.php"; ?>
</body>
</html>