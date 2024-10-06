<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $train_name = mysqli_real_escape_string($conn, $_POST['train_name']);
    $station = mysqli_real_escape_string($conn, $_POST['station']);

    $sql = "INSERT INTO Trains (train_name, station) VALUES ('$train_name', '$station')";

    if ($conn->query($sql) === TRUE) {
        $message = urlencode('Train added successfully!');
        $type = 'success';
        header("Location: train.php");
    } else {
        $message = urlencode('Error: ' . $conn->error);
        $type = 'error';
    }
}

$conn->close();
