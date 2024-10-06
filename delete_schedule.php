<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $schedule_id = $_GET['id'];

    $sql = "DELETE FROM Schedules WHERE schedule_id='$schedule_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: schedules.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
