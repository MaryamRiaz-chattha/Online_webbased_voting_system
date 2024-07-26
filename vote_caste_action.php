<?php
require_once "header.php";
?>

<?php
if(isset($_POST['give_vote'])){
    $voted_candidate = $_POST["candidate"];
	$pollsids = $_POST["idpoll"];
	$voterid=$_POST["idvoter"];

$check_Vote_query = mysqli_query($connect,"SELECT * FROM votes WHERE pollid = '$pollsids' AND voterid = '$voterid'");
if(mysqli_num_rows($check_Vote_query) >= 1){
    $_SESSION['warning_mesg'] = "Vote already casted.";
    place("voter_home.php");
}
else{
    //insert vote query
    $insert_vote_query = mysqli_query($connect,"INSERT INTO `votes`(`candidateid`, `pollid`, `voterid`) VALUES ('$voted_candidate','$pollsids','$voterid')");
    
    if($insert_vote_query){
        $_SESSION['mesg'] = "Vote casted!";
        place("voter_home.php");
}
else{
    $_SESSION['warning_mesg'] = "Vote casted failed.";
    place("voter_home.php");
}   } } ?>