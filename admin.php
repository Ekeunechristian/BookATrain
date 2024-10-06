<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
        }

        .container {
            margin: auto;
            height: 550px;
            width: 900px;
            display: flex;
            padding: 1rem;
            background: linear-gradient(135deg, #8fd9fe, #fde2ff, #f7c7fc, #b1afff, #a0abff);
        }

        .left-section {
            width: 50%;
            border-radius: 1rem;
            background: url('assets/login.gif') center no-repeat;
            background-size: cover;
        }

        .right-section {
            width: 50%;
            padding: 1rem 3rem 1rem 4rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }

        .header-text {
            font-size: 24px;
            font-family: cursive;
        }

        .login-section {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .login-section input {
            width: 100%;
            height: 50px;
            padding: 0.5rem 1rem;
            outline: none;
            border: none;
            border-radius: 1rem;
        }

        .login-section input::placeholder {
            font-family: cursive;
        }

        .term-condition {
            font-size: 12px;
            font-family: cursive;
        }

        button {
            border-radius: 1rem;
            padding: 1rem;
            border: none;
            cursor: pointer;
            text-transform: uppercase;
        }

        .btn-sign-in {
            height: 50px;
            color: #fff;
            background: #000;
        }

        .forget-password {
            text-align: right;
            font-size: 14px;
            cursor: pointer;
            margin-bottom: 1rem;
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin: 0.5rem 0 1rem 0;
        }

        .social-login button {
            background: #fff;
        }

        .social-login button img {
            width: 24px;
        }

        .sign-up-redirect strong {
            cursor: pointer;
        }

        @media screen and (min-width: 600px) and (max-width: 768px) {
            .container {
                width: 100%;
            }
        }

        @media screen and (max-width: 600px) {
            body {
                height: auto;
            }

            .container {
                width: 100%;
                height: 100%;
                padding: 1.5rem 0 0;
                flex-direction: column-reverse;
            }

            .left-section {
                width: 100%;
                height: 500px;
                border-radius: 0;
            }

            .right-section {
                width: 100%;
                padding: 1rem 4rem;
            }
        }
        .seperator-text{
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-section"></div>
        <div class="right-section">
            <h1 class="header-text">Get Started</h1>
            
            <?php
            include 'db_connection.php';
            // Process form data
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST['email'];
                $password = $_POST['password'];

                // Perform SQL query to check if admin exists with given email and password
                $sql = "SELECT * FROM administration WHERE email = '$email' AND password = '$password'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Admin found, redirect to admin_panel.php
                    header("Location: admin_panel.php");
                    exit();
                } else {
                    // Admin not found, display message
                    echo '<div class="error-message">Admin not found</div>';
                }
            }

            $conn->close();
            ?>
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="login-section">
                <div class="form-input">
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="form-input">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn-sign-in">Sign In</button>
            </form>
            <div class="seperator-text">
                 <strong>Add you admin credidentials</strong> 
            </div>
        </div>
    </div>
</body>
</html>
