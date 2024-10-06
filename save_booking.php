<?php
session_start();
include 'db_connection.php'; // Ensure this file includes your database connection

// Retrieve JSON data from the request
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    // Extract data
    $train = $data['train'];
    $firstName = isset($data['first_name']) ? $data['first_name'] : null;
    $lastName = isset($data['last_name']) ? $data['last_name'] : null;
    $email = $data['email'];
    $numberOftickets = $data['number_of_tickets'];
    $seatPreferences = $data['seat_preferences'];

    // Generate a random seat number
    $seatNumber = 'A' . rand(1, 100);

    // Store the email address in the session
    $_SESSION['email'] = $email;

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO user_selections (
        customer_id, travel_date_time, arriving_date_time, number_of_tickets, card_id,
        member_type, seat_position, seat_direction, seat_type, seat_number, email,
        username, duration, price, operator, first_name, last_name, ticket_number,
        start_point, end_point
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?
    )");

    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    // Define NULL values for optional fields
    $cardId = null; // Card ID
    $memberType = null; // Member Type
    $username = null; // Username
    $customerId = mt_rand(1, 100); // Generate a random customer ID
    $ticketNumber = 'T' . time(); // Generate a unique ticket number

    // Bind parameters
    if ($stmt->bind_param(
        'isssssssssssssssssss', // 19 types for 19 columns
        $customerId,
        $train['departure_time'],
        $train['arrival_time'],
        $numberOftickets,
        $cardId, // NULL for card_id
        $memberType, // NULL for member_type
        $seatPreferences['seat_position'],
        $seatPreferences['seat_direction'],
        $seatPreferences['seat_type'],
        $seatNumber,
        $email,
        $username, // NULL for username
        $train['duration'],
        $train['price'],
        $train['operator'],
        $firstName,
        $lastName,
        $ticketNumber,
        $train['start_point'],
        $train['end_point']
    )) {
        // Execute the statement
        if ($stmt->execute()) {
            // Prepare a response array
            $response = [
                'success' => true,
                'ticket_number' => $ticketNumber
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
