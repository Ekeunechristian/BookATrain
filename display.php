<?php
session_start(); // Start the session

// Check if user_email is set in session
if (!isset($_SESSION['email'])) {
    die('User email not found in session'); 
}

include 'db_connection.php'; 
require 'vendor/autoload.php'; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Fetch data using session email
$user_email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT * FROM user_selections WHERE email = ?");
$stmt->bind_param("s", $user_email);
$stmt->execute();
$result = $stmt->get_result();
$ticket = $result->fetch_assoc();

if (!$ticket) {
    die('No ticket found for the logged-in user');
}

// Retrieve discount rate from session
$discount_rate = isset($_SESSION['discount_rate']) ? floatval($_SESSION['discount_rate']) : 0;

// Calculate discounted price
$original_price = floatval($ticket['price']);
$discounted_price = $original_price - ($original_price *  $discount_rate)/100; // Apply discount rate

// Create the email content
$subject = "Your Train Ticket";
$body = '
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border: 2px solid #000;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
        }
        .ticket-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .ticket-header h1 {
            margin: 0;
        }
        .ticket-details {
            margin-bottom: 20px;
        }
        .ticket-details p {
            margin: 5px 0;
        }
        .ticket-footer {
            border-top: 2px solid #000;
            padding-top: 10px;
            margin-top: 20px;
            text-align: right;
        }
        .ticket-footer p {
            margin: 5px 0;
        }
        .ticket-thankyou {
            margin-top: 20px;
            font-style: italic;
        }
        .logout-button {
            margin-top: 20px;
            text-align: center;
        }
        .logout-button button {
            padding: 10px 20px;
            background-color: blue;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .logout-button button:hover {
            background-color: lightblue;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="ticket-header">
            <h1>Train Ticket</h1>
            <p><strong>Booking ID:</strong> ' . htmlspecialchars($ticket['booking_id']) . '</p>
        </div>
        <div class="ticket-details">
            <p><strong>Passenger Name:</strong> ' . htmlspecialchars($ticket['first_name'] . ' ' . $ticket['last_name']) . '</p>
            <p><strong>Email:</strong> ' . htmlspecialchars($ticket['email']) . '</p>
            <p><strong>Travel Date & Time:</strong> ' . htmlspecialchars($ticket['travel_date_time']) . '</p>
            <p><strong>Arriving Date & Time:</strong> ' . htmlspecialchars($ticket['arriving_date_time']) . '</p>
            <p><strong>From:</strong> ' . htmlspecialchars($ticket['start_point']) . '</p>
            <p><strong>To:</strong> ' . htmlspecialchars($ticket['end_point']) . '</p>
            <p><strong>Seat Number:</strong> ' . htmlspecialchars($ticket['seat_number']) . '</p>
            <p><strong>Seat Type:</strong> ' . htmlspecialchars($ticket['seat_type']) . '</p>
            <p><strong>Seat Direction:</strong> ' . htmlspecialchars($ticket['seat_direction']) . '</p>
            <p><strong>Seat Position:</strong> ' . htmlspecialchars($ticket['seat_position']) . '</p>
            <p><strong>Ticket Number:</strong> ' . htmlspecialchars($ticket['ticket_number']) . '</p>
        </div>
        <div class="ticket-footer">
            <p><strong>Operator:</strong> ' . htmlspecialchars($ticket['operator']) . '</p>
            <p><strong>Price:</strong> $' . htmlspecialchars(number_format($discounted_price, 2)) . '</p>
        </div>
        <div class="ticket-thankyou">
            <p>Thank you for booking your train ticket with us. Please present this ticket before boarding.</p>
        </div>
        <div class="logout-button">
            <button onclick="logout()">Remember Chris Trainline is the best</button>
        </div>
    </div>

    <script>
        function logout() {
            if (confirm("Are you sure you want to logout?")) {
                window.location.href = "index.php";
            }
        }
    </script>
</body>
</html>
';

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'cbg18677@gmail.com';                   // SMTP username
    $mail->Password   = 'jire gxaf rnfp jrcx';                  // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS encouraged
    $mail->Port       = 587;                                    // TCP port to connect to

    // Disable SSL certificate verification (for debugging)
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    // Recipients
    $mail->setFrom('cbg18677@gmail.com', 'Chris Trainline');
    $mail->addAddress($user_email, $ticket['first_name'] . ' ' . $ticket['last_name']); // Add a recipient

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;

    $mail->send();
    echo '<script>alert("Dear Customer your ticket has been sent to your email address.");</script>';
} catch (Exception $e) {
    echo '<script>alert("Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . '");</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border: 2px solid #000;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
        }
        .ticket-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .ticket-header h1 {
            margin: 0;
        }
        .ticket-details {
            margin-bottom: 20px;
        }
        .ticket-details p {
            margin: 5px 0;
        }
        .ticket-footer {
            border-top: 2px solid #000;
            padding-top: 10px;
            margin-top: 20px;
            text-align: right;
        }
        .ticket-footer p {
            margin: 5px 0;
        }
        .ticket-thankyou {
            margin-top: 20px;
            font-style: italic;
        }
        .logout-button {
            margin-top: 20px;
            text-align: center;
        }
        .logout-button button {
            padding: 10px 20px;
            background-color: blue;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .logout-button button:hover {
            background-color: lightblue;
            color: #000;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="ticket-header">
            <h1>Train Ticket</h1>
            <p><strong>Booking ID:</strong> <?php echo htmlspecialchars($ticket['booking_id']); ?></p>
        </div>
        <div class="ticket-details">
            <p><strong>Passenger Name:</strong> <?php echo htmlspecialchars($ticket['first_name'] . ' ' . $ticket['last_name']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($ticket['email']); ?></p>
            <p><strong>Travel Date & Time:</strong> <?php echo htmlspecialchars($ticket['travel_date_time']); ?></p>
            <p><strong>Arriving Date & Time:</strong> <?php echo htmlspecialchars($ticket['arriving_date_time']); ?></p>
            <p><strong>From:</strong> <?php echo htmlspecialchars($ticket['start_point']); ?></p>
            <p><strong>To:</strong> <?php echo htmlspecialchars($ticket['end_point']); ?></p>
            <p><strong>Seat Number:</strong> <?php echo htmlspecialchars($ticket['seat_number']); ?></p>
            <p><strong>Seat Type:</strong> <?php echo htmlspecialchars($ticket['seat_type']); ?></p>
            <p><strong>Seat Direction:</strong> <?php echo htmlspecialchars($ticket['seat_direction']); ?></p>
            <p><strong>Seat Position:</strong> <?php echo htmlspecialchars($ticket['seat_position']); ?></p>
            <p><strong>Ticket Number:</strong> <?php echo htmlspecialchars($ticket['ticket_number']); ?></p>
        </div>
        <div class="ticket-footer">
            <p><strong>Operator:</strong> <?php echo htmlspecialchars($ticket['operator']); ?></p>
            <p><strong>Price:</strong> $<?php echo htmlspecialchars(number_format($discounted_price, 2)); ?></p> <!-- Display discounted price -->
        </div>
        <div class="ticket-thankyou">
            <p>Thank you for booking your train ticket with us. Please present this ticket before boarding.</p>
        </div>
        <div class="logout-button">
            <button onclick="logout()">Logout</button>
        </div>
    </div>

    <script>
        function logout() {
            if (confirm('Are you sure you want to logout?')) {
                window.location.href = 'logout.php';
            }
        }
    </script>
</body>
</html>
