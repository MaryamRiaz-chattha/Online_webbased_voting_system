<?php require 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="style.css">
      <title>Add Candidate</title>
</head>
<?php
require_once "header.php";

if(isset($_POST['candidate_add'])){
	$name_first=$_POST["first_name"];
	$name_last=$_POST["last_name"];
    $name_father=$_POST["father_name"];
    $number_cnic=$_POST["cnic_number"];
    $area=$_POST["area"];
    $symbol=$_POST["symbol"];

    $symbol_picture = $_FILES['symbol_pic']['name'];
    $tempname=$_FILES['symbol_pic']['tmp_name'];
    $folder="pictures/".$symbol_picture;
    move_uploaded_file($tempname,$folder);

    $candidate_check_query = "SELECT * FROM `candidates` WHERE `cnic` = '$number_cnic' AND area = '$area' ";
			$candidate_query_run = mysqli_query($connect , $candidate_check_query);
			
			if(mysqli_num_rows($candidate_query_run)==1){
					$_SESSION['mesg'] = "Candidate already exist in this area";
					place("add_candidate.php");
			}
            else{
                $candidate_insert_query = "INSERT INTO `candidates`(`first_name`, `last_name`, `father_name`, `cnic`, `area`, `symbol`, `symbol_image`) VALUES ('$name_first','$name_last','$name_father','$number_cnic','$area','$symbol','$folder')";
                $candidate_insert_run = mysqli_query($connect , $candidate_insert_query);
        
                if($candidate_insert_run){
					$_SESSION['mesg'] = "Candidate added into system!";
					place("admin_home.php");
		    }
            else{
                $_SESSION['warning_mesg'] = "Candidate addition failed.";
                place("add_candidate.php");
            }
}}
?>
<body>

  <div class="container"  style="margin-top:200px; margin-left:auto; margin-right:auto">
      <div class="title">Add New Candidate</div>
      <div class="content">
        <form action="#" method="POST" enctype="multipart/form-data">
          <div class="user-details">
            <div class="input-box">
              <span class="details">First Name</span>
              <input type="text" required placeholder="Enter first name" name="first_name">
            </div>
            <div class="input-box">
              <span class="details">Last Name</span>
              <input type="text" required placeholder="Enter last name" name="last_name">
            </div>
            <div class="input-box">
              <span class="details">Father Name</span>
              <input type="text" required placeholder="Enter father name" name="father_name">
            </div>
            <div class="input-box">
              <span class="details">CNIC Number</span>
              <input type="text" required placeholder="Enter cnic number" name="cnic_number">
            </div>
            <div class="input-box">
              <span class="details">Area</span>
              <input type="text" required placeholder="Enter area name" name="area">
            </div>
            <div class="input-box">
              <span class="details">Symbol</span>
              <input type="text" required placeholder="Enter symbol name" name="symbol">
            </div>
            <div class="input-box">
              <span class="details">Symbol Picture</span>
              <input type="file" name="symbol_pic" accept="image/*" required>
            </div>
          </div>
          <div class="button">
          <input type="submit" value="Add Candidate" name="candidate_add">
        </div>
        </form>
      </div>
    </div>
</body>
</html>


