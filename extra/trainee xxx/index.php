<?php
include('deleteStudent.php');
include_once('../includes/header.php')
?>

<body>

  <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
      <a class="navbar-brand">TRAINEE'S INFORMATION</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav ml-auto">
          <!-- <li class="nav-item"><a class="btn btn-primary" href="addStudent.php"><i class="fa fa-user-plus"></i>Add Student's Info</a></li> -->
          <li class="nav-item"><a class="btn btn-outline-danger" href="../index.php"><i class="fa fa-sign-out-alt"></i>Back to Dashboard</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-20">
        <div class="card">
          <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <!-- <th>SL.</th> -->
                  <!-- <th>Roll</th> -->
                  <th>Image</th>
                  <th>Name</th>
                  <th>Designation</th>
                  <th>Organization</th>
                  <!-- <th>E-Mail</th> -->
                  <th>Mobile</th>
                  <!-- <th>Date of Birth</th>
                  <th>Blood Group</th> -->
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $sql = "SELECT * FROM tblStudent";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result)) {
                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                      <!-- <td><?php echo $row['stu_id'] ?></td> -->                    
                      <!-- <td><?php echo $row['roll'] ?></td> -->
                      <td><img src="<?php echo $upload_dir . $row['image'] ?>" height="40"></td>
                      <td><?php echo $row['name'] ?></td>
                      <td><?php echo $row['designation'] ?></td>
                      <td><?php echo $row['organization'] ?></td>
                      <!-- <td><?php echo $row['email'] ?></td> -->
                      <td><?php echo $row['mobile'] ?></td>
                      <!-- <td><?php echo $row['dob'] ?></td>
                      <td><?php echo $row['bg'] ?></td> -->

                      <td class="text-center">
                        <a href="viewStudent.php?stu_id=<?php echo $row['stu_id'] ?>" class="btn btn-success" title="View Profile"><i class="fa fa-eye"></i></a>
                        <a href="editStudent.php?stu_id=<?php echo $row['stu_id'] ?>" class="btn btn-info" title="Edit Profile"><i class="fa fa-user-edit"></i></a>
                        <!-- <a href="index.php?delete=<?php echo $row['stu_id'] ?>" class="btn btn-danger" title="Delete Profile" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash-alt"></i></a> -->
                      </td>
                    </tr>
                <?php
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pagenation--->
  <nav aria-label="Page navigation example" id="pagination">
    <ul class="pagination justify-content-center my-3">
      <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
      <li class="page-item active"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
  </nav>

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