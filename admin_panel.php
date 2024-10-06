<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chris Trainline</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        body {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    margin: 0;
    padding: 0;
    background-image: url('pexels-pixabay-159252.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.header {
    text-align: center;
    background-color: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(8px);
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
    /* max-width: 600px;
    width: 90%; */
}

.logo {
    font-size: 28px;
    font-weight: bold;
    color: #333;
    margin-bottom: 25px;
}

.nav {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.nav a {
    text-decoration: none;
    margin: auto;
    width: 20%;
    color: #333;
    font-weight: bold;
    padding: 10px;
    transition: color 0.3s ease, border-color 0.3s ease;
    border: 1px solid transparent;
    border-radius: 10px;
    background-color: rgba(255, 255, 255, 0.8);
}

.nav a:hover,
.nav .active {
    color: #e52b0e;
    border-color: #e52b0e;
}

.account {
    margin-top: 30px;
}

.account a {
    text-decoration: none;
    border-radius: 10px;
    background-color: rgba(255, 255, 255, 0.9);
    padding: 12px 24px;
    color: #333;
    border: 2px solid #e52b0e;
    transition: color 0.3s ease, background-color 0.3s ease;
    display: inline-block;
}

.account a:hover {
    color: white;
    background-color: #e52b0e;
}

    </style>
</head>
<body>
    <div class="header">
        <div class="logo">CHRIS TRAINLINE ADMIN PANEL</div>
        <div class="nav">
            <a href="schedules.php">Manage Schedules</a>
            <a href="train.php">Manage Trains</a>
        </div>
        <div class="account">
            <a href="Index.php" class="admin">Sign Out</a>
        </div>
    </div>
</body>
</html>
