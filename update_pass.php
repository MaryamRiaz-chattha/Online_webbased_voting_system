<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update Password</title>
</head>
<body>
<?php
require_once "header.php";

if(isset($_GET['updatepass'])) {
	$id_admin = $_GET['updatepass'];

    $query_selection = mysqli_query($connect,"SELECT * from admin WHERE id='$id_admin'");
    while($profile_admin = mysqli_fetch_assoc($query_selection)){
?>
<div class="wrapper" style="margin-top:200px; margin-left:auto; margin-right:auto">
    <div class="title">Update Password</div>
    <form action="update_pass_action.php" method="POST">
      <div class="field">
        <input type="text" required name="paswrd">
        <label>New Password</label>
      </div>
      <div class="field">
        <input type="text" required name="rtpaswrd">
        <label>Retype Password</label>
      </div>
      <input hidden name="adminid" value="<?php echo $id_admin; ?>">
      <div class="field">
        <input type="submit" value="Update Password" name="updatepaswrd">
      </div>
    </form>
  </div>

<?php }}?>