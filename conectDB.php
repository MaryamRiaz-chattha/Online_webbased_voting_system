<?php
session_start();
$connect  = mysqli_connect("localhost", "root", "", "finaldata_wbo_voting_system");

if ($connect != true) {
	$_SESSION['warning_mesg'] = "Error in making connection with database!";
}

  ?>