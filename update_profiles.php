<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update Voter</title>
    <style>
        .container form .input-box select {
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

<body>
    <?php
    if (isset($_GET['updateprofile'])) {
        $id_voter = $_GET['updateprofile'];

        $query_selection = mysqli_query($connect, "SELECT * from voters WHERE id='$id_voter'");
        while ($profile_voter = mysqli_fetch_assoc($query_selection)) {
    ?>

            <div class="container" style="margin-top:200px; margin-left:auto; margin-right:auto">
                <div class="title">Update Profile</div>
                <div class="content">
                    <form action="update_profile_action.php" method="POST">
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">First Name</span>
                                <input type="text" required name="first_name_update" value="<?php echo $profile_voter['first_name']; ?>">
                            </div>
                            <div class="input-box">
                                <span class="details">Last Name</span>
                                <input type="text" required name="last_name_update" value="<?php echo $profile_voter['last_name']; ?>">
                            </div>
                            <div class="input-box">
                                <span class="details">Father Name</span>
                                <input type="text" required name="father_name_update" value="<?php echo $profile_voter['father_name']; ?>">
                            </div>
                            <div class="input-box">
                                <select name="gender_update">
                                    <option readonly selected value="<?php echo $profile_voter['gender']; ?>"> <?php echo $profile_voter['gender']; ?> </option>
                                    <option value="Male"> Male </option>
                                    <option value="Female"> Female </option>
                                    <option value="Prefer not to say"> Prefer not to say </option>
                                </select>
                            </div>
                            <div class="input-box">
                                <span class="details">CNIC Number</span>
                                <input type="text" required name="cnic_update" value="<?php echo $profile_voter['cnic']; ?>">
                            </div>
                            <div class="input-box">
                                <span class="details">City</span>
                                <input type="text" required name="city_update" value="<?php echo $profile_voter['city']; ?>">
                            </div>
                            <div class="input-box">
                                <span class="details">Email</span>
                                <input type="text" required name="email_update" value="<?php echo $profile_voter['email']; ?>">
                            </div>
                        </div>
                        <input type="text" hidden name="voterid" value="<?php echo $id_voter; ?>">
                        <div class="button">
                            <input type="submit" value="Update Profile" name="update_profile">
                        </div>
                    </form>
                </div>
            </div>


    <?php }
    } ?>