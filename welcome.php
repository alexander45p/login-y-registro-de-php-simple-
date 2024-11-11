<!-- welcome.php -->
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Welcome</title>
</head>
<body>
<div class="login-container">
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    <form action="logout.php">
        <button type="submit">Logout</button>
    </form>
    </div>
    
</body>
</html>
