<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $operator = $_POST['operator'];
    $departure_time = $_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];
    $price = $_POST['price'];
    $start_point = $_POST['start_point'];
    $end_point = $_POST['end_point'];
    $number_of_changes = $_POST['number_of_changes'];

    // Fetch a train ID from the Trains table
    $train_sql = "SELECT train_id FROM Trains ORDER BY RAND() LIMIT 1";
    $train_result = $conn->query($train_sql);
    if ($train_result->num_rows > 0) {
        $train_row = $train_result->fetch_assoc();
        $train_id = $train_row['train_id'];

        // Insert the new schedule with the selected train ID
        $sql = "INSERT INTO Schedules (operator, departure_time, arrival_time, price, train_id, start_point, end_point, number_of_changes)
                VALUES ('$operator', '$departure_time', '$arrival_time', '$price', '$train_id', '$start_point', '$end_point', '$number_of_changes')";

        if ($conn->query($sql) === TRUE) {
            $message = urlencode('Schedule added successfully!');
            $type = 'success';
            header("Location: schedules.php");
        } else {

            $message = urlencode('Error: ' . $conn->error);
            $type = 'error';
        }
    } else {
        echo "Error: No trains found.";
    }
}

$conn->close();
