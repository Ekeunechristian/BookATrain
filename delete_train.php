<?php
// Include database connection
include 'db_connection.php';

if (isset($_GET['id'])) {
    $trainId = mysqli_real_escape_string($conn, $_GET['id']);

    // Start a transaction
    mysqli_begin_transaction($conn);

    try {
        // Delete all related schedules first
        $delete_schedules_sql = "DELETE FROM Schedules WHERE train_id='$trainId'";
        mysqli_query($conn, $delete_schedules_sql);

        // Delete the train
        $delete_train_sql = "DELETE FROM Trains WHERE train_id='$trainId'";
        mysqli_query($conn, $delete_train_sql);

        // Commit the transaction
        mysqli_commit($conn);

        header("Location: train.php");
    } catch (Exception $e) {
        // Rollback the transaction if there is any error
        mysqli_rollback($conn);
        header("Location: manage_trains.php?delete=error&message=" . urlencode($e->getMessage()));
    }
}

mysqli_close($conn);
