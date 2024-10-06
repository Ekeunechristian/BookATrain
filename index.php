<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        /* styles for the landing page */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background-image: url('pexels-pixabay-159252.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #333;
        }
        .container {
            display: flex;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
            backdrop-filter: blur(10px);
        }
        .login, .welcome {
            padding: 50px;
            flex: 1;
        }
        .login {
            background-color: rgba(255, 255, 255, 0.5);
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .login h2 {
            margin-bottom: 30px;
            font-size: 28px;
            color: #333;
        }
        .login button {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 25px;
            font-size: 18px;
            margin-bottom: 20px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        }
        .welcome button{
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 25px;
            font-size: 18px;
            margin-bottom: 20px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        }
        .login button.admin {
            background: #3999ff;
            color: #fff;
        }
        .login button.guest {
            background: #3999ff;
            color: #fff;
        }
        .login button.member {
            background: #3999ff;
            color: #fff;
        }
        .welcome button.member{
            background: red;
            color: #fff;
        }
        .login button:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(5px, 5px, 5px, 0.5);
            background-color: blue;
        }
        .welcome {
            background: rgba(0, 0, 0, 0.4);
            color: white;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .welcome h2 {
            margin-bottom: 30px;
            font-size: 28px;
            color: #f8f9fa;
        }
        .welcome p {
            font-size: 20px;
            color: #ced4da;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login">
            <h2>Login As</h2>
            <button class="admin" onclick="window.location.href='admin.php'">Administrator</button>
            <button class="guest" onclick="window.location.href='guest.php'">Guest User</button>
            <button class="member" onclick="window.location.href='member.php'">Member User</button>
        </div>
        <div class="welcome">
            <h2>Welcome to Chris Trainline</h2>
            <p>Please proceed by choosing how you want to login</p>
            <p>If you wish to create a user account click on the button below</p>
            <button class="member" onclick="window.location.href='register.php'">Create user Account</button>
        </div>
    </div>
</body>
</html>
