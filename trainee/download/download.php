<?php
include("../config/dbcon.php");

if (isset($_GET['upload_lecture_id'])) {
  $id = $_GET['upload_lecture_id'];
  $state = $bd->prepare("select * from tbluploadlecture where upload_lecture_id=?");
  $stat->bindParam(1, $id);
  $stat->execute();
  $data = $stat->fetch();
  $filepath = '../../admin/uploads/lecture/' . $data['lecture_file'];

  // Process download
  if (file_exists($filepath)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; lecture_file="' . basename($filepath) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filepath));
    flush(); // Flush system output buffer
    readfile($filepath);
    die();
  } else {
    http_response_code(404);
    die();
  }
} else {
  die("Invalid file name!");
}
?>

<!-- Extra code for test -->

<?php
include_once('../includes/header.php')
?>

<body>
  <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
  </nav>

  <div class="container">
    <div class="row justify-content-center">
      <div class="card">
        <div class="card-header justify-content-center">
          <h3 class="text-center">Student's information</h2>
        </div>
        <div class="card-body">
          <div class="row">
            <h5 class="form-control"><i class="fa-solid fa-user"></i>
              <span><?php echo $row['upload_lecture_id'] ?></span>
              </i>
            </h5>


            
            <h5 class="form-control"><i class="fa-solid fa-tags"></i>
              <span><?php echo $row['lecture_file'] ?></span>
              </i>
            </h5>

            <a class="btn btn-outline-danger" href="index.php"><i class="fa fa-sign-out-alt"></i><span>Back to Home</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <script src="js/bootstrap.min.js" charset="utf-8"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
</body>

</html>