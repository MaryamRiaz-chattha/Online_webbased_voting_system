<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Voter Profile</title>
</head>
<body>

<?php
  $query_select = mysqli_query($connect, "SELECT * from voters WHERE id='$voter'");
  while ($profile_voter = mysqli_fetch_assoc($query_select)) {
    $id_voter = $profile_voter['id'];
  ?>

<div class="container"  style="margin-top:200px; margin-left:auto; margin-right:auto">
      <div class="title">Voter Profile</div>
      <div class="content">
        <form action="update_voter_profile.php" method="POST">
          <div class="user-details">
            <div class="input-box">
              <span class="details">First Name</span>
              <input type="text" readonly value="<?php echo $profile_voter['first_name']; ?>">
            </div>
            <div class="input-box">
              <span class="details">Last Name</span>
              <input type="text" readonly value="<?php echo $profile_voter['last_name']; ?>">
            </div>
            <div class="input-box">
              <span class="details">Father Name</span>
              <input type="text" readonly value="<?php echo $profile_voter['father_name']; ?>">
            </div>
            <div class="input-box">
              <span class="details">Gender</span>
              <input type="text" readonly value="<?php echo $profile_voter['gender']; ?>">
            </div>
            <div class="input-box">
              <span class="details">CNIC Number</span>
              <input type="text" readonly value="<?php echo $profile_voter['cnic']; ?>">
            </div>
            <div class="input-box">
              <span class="details">City</span>
              <input type="text" readonly value="<?php echo $profile_voter['city']; ?>">
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="text" readonly value="<?php echo $profile_voter['email']; ?>">
            </div>
            <div class="input-box">
              <span class="details">Password</span>
              <input type="text" readonly value="<?php echo $profile_voter['pass']; ?>">
            </div>
          </div>
          <input type="text" hidden name="voterid" value="<?php echo $id_voter; ?>">
          <div class="button">
          <input type="submit" value="Update Profile" name="voter_update">
        </div>
        </form>
      </div>
    </div>

    <?php } ?>
    </body>
</html>