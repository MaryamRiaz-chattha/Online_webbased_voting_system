<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Position</title>

    <style>
    /* html,body{
    height: 100%;
    width: 100%;
    place-items: center;
    
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
  }*/
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
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Position</h2>
                <p class="lead">Welcome dear voter, here is list of positions. You can choose position by clicking on drop down menu ,then click on choose position button and choose your desired position </p>
            </div>
            <div class="col-md-5 order-md-1">
               <img class="img-fluid" src="14.png" width="200" height="200" alt="">
            </div>
        </div>

        <br>
        <form method="POST" action="select_candidate.php">
        <div class="field">
        <select name="position">
          <option disabled selected> Select Position First </option>
          <?php $position_select_query = mysqli_query($connect, "SELECT * from position");
          while ($position = mysqli_fetch_assoc($position_select_query)) { ?>
            <option value="<?php echo $position['id'] ?>"> <?php echo $position['position_name']; ?> </option>
          <?php } ?>
        </select>
      </div>
<br>
        <div class="field">
        <input type="submit" value="Choose Position" name="chose_position" style="background-color: #55acee;">
        </div>
        </form>
    </div>
    </div>


    <footer class="text-center text-lg-start text-white" style="background-color: #050505; margin-top: 382px">

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