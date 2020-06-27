<?php
session_start();
if(isset($_SESSION['email'])&&!empty($_SESSION['email'])) {
    header("Location: account.php");
}
?>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title>Wood Online Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="login.php" method="post">
        Email: <input type="text" name="email" /><br />
        <br />
        Password: <input type="password" name="pass" /><br />
        <br />
        <input type="submit" />
    </form><br />
    <br />
    <a href="/registration.php">Register now</a>
</body>
</html>