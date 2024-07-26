<!DOCTYPE html>
<html lang="en">
<head>
  <title>List of Candidates</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php
require_once "header.php";

$candidate_select_query = "SELECT * FROM `candidates`";
			$candidate_query_run = mysqli_query($connect , $candidate_select_query);
?>

<div class="container mt-5">
  <h2>List of Candidates</h2>
  <table class="table">
    <thead class="table-dark">
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Fathername</th>
        <th>CNIC#</th>
        <th>Area</th>
        <th>Symbol</th>
        <th>Symbol Image</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      
        <?php while($candidates= mysqli_fetch_assoc($candidate_query_run)){?>
      <tr>
        <td><?php echo $candidates['first_name']; ?></td>
        <td><?php echo $candidates['last_name']; ?></td>
        <td><?php echo $candidates['father_name']; ?></td>
        <td><?php echo $candidates['cnic']; ?></td>
        <td><?php echo $candidates['area']; ?></td>
        <td><?php echo $candidates['symbol']; ?></td>
        <td><img src="<?php echo $candidates['symbol_image']; ?>" height="100px" width="100px"> </td>
        <td><a type="submit" class="btn btn-info btn-lg" href="update_candidate.php?updatecandidate=<?php echo $candidates['id']; ?>">Edit</a></td>
        <td><a type="submit" class="btn btn-danger btn-lg" href="delete_candidate_action.php?delete=<?php echo $candidates['id']; ?>">Delete</a></td>
      
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>