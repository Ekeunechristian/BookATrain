<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $train_id = mysqli_real_escape_string($conn, $_POST['train_id']);
    $train_name = mysqli_real_escape_string($conn, $_POST['train_name']);
    $station = mysqli_real_escape_string($conn, $_POST['station']);

    $sql = "UPDATE Trains SET train_name='$train_name', station='$station' WHERE train_id='$train_id'";

    if ($conn->query($sql) === TRUE) {
        $message = urlencode('Train edited successfully!');
        $type = 'success';
        header("Location: train.php");
    } else {
        $message = urlencode('Error: ' . $conn->error);
        $type = 'error';
    }
}

$conn->close();
