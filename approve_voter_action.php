<?php
require_once "conectDB.php";
include('alert_mesg.php');


if(isset($_GET['approveprofile'])) {
	$id_voter = $_GET ['approveprofile'];

    $query_approve = mysqli_query($connect,"UPDATE `voters` SET `voter_status`='approve' WHERE `id`='$id_voter'");
   
    if($query_approve){
        $_SESSION['mesg'] = "Voter approved into the system!";
        place("view_profiles_list.php");
}
else{
    $_SESSION['warning_mesg'] = "Voter approved failed.";
    place("view_profiles_list.php");
}}
?>