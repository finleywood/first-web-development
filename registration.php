<?php
session_start();
if(isset($_SESSION['email'])&&!empty($_SESSION['email'])) {
    header("Location: account.php");
}
?>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Wood Online Registration</title>
</head>
<body>
    <h1>Register</h1>
    <form action="register.php" method="post">
        Full Name: <input type="text" name="name" /><br>
        <br>
        Email: <input type="text" name="email" /><br>
        <br>
        Password: <input type="password" name="pass" /><br>
        <br>
        <input type="submit" />
    </form>
</body>
</html>