<?php

    $servername = $_POST['servername'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dbname = $_POST['dbname'];

    //create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //check connection
    if (!$conn){
        die("Connection failed:" . mysqli_connect_error());
    }
    echo "<script>console.log('Database Connected successfully');window.location.replace(\"main.php\");</script>";

?>