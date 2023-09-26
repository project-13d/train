<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
footer {
    background-color: #333;
    color: #fff;
    padding: 20px 0;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
}

.footer-content {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.footer-logo img {
    max-width: 100px;
    height: auto;
}

.footer-logo p {
    font-size: 14px;
}

.footer-links ul {
    list-style-type: none;
    padding: 0;
}

.footer-links li {
    margin-bottom: 10px;
}

.footer-links a {
    color: #fff;
    text-decoration: none;
    font-size: 16px;
}

.footer-links a:hover {
    text-decoration: underline;
}
    </style>
</head>
<body>
<footer>
    <div class="footer-content">
        <div>
            <p>TrainBooking.my &copy; <?php echo date("Y"); ?></p>
        </div>
        <div class="footer-links">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>
</footer>
</body>
</html>
