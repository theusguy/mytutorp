<?php include('../inc/config.php'); ?>
<?php

 if (isset($_GET['active'])) {
  $id = $_GET['active'];
   $query = "UPDATE tbl_writers SET status = 'Active' WHere id = $id ";
   if(mysqli_query($conn, $query))
   {
    // echo "<script> alert('course Deactivated Successfully'); </script>";
    echo "<script> location='writers.php'; </script>";
  }
} ?>
