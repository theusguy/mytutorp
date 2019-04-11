<?php include('../inc/config.php'); ?>
<?php

 if (isset($_GET['disable'])) {
  $id = $_GET['disable'];
   $query = "UPDATE tbl_writers SET status = 'Deactive' WHere id = $id ";
   if(mysqli_query($conn, $query))
   {
    // echo "<script> alert('course Deactivated Successfully'); </script>";
    echo "<script> location='writers.php'; </script>";
  }
} ?>
