<?php
include('saveLecture.php');
include('../includes/header.php');
include('../config/dbcon.php');
?>

<body>

  <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
      <!-- <a class="navbar-brand" href="index.php">Lecture Information</a> -->
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
          <div class="card-header"><h4>Lecture Informations<h4></div>
          <div class="card-body">
            <form class="" action="saveLecture.php" method="post" enctype="multipart/form-data">
              <div class="form-group">

                <div class="form-group">
                  <label for="name">Course Name</label>

                  <?php
                  $sql = "SELECT * FROM tblcourse;";
                  $result = mysqli_query($conn, $sql);
                  $resultCheck = mysqli_num_rows($result);
                  if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      $selectedCourse[] = $row['name'];
                    }
                  }
                  echo "<select type='text' class='form-control'>";
                  foreach ($selectedCourse as $optionName) {
                    echo "<option value=" . $optionName . ">" . $optionName . "</option>";
                  }
                  echo "</select>";
                  ?>
                </div>


                <div class="form-group">
                  <label for="name">Subject Name</label>

                  <?php
                  $sql = "SELECT * FROM tblsubject";
                  $result = mysqli_query($conn, $sql);
                  $resultCheck = mysqli_num_rows($result);
                  if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      $selectedSubject[] = $row['name'];
                    }
                  }
                  echo "<select type='text' class='form-control'>";
                  foreach ($selectedSubject as $optionName) {
                    echo "<option value=" . $optionName . ">" . $optionName . "</option>";
                  }
                  echo "</select>";
                  ?>

                </div>


                <div class="form-group">
                  <label for="name">Facilitator Name</label>

                  <?php
                  $sql = "SELECT * FROM tblteacher;";
                  $result = mysqli_query($conn, $sql);
                  $resultCheck = mysqli_num_rows($result);
                  if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      $selectedFacilitator[] = $row['name'];
                    }
                  }
                  echo "<select type='text' class='form-control'>";
                  foreach ($selectedFacilitator as $optionName) {
                    echo "<option value=" . $optionName . ">" . $optionName . "</option>";
                  }
                  echo "</select>";
                  ?>
                </div>

                <label for="name">Lecture Name</label>
                <input type="text" class="form-control" name="lecture_name" placeholder="Enter Lectures name" value="">
              </div>
              <label for="name">Lecture File</label>
              <input type="file" class="form-control" name="lecture_file" placeholder="Enter lecture file" value="">
          </div>

          <div class="form-group">
            <button type="submit" name="Submit" class="btn btn-primary waves">Submit</button>
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