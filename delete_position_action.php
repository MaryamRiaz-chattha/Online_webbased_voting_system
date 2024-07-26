<?php
require_once "header.php";

if(isset($_GET['delete'])) {
	$id_position = $_GET ['delete'];

    $query_deletion = mysqli_query($connect,"DELETE FROM `position` WHERE id='$id_position'");
   
    if($query_deletion){
        $_SESSION['warning_mesg'] = "Position name deleted from system!";
        place("position_list.php");
}
else{
    $_SESSION['warning_mesg'] = "Position deletion failed.";
    place("position_list.php");
}}
?>