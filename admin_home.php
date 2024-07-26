<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Admin Home</title>
</head>

<body>
  <?php

  $query_select = mysqli_query($connect, "SELECT * from admin WHERE id='$admin'");
  while ($profile_admin = mysqli_fetch_assoc($query_select)) {
  ?>

    <div class="container"  style="margin-top:50px; margin-left:auto; margin-right:auto;">
      <div style="font-family:Algerian;"class="title">WELCOME ADMIN</div>
      <div class="content">
      </div>
    </div>
    </div>
  <?php } ?>
</body>

</html>