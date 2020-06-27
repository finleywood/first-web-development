<?php
session_start();
?>

<?php

$email = $_POST['email'];
$pass = $_POST['pass'];

if($email == '') {
    header("Location: /account.php");
}

$servername = 'localhost';
$user = 'dbuser';
$dbpass = 'kira2014';
$dbname = 'users';

$conn = mysqli_connect($servername, $user, $dbpass, $dbname);

if (!$conn) {
    die("There was an error:" . mysqli_connect_error());
}

$sql = "SELECT name, email, pass FROM info WHERE email='$email'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$checkpass = $row["pass"];
$name = $row["name"];

if ($pass == $checkpass) {
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    echo("Logged in successfully! Redirecting to account page!");
    header("Location: /account.php");
    $a = <<< HTML
    <html>
        <form action="account.php" method="post" />
            <input type="submit" value="Go to my account" />
        </form>
    </html>
    HTML;
    echo($a);


} else {
  echo("Either the account does not exist or the email or password are incorrect!");
  $x = <<< HTML
  <html>
    <a href="/index.php">Back to login</a>
  </html>
  HTML;
  echo($x);
}

mysqli_close($conn);
?>
