<?php
session_start();
if(empty($_SESSION['email'])) {
    header("Location: index.php");
}
?>

<?php
echo("Welcome to your account!\n");
echo("Your name is ".$_SESSION['name']." and your email is ".$_SESSION['email'].".");
?>
<html>
<br />
<br />
<form action="logout.php" method="post">
    <input type="submit" value="Logout" />
</form>
</html>