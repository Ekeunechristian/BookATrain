<?php
    $servername = "localhost";  // The hostname of MySQL server
    $username = "root";  // The username to access MySQL database
    $password = "";  // The password to access MySQL database
    $dbname = "ChrisTrainline";  // The name of  MySQL database

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
