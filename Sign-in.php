<?php
// Include your database connection file here if not already included
include_once 'db_connection.php';

// Initialize the session if not already started
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Initialize variables for username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare a SQL statement to fetch the user from the database based on username and password
    $sql = "SELECT * FROM MemberCustomers WHERE username = ? AND password = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("ss", $param_username, $param_password);
        
        // Set parameters
        $param_username = $username;
        $param_password = $password; // Note: For security, you should hash passwords in a real-world scenario
        
        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Store result
            $stmt->store_result();
            
            // Check if username and password exist
            if ($stmt->num_rows == 1) {
                // Store data in session variables
                $_SESSION["username"] = $username;
                
                // Return a success response
                echo json_encode(["success" => true]);
            } else {
                // Return an error response
                echo json_encode([
                    "success" => false,
                    "errors" => ["username" => "Invalid username or password."]
                ]);
            }
        } else {
            echo json_encode(["success" => false, "errors" => ["server" => "Oops! Something went wrong. Please try again later."]]);
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $conn->close();
}
