<!DOCTYPE html>
<html lang="en">
<head>
  <title>List of Positions</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
require_once "header.php";

$position_select_query = "SELECT * FROM `position`";
			$position_query_run = mysqli_query($connect , $position_select_query);
?>

<div class="container mt-5">
  <h2>List of Positions</h2>
  <table class="table">
    <thead class="table-dark">
      <tr>
        <th>Sr.#</th>
        <th>Postion Name</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        <?php $i = 0;
         while($positions= mysqli_fetch_assoc($position_query_run)){
            $i++; ?>
      <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $positions['position_name']; ?></td>
        <td><a type="submit" class="btn btn-info btn-lg" href="update_position.php?updateposition=<?php echo $positions['id']; ?>">Edit</a></td>
        <td><a type="submit" class="btn btn-danger btn-lg" href="delete_position_action.php?delete=<?php echo $positions['id']; ?>">Delete</a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>