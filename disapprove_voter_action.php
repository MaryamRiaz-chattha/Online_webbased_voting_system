<?php
require_once "conectDB.php";
include('alert_mesg.php');


if(isset($_GET['disapproveprofile'])) {
	$id_voter = $_GET ['disapproveprofile'];

    $query_approve = mysqli_query($connect,"UPDATE `voters` SET `voter_status`='disapprove' WHERE `id`='$id_voter'");
   
    if($query_approve){
        $_SESSION['warning_mesg'] = "Voter disapproved into the system!";
        place("view_profiles_list.php");
}
else{
    $_SESSION['warning_mesg'] = "Voter disapproved failed.";
    place("view_profiles_list.php");
}}
?>