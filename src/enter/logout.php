<?php
session_start();

if (isset($_SESSION["user_id"])) {
    unset($_SESSION["user_id"]);
}

if (isset($_SESSION["user_name"])) {
    unset($_SESSION["user_name"]);
}

echo '<script>alert("Log Out Successful"); window.location.href= "login.php";</script>';
exit();
?>
