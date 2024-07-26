<?php include 'header.php'; ?>

<?php
if(isset($_POST['updatepaswrd'])){
	$adminids = $_POST["adminid"];
    $pswrd=$_POST["paswrd"];
	$rtpswrd=$_POST["rtpaswrd"];

    if($pswrd != $rtpswrd){
        $_SESSION['mesg'] = "Both passwords are not same";
        place("update_pass.php?updatepass=$adminid");
}
else {
    $admin_update_pass = "UPDATE `admin` SET `pass`='$pswrd' WHERE id ='$adminids'";
    $admin_query_run = mysqli_query($connect , $admin_update_pass);

    if($admin_query_run){
            $_SESSION['mesg'] = "Admin Password changed!";
            place("admin_home.php");
    }
    else{
        $_SESSION['warning_mesg'] = "Password not changed!";
        place("update_pass.php?updatepass=$adminid");
    }} }
?>