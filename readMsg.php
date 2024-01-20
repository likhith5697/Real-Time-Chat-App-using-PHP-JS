<?php
session_start();
include "db.php";

$q = "SELECT * FROM `message`";
if ($rq = mysqli_query($db, $q)) {

  if (mysqli_num_rows($rq) > 0) {

    while ($data = mysqli_fetch_assoc($rq)) {
      if($data["phonenumber"]==$_SESSION["phonenumber"]){
        ?>
  <p class="sender">
    <span><?= $data["phonenumber"] ?></span>
    <?= $data["message"] ?>
</p>

<?php
      }else{
?>
  <p>
    <span><?= $data["phonenumber"] ?></span>
    <?= $data["message"] ?>
</p>

<?php
      }
    }
  } else {

    echo "<h3> Chat is empty at this moment!!</h3>";
  }
}




?>