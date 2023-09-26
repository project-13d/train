<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0; 
            padding: 0; 
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .header-container {
            width: 100%; 
            background-color: #007BFF; 
            color: #fff; 
        }

        .navbar {
            background-color: #ffffff; 
            display: flex;
            height: 3rem;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .logo img {
            width: 150px; 
            height: 50px;
            margin-left: 8.5rem;
        }

        .butt button {
            margin-left: -13.8rem;
            background-color: #546dff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .butt button:hover {
            background-color: #3254a8;
        }
    </style>
</head>
<body>
    <div class="header-container">
        <nav class="navbar">
            <div class="logo">
                <img src="../img/logo.jpeg" alt="Company Logo">
            </div>
            <form action="../enter/logout.php" class="butt" method="POST">
                <button type="submit" name="logout">Log Out</button>
            </form>
        </nav>
    </div>
</body>
</html>

