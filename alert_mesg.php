<?php if (isset($_SESSION['mesg'])): ?>
  <div class="alert alert-success alert-dismissible fade show mesg" role="alert">
  <?php 
        echo $_SESSION['mesg']; 
        unset($_SESSION['mesg']);
  ?>
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif ?>

<?php if (isset($_SESSION['warning_mesg'])): ?>
  <div class="alert alert-danger alert-dismissible fade show mesg" role="alert">
  <?php 
        echo $_SESSION['warning_mesg']; 
        unset($_SESSION['warning_mesg']);
  ?>
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif ?>

<?php
//redirect to location
function place($path){
      echo "<script> location=\"$path\"; </script>";
  }
?>
