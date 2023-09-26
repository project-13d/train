<?php

session_start();


include "connect.php";

$errorMessage = ''; 

$stmt = null; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];


    $username = filter_var($username, FILTER_SANITIZE_STRING);

    $stmt = $con->prepare("SELECT * FROM USER_T WHERE user_username = ? AND user_psw = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {

        $row = $result->fetch_assoc();
        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["user_name"] = $row["user_username"];

        header("Location: ../home/dash.php");
        exit();
    } else {

        $errorMessage = "Incorrect password";
    }
}

if ($stmt !== null) {
    $stmt->close();
}
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Form</title>
    <style>
        <?php include "../css/login.css" ?>
    </style>
</head>
<body>
    <div class="SUcontainer">
        <div class="SUcard">
            <h3 class="SUh3">Sign In</h3>
            <form method="POST" action="login.php">
                <div class="inputBox">
                    <input type="text" name="username" required="required">
                    <span>Username</span>
                </div>

                <div class="inputBox">
                    <input type="password" name="password" required="required">
                    <span>Password</span>
                </div>

                <button>Enter</button>
            </form>
            <p class="SUlink">Don't have an account? <a href="register.php">Sign Up</a></p>
            <p class="error-message"><?php echo $errorMessage; ?></p>
        </div>
    </div>
</body>
</html>
