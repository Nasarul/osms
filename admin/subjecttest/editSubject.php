<?php
require_once('../config/dbcon.php');
$upload_dir = '../uploads/lecture/';

if (isset($_GET['subject_id'])) {
  $subject_id = $_GET['subject_id'];
  $sql = "SELECT * FROM tblsubject WHERE subject_id =" . $subject_id;
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  } else {
    $errorMsg = 'Could not find any record';
  }
}

if (isset($_POST['Submit'])) {
  $course = $_POST['course_id'];
  $subject_name = $_POST['subject_name'];
  $code = $_POST['code'];

  $lecture = $_FILES['lecture']['name'];
  $lecture_type = $_FILES['lecture']['type'];
  $lecture_size = $_FILES['lecture']['size'];
  $lecture_temp_loc = $_FILES['lecture']['tmp_name'];
  $lecture_store = "../uploads/lecture/" . $lecture;
  move_uploaded_file($lecture_temp_loc, $lecture_store);
  
  // test fatal case start ??

  // if ($lecture) {

  //   $imgExt = strtolower(pathinfo($lecture, PATHINFO_EXTENSION));

  //   $allowExt  = array('jpeg', 'jpg', 'png', 'gif');

  //   $userfile = time() . '_' . rand(1000, 9999) . '.' . $imgExt;

  //   if (in_array($imgExt, $allowExt)) {

  //     if ($imgSize < 90000000000000000) {
  //       unlink($upload_dir . $row['lecture']);
  //       move_uploaded_file($lecture_temp_loc, $lecture_store);
  //     } else {
  //       $errorMsg = 'file too large';
  //     }
  //   } else {
  //     $errorMsg = 'Please select a valid image';
  //   }
  // } else {
  //   $userfile = $row['lecture'];
  // }


// test fatal case end ??


  if (!isset($errorMsg)) {
    $sql = "UPDATE tblsubject
									SET subject_name = '" . $subject_name . "',
                  course_id = '" . $course . "',                  
                  code = '" . $code . "',
                  lecture = '" . $lecture . "'
				WHERE	subject_id=" . $subject_id;
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $successMsg = 'New record updated successfully';
      header('Location:index.php');
    } else {
      $errorMsg = 'Error ' . mysqli_error($conn);
    }
  }
}

?>

<?php
include_once('../includes/header.php')
?>

<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
  <div class="container">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a class="btn btn-outline-danger" href="index.php"><i class="fa fa-sign-out-alt"></i>Back to Home</a></li>
    </ul>
  </div>
</nav>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h5> Edit Subject </h5>
        </div>
        <div class="card-body">
          <form class="" action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label for="name">Course ID</label>
              <input type="text" class="form-control" name="course_id" placeholder="Enter Course ID..." value="<?php echo $row['course_id']; ?>">
            </div>

            <div class="form-group">
              <label for="name">Subject Name</label>
              <input type="text" class="form-control" name="subject_name" placeholder="Enter Subjects Name..." value="<?php echo $row['subject_name']; ?>">
            </div>
            <div class="form-group">
              <label for="name">Subject Code</label>
              <input type="text" class="form-control" name="code" placeholder="Enter Subjects code..." value="<?php echo $row['code']; ?>">
            </div>

            <div class="form-group">
              <label for="name">Lecture</label>
              <input type="file" class="form-control" name="lecture" placeholder="Attache lecture file..." value="<?php echo $upload_dir . $row['lecture'] ?>">
            </div>

            <div class="form-group">
              <button type="submit" name="Submit" class="btn btn-primary waves">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="js/bootstrap.min.js" charset="utf-8"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
</body>

</html>