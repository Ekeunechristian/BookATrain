<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <script>
        async function handleSubmit(event) {
            event.preventDefault(); // Stop normal form submission

            // Clear any previous errors
            document.getElementById('username_err').innerText = '';
            document.getElementById('password_err').innerText = '';

            // Get form data
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            // Prepare the data to be sent
            const formData = new FormData();
            formData.append('username', username);
            formData.append('password', password);

            try {
                // Send data using Fetch API
                const response = await fetch('Sign-in.php', {
                    method: 'POST',
                    body: formData
                });

                // Process the response
                const result = await response.json();

                if (result.success) {
                    // Handle successful login
                    alert('Login successful!');
                    window.location.href = 'member-schedules.php'; // Redirect to another page
                } else {
                    // Handle errors
                    if (result.errors.username) {
                        document.getElementById('username_err').innerText = result.errors.username;
                    }
                    if (result.errors.password) {
                        document.getElementById('password_err').innerText = result.errors.password;
                    }
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            }
        }
    </script>
    <style>
        /* General Reset and Base Styles */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Arial', sans-serif;
    background: url('pexels-pixabay-159252.jpg') no-repeat center center fixed;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #333;
}

h2 {
    font-size: 2em;
    margin-bottom: 20px;
    color: #333;
    text-align: center;
}

form {
    background-color: rgba(255, 255, 255, 0.9);
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 400px;
    margin: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1em;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #e52b0e;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 1em;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #c2240c;
}

#username_err,
#password_err {
    color: red;
    margin-bottom: 10px;
    font-size: 0.9em;
}
    </style>
</head>
<body>
    <h2>Login</h2>
    
    <form onsubmit="handleSubmit(event)">
        <div id="username_err" style="color: red;"></div>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        
        <div id="password_err" style="color: red;"></div>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>
