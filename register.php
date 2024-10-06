<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('pexels-pixabay-159252.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            width: 300px;
        }
        .container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .form-group button:hover {
            background-color: #218838;
        }
        .error-message {
            color: red;
            font-weight: bold;
            margin-top: 10px;
            text-align: center;
        }
        .railcard-info {
            margin-top: 20px;
            font-size: 14px;
            color: #333;
        }
        .railcard-info h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #555;
        }
        .railcard-info p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" id="phone_number" name="phone_number" required>
            </div>
            <div class="form-group">
                <label for="rail_card_id">Rail Card ID:</label>
                <select id="rail_card_id" name="rail_card_id" required>
                    <option value="1">1 - 16-17 Saver (Discount: 50.00%)</option>
                    <option value="2">2 - 16-25 Railcard (Discount: 33.00%)</option>
                    <option value="3">3 - 26-30 Railcard (Discount: 35.00%)</option>
                    <option value="4">4 - Disabled Persons Railcard (Discount: 40.00%)</option>
                    <option value="5">5 - Family & Friends Railcard (Discount: 30.00%)</option>
                    <option value="6">6 - Network Railcard (Discount: 25.00%)</option>
                    <option value="7">7 - Senior Railcard (Discount: 20.00%)</option>
                    <option value="8">8 - Two Together Railcard (Discount: 33.00%)</option>
                    <option value="9">9 - Veterans Railcard (Discount: 34.00%)</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
            </div>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Database configuration
            include 'db_connection.php';

            // Check if username already exists
            $stmt = $conn->prepare("SELECT * FROM MemberCustomers WHERE username = ?");
            $stmt->bind_param("s", $_POST['username']);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<p class='error-message'>Username already exists</p>";
            } else {
                // Automatically generate customer_id and member_id
                $customer_id = rand(10000, 99999); // Example: Generate a random customer ID
                $stmt = $conn->prepare("SELECT MAX(member_id) AS max_member_id FROM MemberCustomers");
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $member_id = $row['max_member_id'] + 1;

                // Insert new user
                $stmt = $conn->prepare("INSERT INTO MemberCustomers (customer_id, card_id, username, password, email, phone_number) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("iissss", $customer_id, $_POST['rail_card_id'], $_POST['username'], $_POST['password'], $_POST['email'], $_POST['phone_number']);
                $stmt->execute();

                echo "<script>
                        alert('Account created successfully. You will be redirected to login.');
                        window.location.href = 'member-schedules.php';
                      </script>";
            }

            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
</body>
</html>
