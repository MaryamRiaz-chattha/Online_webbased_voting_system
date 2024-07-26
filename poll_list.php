<!DOCTYPE html>
<html lang="en">
<head>
  <title>List of Polls</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <?php
require_once "header.php";

$poll_select_query = "SELECT * FROM `poll`";
			$poll_query_run = mysqli_query($connect , $poll_select_query);
?>

<div class="container mt-5">
  <h2>List of Polls</h2>
  <table class="table">
    <thead class="table-dark">
      <tr>
      <th>Sr.#</th>
        <th>Poll name</th>
        <th>Position name</th>
        <th> First Candidate Name</th>
        <th> Second Candidate Name</th>
      </tr>
    </thead>
    <tbody>
        <?php $i = 0;
         while($poll= mysqli_fetch_assoc($poll_query_run)){
$position_id = $poll['positionid'];
$candidate1_id = $poll['candidate1id'];
$candidate2_id = $poll['candidate2id'];

$position_name = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * from position WHERE id = '$position_id'"));

$candidate_1_name = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * from candidates WHERE id = '$candidate1_id'"));

$candidate_2_name = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * from candidates WHERE id = '$candidate2_id'"));

$i++?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $poll['poll_name']; ?></td>
        <td><?php echo $position_name['position_name']; ?></td>
        <td><?php echo $candidate_1_name['first_name'] . ' ' . $candidate_1_name['last_name']; ?></td>
        <td><?php echo $candidate_2_name['first_name'] . ' ' . $candidate_2_name['last_name']; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>