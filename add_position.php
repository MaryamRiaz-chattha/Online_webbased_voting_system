<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="style.css">
      <title>Add Position</title>
</head>
<?php
require_once "header.php";

if(isset($_POST['position_add'])){
	$name_position=$_POST["position_name"];

    $position_check_query = "SELECT * FROM `position` WHERE `position_name` = '$name_position'";
			$position_query_run = mysqli_query($connect , $position_check_query);
			
			if(mysqli_num_rows($position_query_run)==1){
					$_SESSION['mesg'] = "Position Name already exist";
					place("add_position.php");
			}
            else{
                $position_insert_query = "INSERT INTO `position`(`position_name`) VALUES ('$name_position')";
                $position_insert_run = mysqli_query($connect , $position_insert_query);
        
                if($position_insert_run){
					$_SESSION['mesg'] = "Position added into system!";
					place("admin_home.php");
		    }
            else{
                $_SESSION['warning_mesg'] = "Position addition failed.";
                place("add_candidate.php");
            }
}}
?>
<body>

<div class="wrapper" style="margin-top:200px; margin-left:auto; margin-right:auto">
    <div class="title">Add New Position</div>
    <form action="#" method="POST">
      <div class="field">
        <input type="text" required name="position_name" required>
        <label>Position Name</label>
      </div>
      <div class="field">
        <input type="submit" value="Add Position" name="position_add"><br>
        
      </div>
      <div class="field">
      
        <input type="submit" value="ABCD" name="ABCD">
      </div>
      
    </form>

</div>

</body>
</html>


