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
        <a href="index.php">Home</a>
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
            <form id="booking-form" action="train-schedules.php" method="post">
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


            const signInForm = document.getElementById('loginForm');
            const loginMessage = document.createElement('div');
            loginMessage.id = 'loginMessage';
            signInForm.appendChild(loginMessage);

            signInForm.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the form from submitting normally

                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;

                // Make AJAX request to validate login
                fetch('Sign-in.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Redirect to member-schedules.php on successful login
                        window.location.href = 'member-schedules.php';
                    } else {
                        // Display error message
                        loginMessage.textContent = 'User does not exist. Please check your credentials.';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    loginMessage.textContent = 'An error occurred while processing your login. Please try again.';
                });
            });

            // Close sign-in form when close button is clicked
            document.getElementById('closeBtn').addEventListener('click', function() {
                document.getElementById('signInForm').style.display = 'none';
            });
        
    </script>
</body>
</html>
