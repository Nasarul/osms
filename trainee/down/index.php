<?php
include('../includes/header.php');
require_once('../config/dbcon.php');
?>


<html>

<body>

	<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
		<div class="container">
			<a class="navbar-brand">Lecture Download</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto"></ul>
				<ul class="navbar-nav ml-auto">
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
									<th>Course Name</th>
									<th>Subject Name</th>
									<th>Facilitator Name</th>
									<th>Lecture Name</th>
									<th>Actions</th>
								</tr>
							</thead>

							<tbody>
								<?php
								$i = 1;
								$sql = "SELECT tbluploadlecture.upload_lecture_id, tbluploadlecture.lecture_name, tblcourse.course_name, tblsubject.subject_name, tblfacilitator.facilitator_name FROM tbluploadlecture LEFT JOIN tblcourse ON tbluploadlecture.course_id = tblcourse.course_id LEFT JOIN tblsubject ON tbluploadlecture.subject_id = tblsubject.subject_id LEFT JOIN tblfacilitator ON tbluploadlecture.facilitator_id = tblfacilitator.facilitator_id;";

								$result = mysqli_query($conn, $sql);
								if (mysqli_num_rows($result)) {
									while ($row = mysqli_fetch_assoc($result)) {
								?>

										<tr>
											<td><?php echo $row['course_name']; ?></td>
											<td><?php echo $row['subject_name']; ?></td>
											<td><?php echo $row['facilitator_name']; ?></td>
											<td><?php echo $row['lecture_name']; ?></td>
											<td class="text-center">
												<a href="download.php?upload_lecture_id=<?php echo $row['upload_lecture_id'] ?>" class="btn btn-success" title="Download"><i class="fa-solid fa-down"></i>Download</a>
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
	<!-- <nav aria-label="Page navigation example" id="pagination">
    <ul class="pagination justify-content-center my-3">
      <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
      <li class="page-item active"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
  </nav> -->

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