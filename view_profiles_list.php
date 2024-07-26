<!DOCTYPE html>
<html lang="en">
<head>
  <title>List of Profiles</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="view_profile_list.css">

</head>
<body>
  <?php
require_once "header.php";

$voter_select_query = "SELECT * FROM `voters`";
			$voter_query_run = mysqli_query($connect , $voter_select_query);
?>

<div class="container2 mt-5" style="margin-left: 50px;">
  <h2>List of Profiles</h2>
  <table class="table">
    <thead class="table-dark">
      <tr>
      
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Fathername</th>
        <th>Gender</th>
        <th>CNIC#</th>
        <th>City</th>
        <th>Email</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Approve</th>
        <th>Disapprove</th>
      </tr>
    </thead>
    <tbody>
        <?php while($voters= mysqli_fetch_assoc($voter_query_run)){?>
      <tr>
        <td><?php echo $voters['first_name']; ?></td>
        <td><?php echo $voters['last_name']; ?></td>
        <td><?php echo $voters['father_name']; ?></td>
        <td><?php echo $voters['gender']; ?></td>
        <td><?php echo $voters['cnic']; ?></td>
        <td><?php echo $voters['city']; ?></td>
        <td><?php echo $voters['email']; ?></td>
        <td><?php echo $voters['voter_status']; ?></td>
        <td><a type="submit" class="btn btn-info btn-lg" href="update_profiles.php?updateprofile=<?php echo $voters['id']; ?>">Edit</a></td>
        <td><a type="submit" class="btn btn-info btn-lg" href="approve_voter_action.php?approveprofile=<?php echo $voters['id']; ?>">Approve</a></td>
        <td><a type="submit" class="btn btn-info btn-lg" href="disapprove_voter_action.php?disapproveprofile=<?php echo $voters['id']; ?>">Disapprove</a></td>
        
        
      
      
      
      
      
      </tr>
      
      <?php } ?>
    </tbody>
    
  </table>
</div>

</body>
</html>