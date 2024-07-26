<?php
require_once "header.php";
?>

<?php
if(isset($_POST['update_profile'])){
	$voterids = $_POST["voterid"];
	$name_first=$_POST["first_name_update"];
	$name_last=$_POST["last_name_update"];
    $name_father=$_POST["father_name_update"];
    $name_gender=$_POST["gender_update"];
    $number_cnic=$_POST["cnic_update"];
    $city=$_POST["city_update"];
    $email=$_POST["email_update"];
    $password=$_POST["pass_update"];

    $voter_update_query = "UPDATE `voters` SET `first_name`='$name_first',`last_name`='$name_last',`father_name`='$name_father',`gender`='$name_gender',`cnic`='$number_cnic',`city`='$city',`email`='$email',`pass`='$password' WHERE `id`='$voterids'";
    $voter_update_run = mysqli_query($connect , $voter_update_query);

    if($voter_update_run){
        $_SESSION['mesg'] = "Voter updated into system!";
        place("voter_home.php");
}
else{
    $_SESSION['warning_mesg'] = "Voter Updation failed.";
    place("voter_home.php");
}}
?>