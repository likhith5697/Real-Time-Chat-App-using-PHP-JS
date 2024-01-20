<?php
include "db.php"; 

session_start();

if(isset($_POST["username"]) && isset($_POST["phonenumber"])){


  $username = $_POST["username"]; 
  $phonenumber = $_POST["phonenumber"]; 
  $q = "SELECT * FROM `users` WHERE username='$username' && phonenumber ='$phonenumber'";
  if($rq=mysqli_query($db,$q)){
    if(mysqli_num_rows($rq)==1){
      $_SESSION["username"] = $username;
      $_SESSION["phonenumber"] = $phonenumber;
      header("location: index.php");
    }

    else{
      $q = "SELECT * FROM `users` WHERE phonenumber='$phonenumber'";
      if($rq=mysqli_query($db,$q)){

        if(mysqli_num_rows($rq)==1){
          echo " <script> alert ('person with this '+ $phonenumber + ' phone number exists')</script>";
        }

        else{

          $q="INSERT INTO `users`(`username`, `phonenumber`) VALUES ('$username','$phonenumber')";
          if($rq=mysqli_query($db, $q)){

            $q = "SELECT * FROM `users` WHERE username='$username' && phonenumber ='$phonenumber'";
            if($rq=mysqli_query($db,$q)){

              if(mysqli_num_rows($rq)==1){

                $_SESSION["username"] = $username;
                $_SESSION["phonenumber"] = $phonenumber;
                header("location : index.php");
              }
            }
          } 
        }
      }
    }
  }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ChatRoom</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <h1>ChatRoom</h1>
  <div class="login">
    <h2>Login</h2>
    <p>This ChatRoom is the best example to demonstrate the concept of ChatBot and it's completely for begginners.</p>
    <form action="" method="post">

      <h3>UserName</h3>
      <input type="text" placeholder="Short Name" name="username">

      <h3>Mobile No:</h3>
      <input type="number" placeholder="with country code" min="1111111" max="999999999999999" name="phonenumber">

      <button>Login / Register</button>

    </form>
  </div>
</body>
</html>