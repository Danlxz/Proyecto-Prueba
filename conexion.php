<?php
    $host = "localhost";
    $user = "root";
    $pass = "dan99";
    $bd = "prueba";

    // Create connection
    $conn = mysqli_connect($host,$user,$pass,$bd);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>