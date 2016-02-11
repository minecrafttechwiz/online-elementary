<?php
session_start();
echo '<a href="index.php">Return Home</a>';
if (isset($_SESSION['user'])) {
  header('Location: index.php');
} elseif (isset($_SESSION['register'])) {
  echo "Verification email sent.";
} elseif (!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['email'])) {
  $con=mysqli_connect("localhost","root","","users");
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
  $sql="CREATE TABLE " . $_POST['name'] . " (password TEXT, email TEXT);";
  $sql.="INSERT INTO " . $_POST['name'] . " (password, email) VALUES ('" . $_POST['password'] . "', '" . $_POST['email'] . "');";
  mysqli_multi_query($con, $sql);
  $con->close();
  $_SESSION['register'] = 1;
  date_default_timezone_set('Etc/UTC');
  require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
  $mail = new PHPMailer();
  $mail->CharSet = 'UTF-8';
  $mail->IsSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;
  $mail->SMTPDebug = 0;
  $mail->SMTPAuth = true;
  $mail->Username = 'brianhvo02@gmail.com';
  $mail->Password = 'Camtuyen20';
  $mail->SetFrom('brianhvo02@gmail.com', 'Admin');
  $mail->Subject = 'Welcome, ' . $_POST['name'] . '!';
  $mail->msgHTML(file_get_contents('email.html'), dirname(__FILE__));
  $mail->AddAddress($_POST['email'], $_POST['name']);
  $mail->send();
} elseif (empty($_POST['name']) && empty($_POST['password']) && empty($_POST['email'])) {
  form();
} else {
  echo '<br>Something went wrong. Please try again.';
  form();
}
function form() {
  echo '
<form action="register.php" method="POST">
Name: <input type="text" name="name"><br>
Email: <input type="email" name="email"><br>
Password: <input type="password" name="password"><br>
<input type="submit">
</form>
  ';
}
