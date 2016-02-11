<?php
session_start();
echo '<link rel="stylesheet" type="text/css" href="style.css">';
if (isset($_SESSION['user'])) {
  echo '<table border="1"><tr><td onclick="window.location=\'account.php\'">' . $_SESSION['user'] . '</td><td onclick="window.location=\'logoff.php\'">Logoff</td></tr></table>';
} else {
  echo '<table border="1"><tr><td onclick="window.location=\'login.php\'">Login</td><td onclick="window.location=\'register.php\'">Register</td></tr></table>';
}
echo '
<h1>Website Under Construction</h1>
';
