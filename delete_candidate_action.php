<?php
require_once "header.php";

if(isset($_GET['delete'])) {
	$id_candidate = $_GET ['delete'];

    $query_deletion = mysqli_query($connect,"DELETE FROM `candidates` WHERE id='$id_candidate'");
   
    if($query_deletion){
        $_SESSION['warning_mesg'] = "Candidate name deleted from system!";
        place("candidates_list.php");
}
else{
    $_SESSION['warning_mesg'] = "Candidate deletion failed.";
    place("candidates_list.php");
}}
?>