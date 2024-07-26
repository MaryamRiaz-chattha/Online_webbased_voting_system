<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
    <title>Update Position</title>
</head>
<body>
<?php
require_once "header.php";

if(isset($_GET['updateposition'])) {
	$id_position = $_GET ['updateposition'];

    $query_selection = mysqli_query($connect,"SELECT * from position WHERE id='$id_position'");
    while($position = mysqli_fetch_assoc($query_selection)){
?>
  <div class="wrapper" style="margin-top:200px; margin-left:auto; margin-right:auto">
    <div class="title">Update Position</div>
    <form action="update_position_action.php" method="POST">
      <div class="field">
        <input type="text" required name="position_name_update" value="<?php echo $position['position_name']; ?>">
        <label>Position Name</label>
      </div>
	            <input hidden name="positionid" value="<?php echo $id_position; ?>">
      <div class="field">
        <input type="submit" value="Update Position" name="position_update">
      </div>
    </form>

</div>

<?php }}?>