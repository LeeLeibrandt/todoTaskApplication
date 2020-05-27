<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
        .page-header{
            border-bottom: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="curve start">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 319">
                <path fill="rgb(193, 144, 240)" fill-opacity="0.5" d="M0,192L48,181.3C96,171,192,149,288,144C384,139,480,149,576,170.7C672,192,768,224,864,245.3C960,267,1056,277,1152,245.3C1248,213,1344,139,1392,101.3L1440,64L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
            </svg>
        </div>
        <div class="page-header">
            <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. What should we accomplish first.</h1>
        </div>
        <p>
            <a href="../app/index.php" class="btn box ">Todo list</a>
            <a href="../calendar/index.php" class="btn outline ">My Calendar</a>
            <a href="reset.php" class="btn box ">Reset Pass</a>
            <a href="logout.php" class="btn outline">Sign Out</a>
        </p>
        
            <div class="img">
                <img src="../img/1.png" alt="">
            </div>
        <div class="curve end">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 319">
                <path fill="rgb(193, 144, 240)" fill-opacity="0.5" d="M0,192L48,181.3C96,171,192,149,288,144C384,139,480,149,576,170.7C672,192,768,224,864,245.3C960,267,1056,277,1152,245.3C1248,213,1344,139,1392,101.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </div>
</body>
</html>