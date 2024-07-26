<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Login</title>

</head>

<body>

  <div class="wrapper" style="margin-top:200px; margin-left:auto; margin-right:auto">
    <div class="title">Login Form</div>
    <form action="login_action.php" method="POST">
      <div class="field">
        <input type="text" required name="voteid">
        <label>User(Admin/Voter) ID</label>
      </div>
      
      <div class="field">
        <input type="text" required name="email">
        <label>Email Address</label>
      </div>
      <div class="field">
        <input type="password" required name="pswrd">
        <label>Password</label>
      </div>
      
          
      <div class="field">
        <input type="submit" value="Login" name="btn-login">
      </div>
      <div class="signup-link">Not a member? <a href="signup.php">Signup now</a></div>
    </form>
  </div>

</body>

</html>