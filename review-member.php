<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Review</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('pexels-pixabay-159252.jpg'); /* Replace 'background.jpg' with your image URL */
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            
        }
        h2 {
            margin-top: 0;
            text-align: center;
        }
        .booking-info div {
            margin-bottom: 10px;
        }
        .booking-info strong {
            font-weight: bold;
            margin-right: 10px;
        }
        .button-group {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        .button-group button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .button-group button:hover {
            background-color: #0056b3;
        }
        .button-group form {
            margin: 0;
        }
        .red{
            color: red;
        }
    </style>
    <script>
        function returnPay() {
            // Navigate back to the previous page
            window.location.href = 'member-train.php';
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Booking Review</h2>

        <?php
        session_start();
        include 'db_connection.php'; // Ensure this file includes your database connection

        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $discountRate = isset($_SESSION['discount_rate']) ? $_SESSION['discount_rate'] : 0; // Retrieve the discount rate from session or default to 0

            // Debugging: Log the discount rate
            error_log("Discount Rate: " . $discountRate);

            // Prepare the SQL statement
            $stmt = $conn->prepare("SELECT start_point, end_point, first_name, last_name, email, card_id, travel_date_time, arriving_date_time, member_type, number_of_tickets, seat_position, seat_direction, seat_type, duration, price, operator, ticket_number, username
                                    FROM user_selections
                                    WHERE email = ?");

            if ($stmt === false) {
                die('Prepare failed: ' . htmlspecialchars($conn->error));
            }

            // Bind the parameters
            $bind = $stmt->bind_param('s', $email);

            if ($bind === false) {
                die('Bind failed: ' . htmlspecialchars($stmt->error));
            }

            // Execute the statement
            if ($stmt->execute()) {
                // Bind result variables
                $stmt->bind_result($startPoint, $endPoint, $firstName, $lastName, $email, $railcardId, $departureTime, $arrivalTime, $memberType, $numberOfTickets, $seatPosition, $seatDirection, $seatType, $duration, $price, $operator, $ticketNumber, $username);

                // Fetch the results
                if ($stmt->fetch()) {
                    // Calculate the discount
                    $discountAmount = ($price * $discountRate) / 100;
                    $newPrice = $price - $discountAmount;

                    // Debugging: Log the original and new prices
                    error_log("Original Price: " . $price);
                    error_log("New Price after " . $discountRate . "% discount: " . $newPrice);

                    // Display the booking information
                    echo '<div class="booking-info">';
                    echo '<div><strong>Start Point:</strong> ' . htmlspecialchars($startPoint) . '</div>';
                    echo '<div><strong>End Point:</strong> ' . htmlspecialchars($endPoint) . '</div>';
                    echo '<div><strong>Username:</strong> ' . htmlspecialchars($username) . '</div>';
                    echo '<div><strong>Email:</strong> ' . htmlspecialchars($email) . '</div>';
                    echo '<div><strong>Railcard ID:</strong> ' . htmlspecialchars($railcardId) . '</div>';
                    echo '<div><strong>Member Type:</strong> ' . htmlspecialchars($memberType) . '</div>';
                    echo '<div><strong>Departure Time:</strong> ' . htmlspecialchars($departureTime) . '</div>';
                    echo '<div><strong>Arrival Time:</strong> ' . htmlspecialchars($arrivalTime) . '</div>';
                    echo '<div><strong>Number of Tickets:</strong> ' . htmlspecialchars($numberOfTickets) . '</div>';
                    echo '<div><strong>Seat Position:</strong> ' . htmlspecialchars($seatPosition) . '</div>';
                    echo '<div><strong>Seat Direction:</strong> ' . htmlspecialchars($seatDirection) . '</div>';
                    echo '<div><strong>Seat Type:</strong> ' . htmlspecialchars($seatType) . '</div>';
                    echo '<div><strong>Duration:</strong> ' . htmlspecialchars($duration) . '</div>';
                    echo '<div><strong class="red">Old Price:</strong> $' . htmlspecialchars($price) . '</div>';
                    echo '<div><strong class = "red">Discount:</strong> ' . htmlspecialchars($discountRate) . '%</div>';
                    echo '<div><strong class = "red">New Price:</strong> $' . htmlspecialchars($newPrice) . '</div>';
                    echo '<div><strong>Operator:</strong> ' . htmlspecialchars($operator) . '</div>';
                    echo '<div><strong>Ticket Number:</strong> ' . htmlspecialchars($ticketNumber) . '</div>';
                    echo '</div>';

                    // Button group
                    echo '<div class="button-group">';
                    echo '<button type="button" onclick="returnPay()">Return</button>';
                    echo '<form action="payment.html"><button type="submit">Continue to Payment</button></form>';
                    echo '</div>';

                    // Client-side logging of prices
                    echo '<script>console.log("Original Price: ' . $price . '");</script>';
                    echo '<script>console.log("New Price after ' . $discountRate . '% discount: ' . $newPrice . '");</script>';
                } else {
                    echo '<p>No booking found for email: ' . htmlspecialchars($email) . '</p>';
                }
            } else {
                echo '<p>Execution failed: ' . htmlspecialchars($stmt->error) . '</p>';
            }

            // Close statement and connection
            $stmt->close();
            $conn->close();
        } else {
            echo '<p>Email not set in session.</p>';
        }
        ?>
    </div>
</body>
</html>
