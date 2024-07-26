<!DOCTYPE html>
<html lang="en">

<head>
    <title>Poll Result</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    require_once "header.php";

    // fetch data from votes table
    $check_votes_query = mysqli_query($connect, "SELECT DISTINCT pollid FROM votes");
    while ($votes = mysqli_fetch_assoc($check_votes_query)) {
        $pollid = $votes['pollid'];

        //fetch data from poll table
        $select_poll_query = mysqli_query($connect, "SELECT * FROM poll WHERE id = '$pollid'");
        while ($polls = mysqli_fetch_assoc($select_poll_query)) {
            $positionids = $polls['positionid'];

            //fetch candidate id from votes table
            $candidate_query = "SELECT DISTINCT candidateid FROM votes WHERE pollid = '$pollid'";
            $result = mysqli_query($connect, $candidate_query);

            //1st candidate id
            if ($row = mysqli_fetch_assoc($result)) {
                $candidate1 = $row['candidateid'];
            }

            //counting 1st candidate votes
            $candidate_vote_query = "SELECT candidateid FROM votes WHERE candidateid = '$candidate1'";
            $result2 = mysqli_query($connect, $candidate_vote_query);
            $vote1 = 0;
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $vote1++;
            }

            //2nd candidate id
            if ($row = mysqli_fetch_assoc($result)) {
                $candidate2 = $row['candidateid'];
            }

            //counting 2nd candidate votes
            $candidate2_vote_query = "SELECT candidateid FROM votes WHERE candidateid = '$candidate2'";
            $result3 = mysqli_query($connect, $candidate2_vote_query);
            $vote2 = 0;
            while ($row2 = mysqli_fetch_assoc($result3)) {
                $vote2++;
            }  ?>

            <!-- print all data in table -->
            <div class="container mt-5">
                <h2> <?php echo  $poll_names = $polls['poll_name']; ?> Result</h2>
                <table class="table" style="width:1100px; text-align:center">
                    <thead class="table-dark">
                        <tr>
                            <th>Sr.#</th>
                            <th>Position Name</th>
                            <th>1st Candidate Name</th>
                            <th>1st Candidate Votes</th>
                            <th>2nd Candidate Name</th>
                            <th>2nd Candidate Votes</th>
                            <th>Total Votes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        $i++; ?>
                        <tr>
                            <!-- print serial numbers -->
                            <td><?php echo $i; ?></td>

                            <!-- print position name -->
                            <td><?php
                                $position_select_query = mysqli_query($connect, "SELECT * FROM `position` WHERE id = '$positionids'");
                                while ($positions = mysqli_fetch_assoc($position_select_query)) {
                                    echo $positions['position_name'];
                                } ?></td>

                            <!-- print 1st candidate name -->
                            <td><?php $candidate1_select_query = mysqli_query($connect, "SELECT * FROM `candidates` WHERE id = '$candidate1'");
                                while ($candidate1_data = mysqli_fetch_assoc($candidate1_select_query)) {
                                    echo $candidate1_data['first_name'] . ' ' . $candidate1_data['last_name'];
                                } ?></td>

                            <!-- print 1st candidate votes -->
                            <td><?php echo $vote1;  ?></td>

                            <!-- print 2nd candidate name -->
                            <td><?php $candidate2_select_query = mysqli_query($connect, "SELECT * FROM `candidates` WHERE id = '$candidate2'");
                                while ($candidate2_data = mysqli_fetch_assoc($candidate2_select_query)) {
                                    echo $candidate2_data['first_name'] . ' ' . $candidate2_data['last_name'];
                                } ?></td>

                            <!-- print 2nd candidate votes -->
                            <td><?php echo $vote2;  ?></td>

                            <!-- print total votes casted in this poll -->
                            <td style="background-color: red; font-size: 20pt; color:white;"><?php echo $vote1 + $vote2; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
</body>
</html>