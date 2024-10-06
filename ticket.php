<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'db_connection.php'; // Ensure this file includes your database connection

echo "Script started.<br>";

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    echo "Email retrieved from session: " . $email . "<br>";

    // Retrieve booking information based on email
    $stmt = $conn->prepare("SELECT first_name, last_name, email, card_id, travel_date_time, arriving_date_time, member_type, number_of_children, number_of_adults, seat_position, seat_direction, seat_type, duration, price, operator, start_point, end_point, ticket_number
                            FROM user_selections
                            WHERE email = ?");
    
    if ($stmt === false) {
        $_SESSION['booking_error'] = "Prepare failed: " . htmlspecialchars($conn->error);
        header("Location: index.html"); // Redirect to index.html on error
        exit();
    }

    // Bind the parameter
    $bind = $stmt->bind_param('s', $email);

    if ($bind === false) {
        $_SESSION['booking_error'] = "Bind failed: " . htmlspecialchars($stmt->error);
        header("Location: index.html"); // Redirect to index.html on error
        exit();
    }

    // Execute the statement
    if ($stmt->execute()) {
        // Bind result variables
        $stmt->bind_result($firstName, $lastName, $email, $railcardId, $departureTime, $arrivalTime, $memberType, $numberOfChildren, $numberOfAdults, $seatPosition, $seatDirection, $seatType, $duration, $price, $operator, $startPoint, $endPoint, $ticketNumber);

        // Fetch the results
        if ($stmt->fetch()) {
            // Generate unique reference number
            $referenceNumber = "REF" . date('Ymd') . mt_rand(10000, 99999); // Example of generating a random number

            // Email content
            $to = $email;
            $subject = "Booking Confirmation";
            $message = "Dear $firstName $lastName,\n\n";
            $message .= "Thank you for booking with us!\n\n";
            $message .= "This is your ticket information:\n";
            $message .= "First Name: $firstName\n";
            $message .= "Last Name: $lastName\n";
            $message .= "Email: $email\n";
            $message .= "Railcard ID: $railcardId\n";
            $message .= "Member Type: $memberType\n";
            $message .= "Departure Time: $departureTime\n";
            $message .= "Arrival Time: $arrivalTime\n";
            $message .= "Start Point: $startPoint\n"; // Include start point
            $message .= "End Point: $endPoint\n"; // Include end point
            $message .= "Number of Children: $numberOfChildren\n";
            $message .= "Number of Adults: $numberOfAdults\n";
            $message .= "Seat Position: $seatPosition\n";
            $message .= "Seat Direction: $seatDirection\n";
            $message .= "Seat Type: $seatType\n";
            $message .= "Duration: $duration\n";
            $message .= "Price: $price\n";
            $message .= "Operator: $operator\n";
            $message .= "Ticket Number: $ticketNumber\n\n";
            $message .= "Reference Number: $referenceNumber\n\n";
            $message .= "This email serves as your ticket. Please present it when boarding.\n\n";
            $message .= "Regards,\nYour Company Name";

            // Additional headers
            $headers = "From: mekomouekeune@gmail.com"; // Replace with your email

            // Send email
            if (mail($to, $subject, $message, $headers)) {
                $_SESSION['booking_success'] = true; // Set session variable for success message
                header("Location: display.html"); // Redirect to display.html after successful booking
                exit();
            } else {
                $_SESSION['booking_error'] = "Failed to send confirmation email."; // Set session variable for error message
                header("Location: payment.html"); // Redirect to payment.html on email send failure
                exit();
            }
        } else {
            $_SESSION['booking_error'] = "No booking found for email: $email"; // Set session variable for error message
            header("Location: payment.html"); // Redirect to payment.html if no booking found
            exit();
        }
    } else {
        $_SESSION['booking_error'] = "Execution failed: " . htmlspecialchars($stmt->error); // Set session variable for error message
        header("Location: payment.html"); // Redirect to payment.html on execution failure
        exit();
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    $_SESSION['booking_error'] = "Email not set in session."; // Set session variable for error message
    header("Location: index.html"); // Redirect to index.html if session email is not set
    exit();
}
