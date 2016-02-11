<?php
error_reporting(0);
session_start();
if ($_SESSION['user']) {
  $_SESSION['user'] = null;
  header('Location: index.php');
} else {
  header('Location: index.php');
}
