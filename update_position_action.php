<?php
require_once "header.php";
?>

<?php
if(isset($_POST['position_update'])){
	$positionids = $_POST["positionid"];
	$name_position=$_POST["position_name_update"];


    $position_update_query = "UPDATE `position` SET `position_name`='$name_position' WHERE `id`='$positionids'";
    $position_update_run = mysqli_query($connect , $position_update_query);

    if($position_update_run){
        $_SESSION['mesg'] = "Position updated into system!";
        place("position_list.php");
}
else{
    $_SESSION['warning_mesg'] = "Position Updation failed.";
    place("position_list.php");
}}
?>