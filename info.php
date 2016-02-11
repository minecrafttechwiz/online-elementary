<?php
session_start();
echo '<a href="index.php">Return Home</a>';
include "loginsql.php";
if (empty($_SESSION['user'])) {
  echo '
  <form method="POST">
    Name: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit">
  ';
} else {
  header('Location: index.php');
}
