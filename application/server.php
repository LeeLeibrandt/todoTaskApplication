<?php
    session_start();
    $db = mysqli_connect('localhost', 'root', 'root', 'application');

    // initialize variables
    $name = "";
    $address = "";
    $id = 0;
    $update = false;

    if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];

        mysqli_query($db, "INSERT INTO Tasks (task, duedate) VALUES ('$name', '$address')"); 
        $_SESSION['message'] = "Address saved"; 
        header('location: index.php');
    }

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM info WHERE id=$id");
        $_SESSION['message'] = "Address deleted!"; 
        header('location: index.php');
    }