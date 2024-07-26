<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
<title>Registration</title>
</head>
<?php
require_once "header.php";

if(isset($_POST['signup'])){
	$name_first=$_POST["first_name"];
	$name_last=$_POST["last_name"];
    $name_father=$_POST["father_name"];
    $gender_select=$_POST["gender"];
    $number_cnic=$_POST["cnic_number"];
    $city=$_POST["city"];
    $email=$_POST["email"];
    $pass=$_POST["password"];
    $confirmpass=$_POST["confirmpass"];

    if($pass != $confirmpass){
        $_SESSION['mesg'] = "Password not matched!";
        place("signup.php");
    }
else{
    $voter_check_query = "SELECT * FROM `voters` WHERE `cnic` = '$number_cnic' OR email = '$email'";
			$voter_query_run = mysqli_query($connect , $voter_check_query);
			
			if(mysqli_num_rows($voter_query_run)==1){
					$_SESSION['mesg'] = "Voter already register";
					place("signup.php");
			}
            else{ 

                $voter_id = "v".strtolower(substr($name_first, 0, 1) . substr($name_last, 0, 1) . substr($number_cnic, -4));


                $voter_insert_query = "INSERT INTO `voters`(`first_name`, `last_name`, `father_name`, `gender`, `cnic`, `city`, `email`, `pass`, `votercast_id`, `voter_status`) VALUES ('$name_first','$name_last','$name_father','$gender_select','$number_cnic','$city','$email','$pass','$voter_id','pending')";
                $voter_insert_run = mysqli_query($connect , $voter_insert_query);
        
                if($voter_insert_run){
					$_SESSION['mesg'] = "Voter added into system!";
					place("index.php");
		    }
            else{
                $_SESSION['warning_mesg'] = "Voter addition failed.";
                place("signup.php");
            }
}} }
?>
<body>
  
  <div class="container" style="margin-top:200px;">
    <div class="title">Registration</div>
    <div class="content">
      <form action="#" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" placeholder="Enter your first name" name="first_name" required>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" placeholder="Enter your last name" name="last_name" required>
          </div>
          <div class="input-box">
            <span class="details">Father Name</span>
            <input type="text" placeholder="Enter your father name" name="father_name" required>
          </div>
          <div class="input-box">
            <span class="details">CNIC</span>
            <input type="text" placeholder="Enter your CNIC number" name="cnic_number" required>
          </div>
          <div class="input-box">
            <span class="details">City</span>
            <input type="text" placeholder="Enter your number" name="city" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" placeholder="Enter your password" name="password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password" name="confirmpass" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="Male">
          <input type="radio" name="gender" id="dot-2" value="Female">
          <input type="radio" name="gender" id="dot-3" value="Prefer not to say">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register" name="signup">
        </div>
        <div class="signup-link">Already a memeber click <a href="login.php">Login now</a></div>
      </form>
    </div>
  </div>


</body>
</html>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>