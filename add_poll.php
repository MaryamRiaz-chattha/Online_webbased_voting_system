<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Add Position</title>
  <style>
    .wrapper form .field select {
      height: 100%;
      width: 100%;
      outline: none;
      font-size: 17px;
      padding-left: 20px;
      border: 1px solid lightgrey;
      border-radius: 25px;
      transition: all 0.3s ease;
    }
  </style>
</head>
<?php
require_once "header.php";

if(isset($_POST['poll_add'])){
	$name_poll=$_POST["poll_name"];
    $position_id=$_POST["id_position"];
    $candidate1_id=$_POST["candidate1"];
    $candidate2_id=$_POST["candidate2"];

                $poll_insert_query = "INSERT INTO `poll`(`poll_name`, `candidate1id`, `candidate2id`, `positionid`) VALUES ('$name_poll','$candidate1_id','$candidate2_id','$position_id')";
                $poll_insert_run = mysqli_query($connect , $poll_insert_query);
        
                if($poll_insert_run){
					$_SESSION['mesg'] = "Poll created into system!";
					place("admin_home.php");
		    }
            else{
                $_SESSION['warning_mesg'] = "Poll creation failed.";
                place("admin_home.php");
            }
}
?>

<body>

  <div class="wrapper" style="margin-top:200px; margin-left:auto; margin-right:auto">
    <div class="title">Add New Poll</div>
    <form action="#" method="POST">
      <div class="field">
        <input type="text" required name="poll_name" required>
        <label>Poll Name</label>
      </div>

      <div class="field">
        <select name="id_position">
          <option disabled selected> Select Position </option>
          <?php $position_select_query = mysqli_query($connect, "SELECT * from position");
          while ($position = mysqli_fetch_assoc($position_select_query)) { ?>
            <option value="<?php echo $position['id'] ?>"> <?php echo $position['position_name']; ?> </option>
          <?php } ?>
        </select>
      </div>


      <div class="field">
        <select name="candidate1">
          <option disabled selected> Select First Candidate </option>
          <?php $candiate_select_query = mysqli_query($connect, "SELECT * from candidates");
          while ($candiate = mysqli_fetch_assoc($candiate_select_query)) { ?>
            <option value="<?php echo $candiate['id'] ?>"> <?php echo $candiate['first_name'] . ' ' . $candiate['last_name'] ?> </option>
          <?php } ?>
        </select>
      </div>

      <div class="field">
        <select name="candidate2">
          <option disabled selected> Select Second Candidate </option>
          <?php $candiate_select_query = mysqli_query($connect, "SELECT * from candidates");
          while ($candiate = mysqli_fetch_assoc($candiate_select_query)) { ?>
            <option value="<?php echo $candiate['id'] ?>"> <?php echo $candiate['first_name'] . ' ' . $candiate['last_name'] ?> </option>
          <?php } ?>
        </select>
      </div>

      <br>

      <div class="field">
        <input type="submit" value="Add Poll" name="poll_add">
      </div>
    </form>

  </div>

</body>

</html>