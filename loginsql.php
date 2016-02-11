<?php
if (!empty($_POST['password']) and  !empty($_POST['username'])) {
  $con = mysqli_connect("localhost","root",null,"users");
  if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $sql = "SELECT password FROM " . $_POST['username'] . ";";
  if ($result = $con->query($sql)) {
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $pass = $row['password'];
      }
      if ($_POST['password'] == $pass) {
        $_SESSION["user"] = $_POST['username'];
        header('Location: index.php');
      } else {
        echo "Wrong Password";
      }
    }
  } else {
    echo "Wrong Username";
  }
} elseif (empty($_POST['password']) xor empty($_POST['username'])) {
  echo "Opps! You forgot something.";
}
