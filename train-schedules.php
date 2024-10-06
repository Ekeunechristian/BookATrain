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
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
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
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.8);
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
        h2 {
    font-size: 1.2em;
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}



.step:last-child::after {
    display: none;
}


/* .traveler-info {
    width: 90%;
    max-width: 900px;
    background-color: #fff;
    padding: 20px;
    margin: auto;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.8);

} */

h1 {
    font-size: 24px;
    margin-bottom: 10px;
}

.info-text {
    display: flex;
    align-items: center;
    font-size: 14px;
    color: #555;
}

.info-icon {
    margin-right: 10px;
    font-size: 16px;
}

.travel-documents {
    background-color: #e7f3ff;
    border-left: 4px solid #007bff;
    padding: 10px;
    margin: 20px 0;
}

.personal-info, .contact-details {
    margin-bottom: 20px;
}

h2 {
    font-size: 18px;
    margin-bottom: 10px;
}

.name-fields, .email-fields {
    display: flex;
    flex-direction: column;
}

.name-fields input, .email-fields input {
    width: 100%;
    max-width: 300px;
    margin: 5px 0;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
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
                <a href="Index.php" class="admin">Home</a>
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
        <section id="travelerInfoPopup" class="traveler-info" >
        <!-- #region --> <button class="close-btn" onclick="closeTravelerInfo()">×</button>
            <h1>Who is traveling?</h1>
            <p class="info-text">
                <i class="info-icon">ℹ️</i>
                The following information is required for booking. Passenger names must match their ID.
            </p>
            <div class="travel-documents">
                <p>Add your travel documents after purchase and download your ticket.</p>
            </div>
            <div class="personal-info">
                <form id="travelerForm" action="" method="post">
                    <h2>Adult</h2>
                    <div class="name-fields">
                        <input type="text" placeholder="First name" id="first-name" name="first-names">
                        <input type="text" placeholder="Last names" id="last-names" name="last-names">
                    </div>
                </div>
                <div class="contact-details">
                    <h2>Contact details</h2>
                    <p>Send tickets and confirmation by email to:</p>
                    <div class="email-fields">
                        <input type="email" placeholder="E-mail address" id="email-address" name="email">
                        <input type="email" placeholder="Confirm Email Address" id="confirm-email-address" name="email">
                    </div>
                </div>
                <button type="submit" id="continueButton">Continue</button>
            </form>
        </section>
        <div class="train-schedule-container">
        <?php
// Include the database connection script
include 'db_connection.php';

// Check if the required parameters are set
if (isset($_POST['departure_station']) && isset($_POST['arrival_station']) && isset($_POST['travel_date']) ) {
    $departing_station = $_POST['departure_station'];
    $arriving_station = $_POST['arrival_station'];
    $outward_date = $_POST['travel_date'];
    $num_tickets = $_POST['number_of_tickets'];
    // Check if the form is submitted
 


    // Check if any of the parameters are empty
    if (empty($departing_station) || empty($arriving_station) || empty($outward_date)) {
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
                'duration' => $duration,
                'price' => $prices,
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

    echo "</table>";
    
    // Add travel extras section
    echo '<section class="travel-extras">';
    echo '<h2>Add travel extras</h2>';
    echo '<form id="extras-form" action="" method="post">';
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
    echo '<input type="radio" name="seat_type" value="quiet" class="preference-radio">';
    echo '<span class="label-text">Quiet coach</span>';
    echo '</label>';
    echo '<label class="preference-button">';
    echo '<input type="radio" name="seat_type" value="power" class="preference-radio">';
    echo '<span class="label-text">Power socket</span>';
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
    echo "Required parameters are missing.";
}

// Close the database connection
$conn->close();
?>
</div>
<aside id='train-details'>
    <h2>Train Details</h2>
    <div class="train-details-content" id='selected-train'>
        <p>Click on a train to select the one you want and choose your travelling extra.</p>
    </div>
    <div class="btnnn">
        <button id='continue-button'  disabled>Continue</button>
        <button id='change-destination-button'>Change Destination</button>
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
    let ticketsAvailable = true; // Define ticketsAvailable

    // Function to select a train and update details
    function selectTrain(train) {
        const details = document.querySelector('#selected-train');
        details.innerHTML = `
            <div><strong>Operator:</strong> <span class="value">${train.operator}</span></div>
            <div><strong>Start Point:</strong> <span class="value">${train.start_point}</span></div>
            <div><strong>End Point:</strong> <span class="value">${train.end_point}</span></div>
            <div><strong>Departure:</strong> <span class="value">${new Date(train.departure_time).toLocaleTimeString()}</span></div>
            <div><strong>Arrival:</strong> <span class="value">${new Date(train.arrival_time).toLocaleTimeString()}</span></div>
            <div><strong>Duration:</strong> <span class="value">${train.duration}</span></div>
            <div><strong>Price:</strong> <span class="value">£${parseFloat(train.price).toFixed(2)}</span></div>
            <div><strong>Changes:</strong> <span class="value">${train.number_of_changes === 0 ? 'Direct' : train.number_of_changes + ' change' + (train.number_of_changes > 1 ? 's' : '')}</span></div>
            <div id="seat-preferences">
                <strong>Seat Preferences:</strong>
                <ul>
                    <li><strong>Position:</strong> <span class="value">${selectedSeatPreferences.seat_position || 'Not selected'}</span></li>
                    <li><strong>Direction:</strong> <span class="value">${selectedSeatPreferences.seat_direction || 'Not selected'}</span></li>
                    <li><strong>Type:</strong> <span class="value">${selectedSeatPreferences.seat_type || 'Not selected'}</span></li>
                </ul>
            </div>
           <div id="seat-preferences-error" style="color: red; display: none;">Please select all seat preferences.</div>
            <div><strong>Number of Tickets:</strong> <span class="value" id="number-of-tickets"><?php echo htmlspecialchars($num_tickets); ?></span></div>`;
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
                document.querySelector('#selected-train').innerHTML = 'Limited number of seats please choose another train';
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

    // Function to show traveler info popup
    function showTravelerInfo() {
        document.getElementById('travelerInfoPopup').classList.add('active');
    }

    // Function to close traveler info popup
    function closeTravelerInfo() {
        document.getElementById('travelerInfoPopup').classList.remove('active');
    }

    // Event listener for the Change Destination button
    document.querySelector('#change-destination-button').addEventListener('click', function(event) {
        window.location.href = 'guest.php';
    });

    // Event listener for the Continue button
    document.querySelector('#continue-button').addEventListener('click', function(event) {
        const seatPreferencesError = document.querySelector('#seat-preferences-error');
        if (!selectedSeatPreferences.seat_position || !selectedSeatPreferences.seat_direction || !selectedSeatPreferences.seat_type) {
            seatPreferencesError.style.display = 'block';
            event.preventDefault(); // Prevent form submission or navigation
        } else {
            seatPreferencesError.style.display = 'none';
            showTravelerInfo();
        }
    });

    document.querySelector('#travelerForm').addEventListener('submit', function(event) {
        event.preventDefault();
        submitBooking();
    });

    function submitBooking() {
        const firstName = document.querySelector('#first-name').value;
        const lastName = document.querySelector('#last-names').value; // Ensure correct ID
        const email = document.querySelector('#email-address').value;

        const numberOfTickets = document.querySelector('#number-of-tickets').textContent;

        // Log the captured form values
        console.log("First Name: ", firstName);
        console.log("Last Name: ", lastName);
        console.log("Email: ", email);
        console.log("Number of tickets: ", numberOfTickets);
        console.log("Selected Train: ", selectedTrain);

        const bookingData = {
            train: selectedTrain,
            first_name: firstName,
            last_name: lastName,
            email: email,
            number_of_tickets: numberOfTickets,
            seat_preferences: selectedSeatPreferences
        };

        // Log the booking data before sending
        console.log("Booking Data: ", bookingData);

        fetch('save_booking.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(bookingData)
        })
        .then(response => response.json())
        .then(data => {
            console.log("Server Response: ", data);

            if (data.success) {
                alert('Booking successful!');
                window.location.href = `review.php`;
            } else {
                alert('Booking failed. Please try again.');
            }
        })
        // .catch(error => {
        //     console.error('Error:', error);
        //     alert('An error occurred while processing your booking. Please try again later.');
        // });
    }

    window.showTravelerInfo = showTravelerInfo;
    window.closeTravelerInfo = closeTravelerInfo;
});



</script>
</body>
</html>

