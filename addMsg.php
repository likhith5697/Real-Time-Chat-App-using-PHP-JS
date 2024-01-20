
<?php
include "db.php";


session_start();
$message = $_GET["message"];
$phonenumber = $_SESSION["phonenumber"];

$q = "SELECT * FROM `users` WHERE phonenumber='$phonenumber'";
if ($rq = mysqli_query($db, $q)) {
  if (mysqli_num_rows($rq) == 1) {

    $q = "INSERT INTO `message`(`phonenumber`, `message`) VALUES ('$phonenumber','$message')";
    $rq = mysqli_query($db, $q);

  }
}



?>