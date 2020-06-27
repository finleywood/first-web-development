<?php
session_start();
if(isset($_SESSION['email'])&&!empty($_SESSION['email'])) {
    header("Location: /account.php");
}
?>
<?php
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];

$servername = 'localhost';
$user = 'dbuser';
$dbpass = 'kira2014';
$dbname = 'users';

$conn = mysqli_connect($servername, $user, $dbpass, $dbname);

if (!$conn) {
    die("There was an error:" . mysqli_connect_error());
}

$sql = "INSERT INTO info (name, email, pass)
VALUES ('$name', '$email', '$pass')";

if (mysqli_query($conn, $sql)) {
  echo "User account created successfully";
  $x = <<< HTML
  <html>
  <a href="/index.php">Login now</a>
  </html>
  HTML;
  echo($x);
} else {
  echo "An error ocurred: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

$body = <<< HTML
<html>
<head>
<img src="https://www.wood-online.co.uk/wp-content/uploads/2020/06/cropped-ost-logo.png" alt="logo" /><br>
<br>
</head>
<body>
Dear $name,
Your account details are as follows:
<br>
Email: $email
<br>
Password: $pass
<br>
Kind Regards,
Wood Online
<br>
<br>
</body>
<footer>
Copyright Wood Online 2020 
</footer>
</html>
HTML;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\composer\vendor\autoload.php';

$mail = new PHPMailer(TRUE);

try {
   
   $mail->setFrom('noreply@wood-online.co.uk', 'Wood Online Accounts');
   $mail->addAddress($email, $name);
   $mail->Subject = 'Your new Wood Online Account Details!';
   $mail->Body = $body;
   $mail->isHTML(true);
   
   /* SMTP parameters. */
   $mail->isSMTP();
   $mail->Host = 'mail.wood-online.co.uk';
   $mail->SMTPAuth = TRUE;
   $mail->SMTPSecure = 'tls';
   $mail->Username = 'noreply@wood-online.co.uk';
   $mail->Password = 'kira2014';
   $mail->Port = 587;
   
   /* Disable some SSL checks. */
   $mail->SMTPOptions = array(
      'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
      )
   );
   $mail->send();
}
catch (Exception $e)
{
   echo $e->errorMessage();
}
catch (\Exception $e)
{
   echo $e->getMessage();
}
?>