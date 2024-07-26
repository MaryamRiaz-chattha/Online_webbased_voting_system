<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update Candidate</title>
</head>
<body>
<?php
require_once "header.php";

if(isset($_GET['updatecandidate'])) {
	$id_candidate = $_GET ['updatecandidate'];

    $query_selection = mysqli_query($connect,"SELECT * from candidates WHERE id='$id_candidate'");
    while($profile_candidate = mysqli_fetch_assoc($query_selection)){
?>

<div class="container"  style="margin-top:200px; margin-left:auto; margin-right:auto">
      <div class="title">Update Candidate</div>
      <div class="content">
        <form action="update_cadidate_action.php" method="POST" enctype="multipart/form-data">
          <div class="user-details">
            <div class="input-box">
              <span class="details">First Name</span>
              <input type="text" required name="first_name_update" value="<?php echo $profile_candidate['first_name']; ?>">
            </div>
            <div class="input-box">
              <span class="details">Last Name</span>
              <input type="text" required name="last_name_update" value="<?php echo $profile_candidate['last_name']; ?>">
            </div>
            <div class="input-box">
              <span class="details">Father Name</span>
              <input type="text" required name="father_name_update" value="<?php echo $profile_candidate['father_name']; ?>">
            </div>
            <div class="input-box">
              <span class="details">CNIC Number</span>
              <input type="text" required name="cnic_update" value="<?php echo $profile_candidate['cnic']; ?>">
            </div>
            <div class="input-box">
              <span class="details">Area</span>
              <input type="text" required name="area_update" value="<?php echo $profile_candidate['area']; ?>">
            </div>
            <div class="input-box">
              <span class="details">Symbol</span>
              <input type="text" required name="symbol_update" value="<?php echo $profile_candidate['symbol']; ?>">
            </div>
            <div class="input-box">
              <span class="details">Symbol Picture</span>
              <img name="oldsymbol_pic" src="<?php echo $profile_candidate['symbol_image']; ?>" height="100px" width="100px">
            </div>

            <div class="input-box">
              <span class="details">Symbol Picture</span>
              <input type="file" name="upsymbol_pic" accept="image/*" required>
            </div>
          </div>
          <input type="text" hidden name="candidateid" value="<?php echo $id_candidate; ?>">
          <div class="button">
          <input type="submit" value="Update Candidate" name="candidate_update">
        </div>
        </form>
      </div>
    </div>


<?php }}?>