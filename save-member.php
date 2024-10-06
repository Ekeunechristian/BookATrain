<?php
session_start();
include 'db_connection.php'; // Ensure this file includes your database connection

// Retrieve JSON data from the request
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    // Extract data
    $train = $data['train'];
    $username = isset($data['username']) ? $data['username'] : null;
    $email = $data['email'];
    $railcardId = isset($data['railcard_id']) ? $data['railcard_id'] : null;
    $memberType = isset($data['member_type']) ? $data['member_type'] : null;
    $numberOfTickets = $data['number_of_tickets'];
    $seatPreferences = $data['seat_preferences'];

    // Generate a random seat number (adjust as needed)
    $seatNumber = 'A' . rand(1, 100);

    // Store the email address in the session
    $_SESSION['email'] = $email; // Use email as session identifier

    // Generate a random customer ID
    $customerId = mt_rand(1, 100);
    // Store the customer ID in the session
    $_SESSION['customer_id'] = $customerId;

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO user_selections (
        customer_id, travel_date_time,
        arriving_date_time, number_of_tickets, card_id,
        member_type, seat_position, seat_direction, seat_type, seat_number, email,
        duration, price, operator, first_name, last_name, ticket_number,
        start_point, end_point, username
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
    )");

    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    // Generate a unique ticket number
    $ticketNumber = 'T' . time();

    // Split the username into first name and last name
    $nameParts = explode(' ', $username);
    $firstName = $nameParts[0];
    $lastName = isset($nameParts[1]) ? $nameParts[1] : '';

    // Bind the parameters
    if ($stmt->bind_param(
        'ississssssssssssssss', // Adjust types based on your database schema
        $customerId,
        $train['departure_time'],
        $train['arrival_time'],
        $numberOfTickets,
        $railcardId,
        $memberType,
        $seatPreferences['seat_position'],
        $seatPreferences['seat_direction'],
        $seatPreferences['seat_type'],
        $seatNumber,
        $email,
        $train['duration'],
        $train['price'],
        $train['operator'],
        $firstName,
        $lastName,
        $ticketNumber,
        $train['start_point'],
        $train['end_point'],
        $username // Use email as username in the database
    )) {
        // Execute the statement
        if ($stmt->execute()) {
            // Prepare a response array
            $response = [
                'success' => true,
                'ticket_number' => $ticketNumber // Include ticket number in the response if needed
            ];
            echo json_encode($response);
        } else {
            echo json_encode(['success' => false, 'error' => htmlspecialchars($stmt->error)]);
        }
    } else {
        die('Bind failed: ' . htmlspecialchars($stmt->error));
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid data']);
}
