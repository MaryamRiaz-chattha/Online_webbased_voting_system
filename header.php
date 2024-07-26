<?php require_once "conectDB.php";
include('alert_mesg.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/d41efac86e.js" crossorigin="anonymous"></script>
</head>
<style>
body {
    font-family: "Times New Roman", Times, serif;
  }   
</style>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
      <img src="O.png" width="50" height="50" class="d-inline-block align-top" alt="">
      
    </a>

    <a class="navbar-brand"> ONLINE VOTING SYSTEM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <?php

        if (isset($_SESSION['aid'])) {
          $admin = $_SESSION['aid'];
          $query1 = mysqli_query($connect, "SELECT * from admin WHERE id='$admin'");
          $profile_admin = mysqli_fetch_assoc($query1);
          $admin_id = $profile_admin['id'];
          $name1 = $profile_admin['first_name'] . ' ' . $profile_admin['last_name'];
          echo "<li class='nav-item'> <a class='nav-link active' href='admin_home.php'><i class='fa-solid fa-house'></i>Home</a> </li>
          <li class='nav-item'> <a class='nav-link active' href='view_profiles_list.php'>Profiles</a> </li>

  <div class='collapse navbar-collapse'>
  <ul class='navbar-nav ml-auto'>
      <li class='nav-item dropdown'>
          <a class='nav-link dropdown-toggle' href='#' role='button' data-toggle='dropdown'> Manage Candidates </a>
          <ul class='dropdown-menu'> <li><a class='dropdown-item' href='add_candidate.php'>Add Candidate</a></li>
          <li><a class='dropdown-item' href='candidates_list.php'>View Candidate</a></li> </ul>
          </li>
          </ul>
        </div>

        <div class='collapse navbar-collapse'>
        <ul class='navbar-nav ml-auto'>
            <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='#' role='button' data-toggle='dropdown'> Manage Positions </a>
                <ul class='dropdown-menu'> <li><a class='dropdown-item' href='add_position.php'>Add Position</a></li>
                <li><a class='dropdown-item' href='position_list.php'>View Position</a></li> </ul>
                </li>
                </ul>
              </div>
  

              <div class='collapse navbar-collapse'>
              <ul class='navbar-nav ml-auto'>
                  <li class='nav-item dropdown'>
                      <a class='nav-link dropdown-toggle' href='#' role='button' data-toggle='dropdown'> Polls </a>
                      <ul class='dropdown-menu'> <li><a class='dropdown-item' href='add_poll.php'>Add Poll</a></li>
                      <li><a class='dropdown-item' href='poll_list.php'>View Polls</a></li>
                      <li><a class='dropdown-item' href='poll_result.php'>Check Poll Result</a></li> </ul>
                      </li>
                      </ul>
                    </div>

  <div class='collapse navbar-collapse'>
  <ul class='navbar-nav ml-auto'>
      <li class='nav-item dropdown'>
          <a class='nav-link dropdown-toggle' href='#' role='button' data-toggle='dropdown'> $name1 </a>
          <ul class='dropdown-menu'> <li><a class='dropdown-item' href='admin_profile.php'>Admin Profile</a></li>
          <li><a class='dropdown-item' href='update_pass.php?updatepass=$admin_id'>Update Password</a></li>
          <li><a class='dropdown-item' href='logout.php'>Logout</a></li> </ul>
          
      </li>
  </ul>
  
</div>
      </li>
  </ul>
</div>

  ";
        } elseif (isset($_SESSION['vid'])) {
          $voter = $_SESSION['vid'];
          $query2 = mysqli_query($connect, "SELECT * from voters WHERE id='$voter'");
          $profile_voter = mysqli_fetch_assoc($query2);
          $name2 = $profile_voter['first_name'] . ' ' . $profile_voter['last_name'];
          echo "<li class='nav-item'> <a class='nav-link active' href='voter_home.php'>Home</a> </li>
  <li class='nav-item'> <a class='nav-link active' href='give_vote.php'>Give Vote</a> </li>


  <div class='collapse navbar-collapse'>
  <ul class='navbar-nav ml-auto'>
      <li class='nav-item dropdown'>
          <a class='nav-link dropdown-toggle' href='#' role='button' data-toggle='dropdown'> $name2 </a>
          <ul class='dropdown-menu'> <li><a class='dropdown-item' href='voter_profile.php'>Voter Profile</a></li>
          <li><a class='dropdown-item' href='myvote.php'>View Result</a></li> 

    
          <li><a class='dropdown-item' href='logout.php'>Logout</a></li> </ul>
      </li>
      
  </ul>
 
</div>
 ";
        } else {
          echo " <li class='nav-item active'> <a class='nav-link' href='index.php'>Home <span class='sr-only'>(current)</span></a> </li>
          <li class='nav-item'> <a class='nav-link' href='login.php'>Login</a> </li>
          <li class='nav-item'> <a class='nav-link' href='signup.php'>SignUp</a> </li>
          <li class='nav-item'> <a class='nav-link' href='About.php'>About Us</a> </li> ";
        } ?>
      </ul>
    </div>
  </nav>
  <!-- end navigation -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>