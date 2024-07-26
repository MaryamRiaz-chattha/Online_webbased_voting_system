<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Voter Home</title>
</head>

<body>
  <?php

  $query_select = mysqli_query($connect, "SELECT * from voters WHERE id='$voter'");
  while ($profile_voter = mysqli_fetch_assoc($query_select)) {
  ?>

    <div style="font-size:60px;margin-top:150px;font-family:Algerian;"class="container"  style="margin-top:50px; margin-left:auto; margin-right:auto">
      <div class="title">WELCOME VOTER</div>
      <div class="content">
      </div>
    </div>
    </div>
  <?php } ?>
</body>

</html>