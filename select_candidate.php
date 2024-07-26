<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Candidate</title>

    <style>
        .field select {
            height: 100%;
            width: 200px;
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

    <div class="container my-4">
        <div class="row featurette d-flex justify-content-center align-items-center">
            <div class="col-md-7">
                <h2 class="featurette-heading">Candidates <span class="text-muted"></span></h2>
                <p class="lead">Here is the list of candidate. If you want to vote any candidate then choose candidate button</p>
            </div>
            <div class="col-md-5">
                <img class="img-fluid" src="34.png" width="200" height="200" alt="">

            </div>
        </div>

        <form method="POST" action="vote_caste_action.php">
            <?php if (isset($_POST['chose_position'])) {
                $position = $_POST['position'];

                $select_poll = mysqli_query($connect, "SELECT * FROM poll WHERE positionid = '$position'");
                while ($poll = mysqli_fetch_assoc($select_poll)) {
                    $pollids = $poll['id'];
                    $poll_names = $poll['poll_name'];
                    $candidates1id = $poll['candidate1id'];
                    $candidates2id = $poll['candidate2id'];

                    echo "<h2 class='featurette-heading'>$poll_names <span class='text-muted'></span></h2>";

                    $select_candidate1_query = mysqli_query($connect, "SELECT * from candidates WHERE id = '$candidates1id'");

                    while ($candidate1 = mysqli_fetch_assoc($select_candidate1_query)) { ?>

                        <div class="gender-details">
                            <input type="radio" name="candidate" id="dot-1" value="<?php echo $candidate1['id']; ?>">
                            <span class="gender-title"> <?php echo $candidate1['first_name'] . '' . $candidate1['last_name'] ?> </span>
                            <div class="category">
                                <label for="dot-1">
                                    <span class="dot one"></span>
                                    <img src="<?php echo $candidate1['symbol_image']; ?>" height="100px" width="100px">
                                    <span class="gender"> </span>
                                </label>
                            </div>
                        </div>
                    <?php }
                    $select_candidate2_query = mysqli_query($connect, "SELECT * from candidates WHERE id = '$candidates2id'");

                    while ($candidate2 = mysqli_fetch_assoc($select_candidate2_query)) { ?>

                        <div class="gender-details">
                            <input type="radio" name="candidate" id="dot-1" value="<?php echo $candidate2['id']; ?>">
                            <span class="gender-title"> <?php echo $candidate2['first_name'] . '' . $candidate2['last_name'] ?> </span>
                            <div class="category">
                                <label for="dot-1">
                                    <span class="dot one"></span>
                                    <img src="<?php echo $candidate2['symbol_image']; ?>" height="100px" width="100px">
                                    <span class="gender"> </span>
                                </label>
                            </div>
                        </div>
                    <?php } ?>
                    <br>
                    <input hidden value="<?php echo $pollids ?>" name="idpoll">
                    <input hidden value="<?php echo $voter ?>" name="idvoter">
                    <div class="col-sm-offset-2 col-sm-8">
                        <button type="submit" class="btn btn-primary" name="give_vote">Give Vote</button>
                    </div>

            <?php          }
            } ?>

        </form>
    </div>

    <footer class="text-center text-lg-start text-white" style="background-color: #050505; margin-top: 100px">

        <!-- Grid container -->
        <div class="container p-4 ">
            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-2 ">
                        <img src="O.png" width="200" height="200">


                    </div>
                    <!-- Grid column -->

                    <hr class="w-200 clearfix d-md-none" />

                    <!-- Grid column -->
                    <div class="col-md-15 col-lg-3 col-xl-3 mx-auto mt-3 ">
                        <h3>
                            Quick Links </h3>
                        <div class="menu-main-menu-container ">
                            <H5>
                                <ul id="menu-main-menu-1" class="menu">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/index.html">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/about.html">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/Election.html">Election</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/Profile.html">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/contact.html">Contact Us</a>
                                    </li>

                                </ul>
                            </H5>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <hr class="w-200 clearfix mt-2" />

                    <!-- Grid column -->
                    <hr class="w-200 clearfix d-md-none" />

                    <!-- Grid column -->
                    <hr class="w-100 clearfix d-md-none" />

                    <!-- Grid column -->
                    <hr class="w-100 clearfix d-md-none" />

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                        <p><i class="fas fa-home mr-3"></i> Wazirabad, Pakistan.</p>
                        <p><i class="fas fa-envelope mr-3"></i> MaryamRiaz@gmail.com</p>
                        <p><i class="fas fa-phone mr-3"></i> +92 333 0000111</p>
                        <p><i class="fas fa-print mr-3"></i> +92 333 0000222</p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>

                        <!-- Facebook -->
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

                        <!-- Twitter -->
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!" role="button"><i class="fab fa-twitter"></i></a>



                        <!-- Instagram -->
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="#!" role="button"><i class="fab fa-instagram"></i></a>



                        <!--Grid row-->
            </section>
            <!-- Section: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(65, 65, 65, 0.2)">
            © 2023 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">OnlineVotingSystem.com</a>
        </div>
        <!-- Copyright -->
    </footer>

</body>

</html>