<?php
include('../config/dbcon.php');
// $upload_dir = '../uploads/facilitator/';

if (isset($_GET['delete'])) {
  $sub_id = $_GET['delete'];
  $sql = "SELECT * FROM tblsubject WHERE sub_id=" . $sub_id;
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // $image = $row['image'];
    // unlink($upload_dir . $image);
    $sql = "DELETE FROM tblsubject WHERE sub_id=" . $sub_id;
    if (mysqli_query($conn, $sql)) {
      header('location:index.php');
    }
  }
}
?>