

		<?php
								include('../config/dbcon.php');
								$stmt = $conn->prepare("select * from tblsubject");
								$stmt->execute();
								while ($row = $stmt->fetch()) {
								?> 


									<!-- <tr>
										<td><?php echo $row['subject_id'] ?></td>
										<td><?php echo $row['code'] ?></td>
										<td><?php echo $row['subject_name'] ?></td>
										<td class="text-center">
											<a href="download.php?subject_id=<?php echo $row['subject_id'] ?>" class="btn btn-success" title="Download"><i class="fa-solid fa-down"></i>Download</a>
										</td>
									</tr> -->