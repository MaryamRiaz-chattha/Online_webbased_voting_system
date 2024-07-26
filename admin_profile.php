<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Admin Profile</title>
</head>

<body>
  <?php
  $query_select = mysqli_query($connect, "SELECT * from admin WHERE id='$admin'");
  while ($profile_admin = mysqli_fetch_assoc($query_select)) {
  ?>

    <div class="container"  style="margin-top:200px; margin-left:auto; margin-right:auto">
      <div class="title">Admin Profile</div>
      <div class="content">
        <form>
          <div class="user-details">
            <div class="input-box">
              <span class="details">First Name</span>
              <input type="text" value="<?php echo $profile_admin['first_name']; ?>" readonly>
            </div>
            <div class="input-box">
              <span class="details">Last Name</span>
              <input type="text" value="<?php echo $profile_admin['last_name']; ?>" readonly>
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="text" value="<?php echo $profile_admin['email']; ?>" readonly>
            </div>
            <div class="input-box">
              <span class="details">Password</span>
              <input type="text" value="<?php echo $profile_admin['pass']; ?>" readonly>
            </div>
          </div>
        </form>
      </div>
    </div>
    </div>
  <?php } ?>
</body>

</html>