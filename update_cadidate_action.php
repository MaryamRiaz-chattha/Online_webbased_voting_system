<?php
require_once "header.php";
?>

<?php
if(isset($_POST['candidate_update'])){
	$candidateids = $_POST["candidateid"];
	$name_first=$_POST["first_name_update"];
	$name_last=$_POST["last_name_update"];
    $name_father=$_POST["father_name_update"];
    $number_cnic=$_POST["cnic_update"];
    $area=$_POST["area_update"];
    $symbol=$_POST["symbol_update"];

    $folder = '';
    if ($_FILES['upsymbol_pic']['error'] === UPLOAD_ERR_NO_FILE) {
        $folder = $_POST["oldsymbol_pic"];
    } elseif ($_FILES['upsymbol_pic']['error'] === UPLOAD_ERR_OK) {
        $symbolpic = $_FILES['upsymbol_pic']['name'];
        $tempname = $_FILES['upsymbol_pic']['tmp_name'];
        $folder = "pictures/" . $symbolpic;
        move_uploaded_file($tempname, $folder);
    }


    $candidate_update_query = "UPDATE `candidates` SET `first_name`='$name_first',`last_name`='$name_last',`father_name`='$name_father',`cnic`='$number_cnic',`area`='$area',`symbol`='$symbol',`symbol_image`='$folder' WHERE `id`='$candidateids'";
    $candidate_update_run = mysqli_query($connect , $candidate_update_query);

    if($candidate_update_run){
        $_SESSION['mesg'] = "Candidate updated into system!";
        place("candidates_list.php");
}
else{
    $_SESSION['warning_mesg'] = "Candidate Updation failed.";
    place("candidates_list.php");
}}
?>