<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $schedule_id = $_POST['schedule_id'];
    $operator = $_POST['operator'];
    $departure_time = $_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];
    $price = $_POST['price'];
    $train_id = $_POST['train_id'];
    $start_point = $_POST['start_point'];
    $end_point = $_POST['end_point'];
    $number_of_changes = $_POST['number_of_changes'];

    $sql = "UPDATE Schedules 
            SET operator='$operator', departure_time='$departure_time', arrival_time='$arrival_time', price='$price', 
                train_id='$train_id', start_point='$start_point', end_point='$end_point', number_of_changes='$number_of_changes'
            WHERE schedule_id='$schedule_id'";

    if ($conn->query($sql) === TRUE) {
        $message = urlencode('Schedule edited successfully!');
        $type = 'success';
        header("Location: schedules.php");
    } else {
        $message = urlencode('Error: ' . $conn->error);
        $type = 'error';
    }
}

$conn->close();
