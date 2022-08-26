<?php
include('saveLecture.php');
include('../includes/header.php');
include('../config/dbcon.php');
?>

<body>

  <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
      <a class="navbar-brand" href="index.php">Lecture Information</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="btn btn-outline-danger" href="index.php"><i class="fa fa-sign-out-alt"></i>Back</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4>Lecture Informations<h4>
          </div>
          <div class="card-body">
            <form class="" action="saveLecture.php" method="post" enctype="multipart/form-data">
              <div class="form-group">

                <!-- <?php
                $sql = "SELECT tbluploadlecture.lecture_name, tblsubject.subject_name, tblcourse.course_name, tblfacilitator.facilitator_name, tbluploadlecture.upload_lecture_id, tbluploadlecture.lecture_file FROM tbluploadlecture INNER JOIN tblcourse ON tbluploadlecture.course_id = tblcourse.course_id INNER JOIN tblsubject ON tblcourse.course_id = tblsubject.course_id INNER JOIN tblfacilitator ON tblsubject.course_id = tblfacilitator.course_id;";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result)) {
                  while ($row = mysqli_fetch_assoc($result)) {
                ?> -->
                    <div class="form-group">
                      <label for="course_name">Course Name</label>
                      <input type="text" class="form-control" name="course_name" placeholder="Enter Facilitator name" value="<?php echo $row['course_name'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="subject_name">Subject Name</label>
                      <input type="text" class="form-control" name="subject_name" placeholder="Enter Facilitator name" value="<?php echo $row['subject_name'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="facilitator_name">Facilitator Name</label>
                      <input type="text" class="form-control" name="facilitator_name" placeholder="Enter Facilitator name" value="<?php echo $row['facilitator_name'] ?>">
                    </div>
                    <label for="lecture_name">Lecture Name</label>
                    <input type="text" class="form-control" name="lecture_name" placeholder="Enter Lectures name" value="<?php echo $row['lecture_name'] ?>">
              </div>
              <label for="name">Lecture File</label>
              <input type="file" class="form-control" name="lecture_file" placeholder="Enter lecture file" value="">
          </div>

          <div class="form-group">
            <button type="submit" name="Submit" class="btn btn-primary waves">Submit</button>
          </div>
      <?php
                  }
                }
      ?>

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