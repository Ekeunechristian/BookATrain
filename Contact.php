<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-transform: capitalize;
            transition: all .2s linear;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 25px;
            min-height: 100vh;
            background: linear-gradient(90deg, #2ecc71 60%, #27ae60 40.1%);
        }

        .container form {
            padding: 20px;
            width: 700px;
            background: #fff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
        }

        .container form .inputBox {
            margin: 15px 0;
        }

        .container form .inputBox span {
            margin-bottom: 10px;
            display: block;
            font-size: 18px;
            color: #333;
        }

        .container form .inputBox input,
        .container form .inputBox textarea {
            width: 100%;
            border: 1px solid #ccc;
            padding: 10px 15px;
            font-size: 15px;
            text-transform: none;
            resize: vertical;
        }

        .container form .inputBox input:focus,
        .container form .inputBox textarea:focus {
            border: 1px solid #000;
        }

        .container form .submit-btn {
            width: 100%;
            padding: 12px;
            font-size: 17px;
            background: #27ae60;
            color: #fff;
            margin-top: 15px;
            cursor: pointer;
        }

        .container form .submit-btn:hover {
            background: #2ecc71;
        }

        .container form .btn-group {
            display: flex;
            gap: 20px;
            margin-top: 15px;
        }

        .container form .btn-group .btn {
            flex: 1;
            padding: 12px;
            font-size: 17px;
            cursor: pointer;
            color: #fff;
            text-align: center;
            border: none;
        }

        .return-btn {
            background: #e74c3c;
        }

        .return-btn:hover {
            background: #c0392b;
        }
    </style>
    <title>Contact Form</title>
</head>
<body>

<div class="container">
    <form id="contact-form" method="POST" action="">
        <div class="inputBox">
            <span>Name:</span>
            <input type="text" name="name" placeholder="Your Name" required>
        </div>
        <div class="inputBox">
            <span>Email:</span>
            <input type="email" name="email" placeholder="example@example.com" required>
        </div>
        <div class="inputBox">
            <span>Feedback:</span>
            <textarea name="feedback" placeholder="Your Feedback" rows="5" required></textarea>
        </div>
        <div class="btn-group">
            <button type="submit" name="submit" class="btn submit-btn">Send Feedback</button>
            <button type="button" onclick="returnPreviousPage()" class="btn return-btn">Return</button>
        </div>

        <?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require 'vendor/autoload.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $name = htmlspecialchars(trim($_POST['name']));
            $email = htmlspecialchars(trim($_POST['email']));
            $feedback = htmlspecialchars(trim($_POST['feedback']));

            $mail = new PHPMailer(true);

            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.example.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;
                $mail->Username = 'your-email@example.com';  // SMTP username
                $mail->Password = 'your-email-password';    // SMTP password
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Recipients
                $mail->setFrom($email, $name);
                $mail->addAddress('your-email@example.com');  // Add a recipient

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'New Feedback from ' . $name;
                $mail->Body    = nl2br("Name: $name\nEmail: $email\n\nFeedback:\n$feedback");

                $mail->send();
                echo '<script>alert("Your feedback has been sent successfully!");</script>';
            } catch (Exception $e) {
                echo '<script>alert("There was an error sending your feedback: ' . $mail->ErrorInfo . '");</script>';
            }
        }
        ?>
    </form>
</div>

<script>
function returnPreviousPage() {
    // Navigate back to the previous page
    window.history.back();
}
</script>

</body>
</html>
