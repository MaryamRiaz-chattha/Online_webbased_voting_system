<?php
require_once "conectDB.php";
include('alert_mesg.php');

if(isset($_POST['btn-login'])){
	$voteid=$_POST["voteid"];
    $email=$_POST["email"];
	$pswrd=$_POST["pswrd"];

    $admin_check_query = "SELECT * FROM `admin` WHERE email = '$email' AND pass = '$pswrd' AND votercast_id='$voteid'";
			$admin_query_run = mysqli_query($connect , $admin_check_query);
			$admin_data = mysqli_fetch_assoc($admin_query_run);

    
            $voter_check_query = "SELECT * FROM `voters` WHERE email = '$email' AND pass = '$pswrd' AND votercast_id='$voteid' AND voter_status='approve'";
			$voter_query_run = mysqli_query($connect , $voter_check_query);
			$voter_data = mysqli_fetch_assoc($voter_query_run);

			
			if(mysqli_num_rows($admin_query_run)==1){
					$_SESSION['mesg'] = "Welcome Admin to Web Based Online Voting System";
					$_SESSION['aid'] = $admin_data['id'];
					place("admin_home.php");
			}

            elseif(mysqli_num_rows($voter_query_run)==1){
                $_SESSION['mesg'] = "Welcome Voter to Web Based Online Voting System";
                $_SESSION['vid'] = $voter_data['id'];
                place("voter_home.php");
            }
            elseif(mysqli_num_rows($voter_query_run)==0){
                $_SESSION['warning_mesg'] = "Voter in pending or disapproved by admin";
                place("index.php");
            }
            else{
                $_SESSION['warning_mesg'] = "No User Find with this Email";
                place("index.php");
            }

}
?>