<?php
session_start(); // Start the session at the beginning of your PHP script
$card_type = ''; // Initialize with an empty string
$card_id = ''; 

if (!isset($_SESSION["username"])) {
    header("location: Sign-in.php");
    exit;
}


// Retrieve session variables
$member_type = isset($_SESSION['card_type']) ? htmlspecialchars($_SESSION['card_type']) : 'Not available';
$railcard_id = isset($_SESSION['card_id']) ? htmlspecialchars($_SESSION['card_id']) : 'Not available';
$discount_rate = isset($_SESSION['discount_rate']) ? htmlspecialchars($_SESSION['discount_rate']) : 'Not available';
$username = $_SESSION['username'];
$email = isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : 'Not available';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Schedule</title>
    <link rel="stylesheet" href="style1.css">
    <style>
body {
    margin: 0;
    padding: 0;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #1a1f29;
    padding: 20px 30px;
    color: white;
}

.header .logo img {
    height: 40px;
}

.account {
    display: flex;
    align-items: center;
    gap: 30px;
}

.account a {
    text-decoration: none;
    border-radius: 9px;
    background-color: white;
    padding: 10px;
    color: black;
    border: none;
    transition: background-color 0.1s, color 0.1s;
}

.account a:hover {
    color: white;
    background-color: #e52b0e;
}

.promises {
    background-color: lightseagreen;
    display: flex;
    justify-content: center;
    padding: 10px 0;
    gap: 20px;
    font-size: 16px;
}

.main-content {
    display: flex;
    justify-content: space-between;
    padding: 30px;
    width: 100%;
    box-sizing: border-box;
    gap: 20px;
}

.train-schedule-container {
    flex: 2;
}
.train-schedule-container h1 {
    margin-left: 350px;
}
.train-schedule {
    width: 90%;
    border-collapse: collapse;
    margin: auto;
}

.train-schedule th, .train-schedule td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
}

.train-schedule th {
    background-color: #f2f2f2;
    font-weight: bold;
    text-align: center;
}

.train-schedule tr:hover {
    background-color: #f5f5f5;
    cursor: pointer;
}

.train-schedule .price {
    color: #e52b0e;
    font-weight: bold;
    text-align: center;
}

#train-details {
    flex: 1;
    margin: auto !important;
    padding: 20px;
    border: 1px solid grey;
    background-color: lightgray;
    border-radius: 15px !important;px !important;
}

#train-details h2 {
    margin-top: 0;
    text-align: center;
}

.train-details-content {
    font-size: 16px;
    margin-bottom: 20px;
}

.train-details-content strong {
    display: block;
    margin-bottom: 5px;
}
.btnnn{
    display: flex;
    gap: 20px;
}
#continue-button, #change-destination-button {
    display: block;
    width: 70%;
    padding: 10px;
    background-color: #e52b0e;
    color: white;
    border: none;
    font-size: 16px;
    margin-top: 10px;
    cursor: pointer;
    border-radius: 9px;
}
#signInForm {
    display: none;
    position: fixed;
    top: 50px; /* Adjust according to your navbar height */
    right: 20px;
    width: 300px;
    padding: 20px;
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    z-index: 100000;
}

.close-btn {
    background: none;
    border: none;
    font-size: 1.5em;
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
}

h2 {
    font-size: 1.2em;
    margin-bottom: 20px;
    color: black;
}

label {
    display: block;
    margin-bottom: 5px;
    color: black;
}

input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.forgot-password {
    color: #ff3b00;
    text-decoration: none;
    display: block;
    margin-bottom: 15px;
}

.remember-me {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

.remember-me input {
    margin-right: 10px;
}

.sign-in-btn {
    width: 100%;
    padding: 10px;
    background-color: #ff3b00;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.create-account {
    color: #ff3b00;
    text-decoration: none;
    display: block;
    margin-top: 10px;
    text-align: center;
}
#selected-train div {
        margin-bottom: 8px;
    }

#selected-train strong {
    display: inline-block;
    width: 100px; /* Adjust this width as needed */
}

#selected-train .value {
    display: inline-block;
}


#continue-button:hover, #change-destination-button:hover {
    background-color: #c2240c;
}
.traveler-info {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            max-width: 90%;
            max-height: 90%;
            overflow-y: auto;
        }

        .traveler-info.active {
            display: block;
        }

        .traveler-info .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 1.5em;
            cursor: pointer;
        }
        .logo {
    display: flex;
    align-items: center;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: 24px;
}
/* Styling the travel extras section */
.travel-extras {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: 20px auto;
}

.travel-extras h2 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    text-align: center;
}

.travel-extras h3 {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 15px;
}

.preference-group h4 {
    font-size: 18px;
    margin-bottom: 10px;
}

.preference-group {
    margin-bottom: 20px;
}

.era {
    display: flex;
    flex-direction: row;
    gap: 20px;
}

.preference-button {
    display: flex;
    align-items: center;
    background-color: #f9f9f9;
    padding: 10px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    cursor: pointer;
    border: 1px solid transparent;
}

.preference-button:hover {
    background-color: #f0f0f0;
    border-color: #ddd;
}

.preference-radio {
    margin-right: 10px;
}

.label-text {
    font-size: 16px;
}

/* Additional form styling */
#extras-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

input[type="radio"] {
    accent-color: #007bff; /* Customize the radio button color */
}

@media (max-width: 600px) {
    .travel-extras {
        padding: 15px;
    }

    .travel-extras h2 {
        font-size: 22px;
    }

    .travel-extras h3, .preference-group h4 {
        font-size: 18px;
    }

    .label-text {
        font-size: 14px;
    }
}

    </style>
</head>
<body>
    <header>
        <div class="header">
            <div class="logo">
                <span>CHRIS TRAINLINE</span>
            </div>
            <div class="account">
                <a href="index.php" class="admin">Home</a>
                <a href="admin.php" class="admin">Administrator</a>
            </div>
        </div>
        <div class="promises">
            <span>✔ We never charge booking fees</span>
            <span>✔ Our price promise</span>
            <span>✔ Pick your seat when booking</span>
        </div>
    </header>
    <div class="main-content">
        <div class="train-schedule-container">
        <?php

include 'db_connection.php';

// Check if the required parameters are set
if (isset($_POST['departure_station']) && isset($_POST['arrival_station']) && isset($_POST['travel_date']) && isset($_POST['number_of_tickets'])) {
    $departing_station = $_POST['departure_station'];
    $arriving_station = $_POST['arrival_station'];
    $outward_date = $_POST['travel_date'];
    $num_tickets = $_POST['number_of_tickets']; 



    // Validate if any of the parameters are empty
    if (empty($departing_station) || empty($arriving_station) || empty($outward_date) || empty($num_tickets)) {
        echo "Error: All fields are required.";
        exit();
    }

    // Function to get train details from the database
    function getTrainDetails($conn, $departure_station, $arrival_station, $outward_date) {

        $schedule_id = $operator = $departure_time = $arrival_time = $duration = $prices = $start_point = $end_point = $number_of_changes = $available_tickets = "";
        // Enable detailed error reporting
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

    
        // Prepare the SQL statement
        $stmt = $conn->prepare("SELECT schedule_id, operator, departure_time, arrival_time, TIMEDIFF(arrival_time, departure_time) AS duration, price, start_point, end_point, number_of_changes, available_tickets FROM Schedules WHERE start_point = ? AND end_point = ? AND departure_time >= ?");
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }
    
        // Bind the parameters
        $stmt->bind_param("sss", $departure_station, $arrival_station, $outward_date);
        if ($stmt->errno) {
            die('Bind failed: ' . htmlspecialchars($stmt->error));
        }
    
        // Execute the statement
        $stmt->execute();
        if ($stmt->errno) {
            die('Execute failed: ' . htmlspecialchars($stmt->error));
        }
    
        // Bind the result variables
        $stmt->bind_result($schedule_id, $operator, $departure_time, $arrival_time, $duration, $prices, $start_point, $end_point, $number_of_changes, $available_tickets);
        if ($stmt->errno) {
            die('Bind result failed: ' . htmlspecialchars($stmt->error));
        }
    
        // Fetch the results and store them in an array
        $trainDetails = [];
        while ($stmt->fetch()) {
            $trainDetails[] = [
                'schedule_id' => $schedule_id,
                'operator' => $operator,
                'departure_time' => $departure_time,
                'arrival_time' => $arrival_time,
                'duration' => $duration,                'price' => $prices,
                'start_point' => $start_point,
                'end_point' => $end_point,
                'number_of_changes' => $number_of_changes,
                'available_tickets' => $available_tickets,
            ];
        }
    
        // Debugging output
        if (empty($trainDetails)) {
            echo "No results found for the given parameters.";
        } else {
            echo "Results retrieved successfully.";
        }
    
        // Close the statement
        $stmt->close();
    
        return $trainDetails;
    }
    
    
    // Get train details
    $trainDetails = getTrainDetails($conn, $departing_station, $arriving_station, $outward_date);

    // Check for errors
    if ($trainDetails === false) {
        echo "Error fetching train details.";
        exit();
    }

    // If there are train details, sort them by price
    if (!empty($trainDetails)) {
        usort($trainDetails, function($a, $b) {
            return $a['price'] - $b['price'];
        });
        $defaultTrain = $trainDetails[0];
    } else {
        $defaultTrain = null;
    }

    // Display available trains
    echo '<h1>Available Trains</h1>';
    echo '<table class="train-schedule">';
    echo '<tr>';
    echo '<th>Operator</th>';
    echo '<th>Start Point</th>';
    echo '<th>End Point</th>';
    echo '<th>Departure → Arrival</th>';
    echo '<th>Duration, Changes</th>';
    echo '<th>Price</th>';
    echo '<th>Available Tickets</th>'; // New: Display available tickets
    echo '</tr>';

    // Display each train detail in a table row
    foreach ($trainDetails as $train) {
        $changes_text = $train['number_of_changes'] == 0 ? "Direct" : $train['number_of_changes'] . " change" . ($train['number_of_changes'] > 1 ? "s" : "");
        echo "<tr data-train-details='" . htmlspecialchars(json_encode($train)) . "'>";
        echo "<td>" . htmlspecialchars($train['operator']) . "</td>";
        echo "<td>" . htmlspecialchars($train['start_point']) . "</td>";
        echo "<td>" . htmlspecialchars($train['end_point']) . "</td>";
        echo "<td>" . htmlspecialchars(date('H:i', strtotime($train['departure_time']))) . " → " . htmlspecialchars(date('H:i', strtotime($train['arrival_time']))) . "</td>";
        echo "<td>" . htmlspecialchars($train['duration']) . ", " . htmlspecialchars($changes_text) . "</td>";
        echo "<td class='price'>£" . htmlspecialchars(number_format($train['price'], 2)) . "</td>";
        echo "<td>" . htmlspecialchars($train['available_tickets']) . "</td>"; // New: Display available tickets
        echo "</tr>";
    }

    echo "</table>";

    // Add travel extras section
    echo '<section class="travel-extras">';
    echo '<h2>Add travel extras</h2>';
    echo '<form id="extras-form" action="" method="post">';
    echo '<input type="hidden" name="num_tickets" value="' . htmlspecialchars($num_tickets) . '">';
    echo '<div class="seat-preferences">';
    echo '<h3>Any seat preferences</h3>';
    echo '<div class="preference-group">';
    echo '<h4>Position</h4>';
    echo '<div class="era">';
    echo '<label class="preference-button">';
    echo '<input type="radio" name="seat_position" value="window" class="preference-radio">';
    echo '<span class="label-text">Window seats</span>';
    echo '</label>';
    echo '<label class="preference-button">';
    echo '<input type="radio" name="seat_position" value="aisle" class="preference-radio">';
    echo '<span class="label-text">Aisle seats</span>';
    echo '</label>';
    echo '<label class="preference-button">';
    echo '<input type="radio" name="seat_position" value="none" class="preference-radio">';
    echo '<span class="label-text">None</span>';
    echo '</label>';
    echo '</div>';
    echo '</div>';
    echo '<div class="preference-group">';
    echo '<h4>Direction</h4>';
    echo '<div class="era">';
    echo '<label class="preference-button">';
    echo '<input type="radio" name="seat_direction" value="forward" class="preference-radio">';
    echo '<span class="label-text">Forward</span>';
    echo '</label>';
    echo '<label class="preference-button">';
    echo '<input type="radio" name="seat_direction" value="backward" class="preference-radio">';
    echo '<span class="label-text">Backward</span>';
    echo '</label>';
    echo '<label class="preference-button">';
    echo '<input type="radio" name="seat_direction" value="none" class="preference-radio">';
    echo '<span class="label-text">None</span>';
    echo '</label>';
    echo '</div>';
    echo '</div>';
    echo '<div class="preference-group">';
    echo '<h4>Seat type</h4>';
    echo '<div class="era">';
    echo '<label class="preference-button">';
    echo '<input type="radio" name="seat_type" value="table" class="preference-radio">';
    echo '<span class="label-text">Table seat</span>';
    echo '</label>';
    echo '<label class="preference-button">';
    echo '<input type="radio" name="seat_type" value="standard" class="preference-radio">';
    echo '<span class="label-text">Standard seat</span>';
    echo '</label>';
    echo '<label class="preference-button">';
    echo '<input type="radio" name="seat_type" value="none" class="preference-radio">';
    echo '<span class="label-text">None</span>';
    echo '</label>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</form>';
    echo '</section>';
} else {
    echo "Error: Missing form parameters.";
}

// Close the database connection
$conn->close();
?>

</div>
<aside id="train-details">
    <h2>Train Details</h2>
    <div class="train-details-content" id="selected-train">
        <p>Click on a train to select the one you want and choose your traveling extra.</p>
    </div>
    <div class="btnnn">
        <button id="continue-button" disabled>Continue</button>
        <button id="change-destination-button">Change Destination</button>
    </div>
</aside>

<script>
 document.addEventListener('DOMContentLoaded', function() {
    let selectedTrain = null;
    let selectedSeatPreferences = {
        seat_position: null,
        seat_direction: null,
        seat_type: null
    };
    let ticketsAvailable = true; // Flag to track ticket availability
    const username = '<?php echo $username; ?>';
    const memberType = '<?php echo $member_type; ?>';
    const discountRate = '<?php echo $discount_rate; ?>';
    const email = '<?php echo $email; ?>';
    <?php echo htmlspecialchars($railcard_id); ?>;
    
    

    // Function to select a train and update details
    function selectTrain(train) {
        const details = document.querySelector('#selected-train');
        
        if (!ticketsAvailable) {
            // If tickets are not available, do not update train details
            return;
        }

        // Calculate discounted price
        const prices = train.price * (1 - (parseFloat(discountRate) / 100));
        
        details.innerHTML = `
            <div><strong>Operator:</strong> <span class="value">${train.operator}</span></div>
            <div><strong>Start Point:</strong> <span class="value">${train.start_point}</span></div>
            <div><strong>End Point:</strong> <span class="value">${train.end_point}</span></div>
            <div><strong>Departure:</strong> <span class="value">${new Date(train.departure_time).toLocaleTimeString()}</span></div>
            <div><strong>Arrival:</strong> <span class="value">${new Date(train.arrival_time).toLocaleTimeString()}</span></div>
            <div><strong>Duration:</strong> <span class="value">${train.duration}</span></div>
            <div><strong>Actual Price:</strong> <span class="value">£${parseFloat(train.price).toFixed(2)}</span></div>
            <div><strong>Discounted Price:</strong> <span class="value">£${parseFloat(prices).toFixed(2)}</span></div>
            <div><strong>Changes:</strong> <span class="value">${train.number_of_changes === 0 ? 'Direct' : train.number_of_changes + ' change' + (train.number_of_changes > 1 ? 's' : '')}</span></div>
            <div id="seat-preferences">
                <strong>Seat Preferences:</strong>
                <ul>
                    <li><strong>Position:</strong> <span class="value">${selectedSeatPreferences.seat_position || 'Not selected'}</span></li>
                    <li><strong>Direction:</strong> <span class="value">${selectedSeatPreferences.seat_direction || 'Not selected'}</span></li>
                    <li><strong>Type:</strong> <span class="value">${selectedSeatPreferences.seat_type || 'Not selected'}</span></li>
                </ul>
                <div id="seat-preferences-error" style="color: red; display: none;">Please select all seat preferences.</div>
                <div><strong>Member Type:</strong> <span class="value" id="member-type">${memberType}</span></div>
                <div><strong>Railcard ID:</strong> <span class="value" id="railcard-id"><?php echo htmlspecialchars($railcard_id); ?></span></div>
                <div><strong>Discount Rate:</strong> <span class="value" id="discount-rate">${discountRate}</span></div>
                <div><strong>Username:</strong> <span class="value" id="username"><?php echo htmlspecialchars($_SESSION["username"]); ?></span></div>
                <div><strong>Email:</strong> <span class="value" id="email">${email}</span></div>
                <div><strong>Number of Tickets:</strong> <span class="value" id="number-of-tickets"><?php echo htmlspecialchars($num_tickets); ?></span></div>
            </div>`;
        selectedTrain = train;
        updateContinueButtonState();
    }

    // Event listeners for selecting a train
    const trainRows = document.querySelectorAll('.train-schedule tr[data-train-details]');
    trainRows.forEach(function(row) {
        row.addEventListener('click', function() {
            trainRows.forEach(r => r.classList.remove('selected'));
            this.classList.add('selected');
            const trainData = JSON.parse(this.getAttribute('data-train-details'));
            checkTicketsAvailability(trainData); // Check tickets availability when a train is selected
            if (ticketsAvailable) {
                selectTrain(trainData);
            } else {
                // Optionally, you can clear the aside section or show a message that no train is selected
                document.querySelector('#selected-train').innerHTML = 'Limited number of seats please choose another train'; // Clear aside section
            }
        });
    });

    // Function to check ticket availability
    function checkTicketsAvailability(train) {
        const numTickets = parseInt('<?php echo $num_tickets; ?>');
        if (train.available_tickets < numTickets) {
            ticketsAvailable = false;
            alert(`Sorry, there are only ${train.available_tickets} tickets available for this train.`);
        } else {
            ticketsAvailable = true;
        }
    }

    // Function to update the state of the Continue button based on selections
    function updateContinueButtonState() {
        const continueButton = document.querySelector('#continue-button');
        continueButton.disabled = !selectedTrain;
    }

    // Event listeners for selecting seat preferences
    document.querySelectorAll('input[name="seat_position"], input[name="seat_direction"], input[name="seat_type"]').forEach(function(input) {
        input.addEventListener('change', function() {
            selectedSeatPreferences[this.name] = this.value;
            selectTrain(selectedTrain); // Update train details with selected seat preferences
        });
    });

    // Event listener for the Continue button
    document.querySelector('#continue-button').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default form submission

        const seatPreferencesError = document.querySelector('#seat-preferences-error');
        if (!selectedSeatPreferences.seat_position || !selectedSeatPreferences.seat_direction || !selectedSeatPreferences.seat_type) {
            seatPreferencesError.style.display = 'block';
        } else {
            seatPreferencesError.style.display = 'none';
            submitBooking(); // Call the function to submit the booking
        }
    });

    // Function to submit the booking
    function submitBooking() {
        const railcardId = document.querySelector('#railcard-id').textContent.trim();
        const memberType = document.querySelector('#member-type').textContent.trim();
        const discountRate = document.querySelector('#discount-rate').textContent.trim();
        const username = document.querySelector('#username').textContent.trim();
        const email = document.querySelector('#email').textContent.trim();
        const numberOfTickets = parseInt(document.querySelector('#number-of-tickets').textContent.trim());


        const bookingData = {
            train: selectedTrain,
            railcard_id: railcardId,
            member_type: memberType,
            seat_preferences: selectedSeatPreferences,
            discount_rate: discountRate,
            username: username,
            email: email,
            number_of_tickets: numberOfTickets
        };

        console.log('Booking Data:', bookingData);

        // Implement your fetch logic here
        fetch('save-member.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(bookingData)
        })
        .then(response => response.json())
        .then(data => {
            console.log('Server Response:', data);
            if (data.success) {
                alert('Booking successful!');
                window.location.href = `review-member.php?ticket_number=${data.ticket_number}`;
            } else {
                alert('Booking failed. Please try again.');
            }
        })
        // .catch(error => {
        //     console.error('Error:', error);
        //     alert('An error occurred while processing your booking. Please try again later.');
        // });
    }

    // Function to simulate fetching the number of tickets
    function fetchNumberOfTickets() {

        const numberOfTicketsInput = document.querySelector('#number-of-tickets-input');
        const numberOfTickets = numberOfTicketsInput ? parseInt(numberOfTicketsInput.value) : 0;
        document.querySelector('#number-of-tickets').textContent = numberOfTickets;
    }

    // Call fetchNumberOfTickets initially and whenever the form is updated
    fetchNumberOfTickets();
    document.querySelector('#travelerForm').addEventListener('change', fetchNumberOfTickets);

    function showTravelerInfo() {
        // Add your logic to show traveler info or process continuation
        submitBooking(); // For demonstration, directly submitting booking
    }

    window.showTravelerInfo = showTravelerInfo;

});


</script>

</body>
</html>

