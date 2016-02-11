<?php
session_start();
echo '<link rel="stylesheet" type="text/css" href="style.css">';
echo '<table border="1"><tr><td onclick="window.location=\'index.php\'">Home</td></tr></table>';
echo '<h1>' . $_SESSION['user'] . '</h1>';
$con=mysqli_connect("localhost","root","","users");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT email FROM " . $_SESSION['user'];

$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo '<p>Email: ' . $row['email'] . '</p>';
      echo '<h2>Classes</h2>';
      echo '<table><tr>';
      if (empty($row['classes'])) {
        echo'<td>None</td></tr><tr><td onclick="window.location=\'addclass.php\'">Add a Class</td></tr>';
      }
      echo '</tr></table>';
    }
} else {
    echo "Error";
}
$con->close();
