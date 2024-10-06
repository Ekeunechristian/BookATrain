<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["username"])) {
    header("location: member.php");
    exit;
}

// Include database connection file
include_once 'db_connection.php';

// Initialize variables
$username = $_SESSION["username"];

// Prepare SQL statement to fetch user data
$sql = "SELECT MC.member_id, MC.card_id, MC.username, MC.email, MC.phone_number, RC.card_type, RC.discount_rate
        FROM MemberCustomers MC
        JOIN RailCards RC ON MC.card_id = RC.card_id
        WHERE MC.username = ?";

if ($stmt = $conn->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("s", $username);
    
    // Attempt to execute the prepared statement
    if ($stmt->execute()) {
        // Store result
        $stmt->store_result();
        
        // Check if the user data exists
        if ($stmt->num_rows == 1) {
            // Bind result variables
            $stmt->bind_result($member_id, $card_id, $username, $email, $phone_number, $card_type, $discount_rate);
            $stmt->fetch();
            
            // Store data in session variables
            $_SESSION["member_id"] = $member_id;
            $_SESSION["card_id"] = $card_id;
            $_SESSION["email"] = $email;
            $_SESSION["phone_number"] = $phone_number;
            $_SESSION["card_type"] = $card_type;
            $_SESSION["discount_rate"] = $discount_rate;
        } else {
            // Redirect to login page if user data is not found
            header("location: member.php");
            exit;
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
        exit;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chris Trainline</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
/* Navigation Styling */
nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: white;
    border-bottom: 1px solid #ddd;
    height: 60px;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}

.logo {
    display: flex;
    align-items: center;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: 24px;
}
.drill{
    display: flex;
    align-items: center;
    margin-right: 10px;
    gap: 50px;
    
}
.drill a{
    text-decoration: none;
    color: #000;
    font-weight: bold;
    padding: 10px;
    border: solid 1px white;
}
.drill a:hover {
    color: rgba(2, 70, 255);
    border: solid 1px rgba(2, 70, 255);
    border-radius: 9px;
    
}
.drill .active{
    color: blue;
    border: solid 1px rgba(2, 70, 255);
    border-radius: 9px;
}
.
/* Background Section */
.background {
    background-image: url('pexels-vladimirsrajber-14924416.jpg');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 600px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding-left: 150px;
    margin-bottom: 50px;
}

.background h1 {
    font-size: 60px;
    color: white;
    text-align: center;
}

.background p {
    color: white;
    font-size: 30px;
    text-align: center
}

/* Book Section */
.book {
    position: inherit;
    margin: auto;
    padding-top: 30px;
    padding-bottom: 30px;
    padding-left: 500px;
    padding-right: 500px;
    background: rgba(220, 255, 255, 0.95);
    border-radius: 10px;
    box-shadow: 1px 5px 9px rgba(0, 0, 0, 0.7);
    max-width: 800px;
}

.ticket-booking {
    width: 100%;
    margin: auto;
    position: inherit;
}

.ticket-booking h1 {
    color: rgba(2, 70, 255);
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
}

.welcome-back {
    font-size: 18px;
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

.form-group,
.form-group1 {
    margin-bottom: 15px;
    
}
.railcard{
    display: flex !important;
}

.formgrouping {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    justify-content: space-between;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="datetime-local"],
input[type="number"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 15px;
}

.passenger-controls {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
}

.passenger-control {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.passenger-control label {
    margin-right: 10px;
}

.btn-decrease,
.btn-increase {
    background-color: rgba(2, 70, 255);
    color: #fff;
    border: none;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    font-size: 20px;
}

input[type="number"] {
    width: 60px;
    text-align: center;
    margin: 0 10px;
}

.railcard {
    margin-top: 20px;
    text-align: center;
    display: flex;
    flex-direction: row
}

.railcard-fields {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-top: 10px;
    padding: 10px;
    border: none;
}

.card-label {
    display: flex;
    gap: 10px;
    align-items: center;
}

.readonly {
    background-color: #e9ecef;
    border: none;
    padding: 8px;
    border-radius: 4px;
    width: 100%;
    box-sizing: border-box;
}

.find-tickets {
    background-color: rgba(2, 70, 255);
    color: #fff;
    border: none;
    padding: 15px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 4px;
    width: 100%;
    margin-top: 20px;
    text-align: center;
}

/* Error Styles */
.error {
    border: 2px solid red;
}

.error-message {
    color: red;
    font-size: 12px;
    margin-top: 4px;
}

/* Footer Styling */
footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px 0;
    width: 100%;
    bottom: 0;
    position: relative;
}

footer p {
    margin: 0;
    font-size: 14px;
}

footer a {
    color: #e52b0e;
    text-decoration: none;
    font-weight: bold;
}

footer a:hover {
    text-decoration: underline;
}

.message{
    color: #333;
    font-size: 20px;
    margin-top: 10px;
}

.discount-rate {
    font-size: 20px;
    color: #e52b0e;
    font-weight: bold;
    margin: 0;
}
.error-display{
    justify-content: space-between;
}
.red{
    color: red;
}

    </style>
</head>
<body>
    <nav>
        <div class="logo">
            <span>CHRIS TRAINLINE</span>
        </div>
        <div class="drill">
        <a href="index.php" >Home</a>
        <a href="admin.php" class="admin">Administrator</a>
        <a href="Contact.php">Contact US</a>
        </div>
    </nav>
    <section class="background">
        <h1 class="title">Save this summer</h1>
        <p class="Sub-title">Book in advance</p>
    </section>
    <section class="book">
        <div class="ticket-booking">
            <h1>Buy tickets</h1>
            <p class="message">Welcome back,<strong class="red"><?php echo htmlspecialchars($_SESSION["username"]); ?>!</strong> </p>
            <form id="booking-form" action="member-trains.php" method="post">
                <div class="formgrouping">
                    <div class="form-group1">
                        <div class="error-display">
                            <label for="departure_station">Leaving from: </label>
                            <input type="text" id="departure_station" placeholder="Departing Station" name="departure_station" required>
                        </div>
                        <div id="departing-station-error" class="error-message"></div>
                    </div>
                    <div class="form-group1">
                        <div class="error-display">
                            <label for="arrival_station">Going to: </label>
                            <input type="text" id="arrival_station" placeholder="Arriving Station" name="arrival_station" required>
                        </div>
                        <div id="arriving-station-error" class="error-message"></div>
                    </div>
                    <div class="form-group1">
                        <div class="error-display">
                            <label for="travel_date">Date and Time: </label>
                            <input type="datetime-local" id="travel_date" name="travel_date" required>
                        </div>
                        <div id="date-time-error" class="error-message"></div>
                    </div>
                </div>
                <div class="passenger-controls">
                    <div class="passenger-control">
                        <label>Number of Tickets</label>
                        <button type="button" class="btn-decrease">-</button>
                        <input type="number" id="number_of_tickets" name="number_of_tickets" value="1" min="1">
                        <button type="button" class="btn-increase">+</button>
                    </div>
                </div>
                <div class="form-group railcard">
                    <p class="message"><?php echo htmlspecialchars($_SESSION['username']); ?>, your rail card details are already provided.</p><br>
                    <br>
                    <strong><p>Discount Rate: <?php echo $_SESSION['discount_rate']; ?>%</p></strong>
                </div>
                <div id="railcard-fields" class="railcard-fields">
                    <div class="card-label">
                        <label for="railcard-id">Railcard ID: </label>
                        <input type="text" id="railcard-id" name="railcard-id" value="<?php echo htmlspecialchars($_SESSION['card_id']); ?>" class="readonly" readonly>
                    </div>
                    <div class="card-label">
                        <label for="member-type">Member Type: </label>
                        <select id="member-type" name="member-type" class="readonly" disabled>
                            <option value=""></option>
                            <option value="16-17 Saver" <?php echo ($_SESSION['card_type'] == '16-17 Saver') ? 'selected' : ''; ?>>16-17 Saver</option>
                            <option value="16-25 Railcard" <?php echo ($_SESSION['card_type'] == '16-25 Railcard') ? 'selected' : ''; ?>>16-25 Railcard</option>
                            <option value="26-30 Railcard" <?php echo ($_SESSION['card_type'] == '26-30 Railcard') ? 'selected' : ''; ?>>26-30 Railcard</option>
                            <option value="Disabled Persons Railcard" <?php echo ($_SESSION['card_type'] == 'Disabled Persons Railcard') ? 'selected' : ''; ?>>Disabled Persons Railcard</option>
                            <option value="Family & Friends Railcard" <?php echo ($_SESSION['card_type'] == 'Family & Friends Railcard') ? 'selected' : ''; ?>>Family & Friends Railcard</option>
                            <option value="Network Railcard" <?php echo ($_SESSION['card_type'] == 'Network Railcard') ? 'selected' : ''; ?>>Network Railcard</option>
                            <option value="Senior Railcard" <?php echo ($_SESSION['card_type'] == 'Senior Railcard') ? 'selected' : ''; ?>>Senior Railcard</option>
                            <option value="Two Together Railcard" <?php echo ($_SESSION['card_type'] == 'Two Together Railcard') ? 'selected' : ''; ?>>Two Together Railcard</option>
                            <option value="Veterans Railcard" <?php echo ($_SESSION['card_type'] == 'Veterans Railcard') ? 'selected' : ''; ?>>Veterans Railcard</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="find-tickets">Find times and prices</button>
            </form>
        </div>
    </section>

        <footer>
            <p>Copyright © 2024 Chris the Traveller Blog</p>
            <p>Powered by Chris the traveller</p>
        </footer>
    <script>
    // Increase and Decrease button functionality
    document.querySelectorAll('.btn-increase').forEach(button => {
        button.addEventListener('click', () => {
            const input = button.previousElementSibling;
            input.value = parseInt(input.value) + 1;
        });
    });

    document.querySelectorAll('.btn-decrease').forEach(button => {
        button.addEventListener('click', () => {
            const input = button.nextElementSibling;
            if (input.value > 1) {
                input.value = parseInt(input.value) - 1;
            }
        });
    });

        // Show railcard fields when the button is clicked
        document.querySelector('.add-railcard').addEventListener('click', () => {
            document.querySelector('#railcard-fields').style.display = 'block';
        });
    </script>
</body>
</html>
