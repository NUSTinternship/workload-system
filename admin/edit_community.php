<?php include('includes/header.php') ?>
<?php include('../includes/session.php') ?>
<?php $get_id = $_GET['edit']; ?>
<?php

if (isset($_GET['delete'])) {
	$mycourses_id = $_GET['delete'];
	$sql = "DELETE FROM mycourses where id = ".$mycourses_id;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('course deleted Successfully');</script>";
		echo "<script type='text/javascript'> window.history.back(); </script>";
		
	}
}

if (isset($_POST['add_staff'])) {

	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$department = $_POST['department'];
	$address = $_POST['address'];
	$user_role = $_POST['user_role'];
	$phonenumber = $_POST['phonenumber'];

	$result = mysqli_query($conn, "update tblemployees set FirstName='$fname', LastName='$lname', EmailId='$email', Gender='$gender', Dob='$dob', Department='$department', Address='$address', role='$user_role', Phonenumber='$phonenumber' where emp_id='$get_id'         
		");
	if ($result) {
		echo "<script>alert('Record Successfully Updated');</script>";
		echo "<script type='text/javascript'> document.location = 'staff.php'; </script>";
	} else {
		die(mysqli_error());
	}
}

?>

<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="../vendors/images/home.png" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<?php include('includes/navbar.php') ?>

	<?php include('includes/right_sidebar.php') ?>

	<?php include('includes/left_sidebar.php') ?>

	<div class="mobile-menu-overlay"></div>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Staff Portal</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Community Edit</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Edit Community Projects</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<?php
								$query = mysqli_query($conn, "select * from mycommunity where emp_id = '$get_id' ") or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								?>

								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="card-box pd-30 pt-10 height-100-p">
											<h2 class="mb-30 h4">Community Projects List</h2>
											<div class="pb-20">
												<table class="data-table table stripe hover nowrap">
													<thead>
														<tr>
															<th>Course Id</th>
															<th class="table-plus">Community Name</th>
															<th>Research Code</th>
															<th class="datatable-nosort">ACTION</th>
														</tr>
													</thead>
													<tbody>

														<?php $sql = "SELECT * from mycommunity where emp_id = '$get_id'";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$cnt = 1;
														if ($query->rowCount() > 0) {
															foreach ($results as $result) {               ?>

																<tr>
																	<td> <?php echo htmlentities($cnt); ?></td>
																	<td><?php echo htmlentities($result->name); ?></td>
																	<td><?php echo htmlentities($result->description); ?></td>
																	<td>
																		<div class="table-actions">
																			<a href="edit_department.php?edit=<?php echo htmlentities($result->id); ?>" data-color="#1f2d55"><i class="icon-copy dw dw-edit2"></i></a>
																			<a href="edit_courses.php?delete=<?php echo htmlentities($result->id); ?>" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
																		</div>
																	</td>
																</tr>

														<?php $cnt++;
															}
														} ?>

													</tbody>

												</table>


											</div>
										</div>
									</div>
								</div>

								<br>

								<div class="row">

									<div class="col-md-12 col-sm-12">
										<div class="card-box pd-30 pt-10 height-100-p">
											<h2 class="mb-30 h4">Community Projects Available</h2>
											<div class="pb-20">
												<table class="data-table table stripe hover nowrap">
													<thead>
														<tr>
															<th>Community Project Id</th>
															<th class="table-plus">Community Project Name</th>
															<th>Community Project Code</th>
															<th class="datatable-nosort">Assign Community Project</th>
														</tr>
													</thead>
													<tbody>

														<?php $sql = "SELECT * from community";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$cnt = 1;
														if ($query->rowCount() > 0) {
														
															foreach ($results as $result) { ?>

																<tr>
																	<td> <?php echo htmlentities($cnt); ?></td>
																	<td><?php echo htmlentities($result->CommunityName); ?></td>
																	<td><?php echo htmlentities($result->CommunityCode); ?></td>
																	<td>
																		<div class="table-actions">
																			<a href="add_community.php?add_community=<?php echo htmlentities($result->id); ?>&id=<?php echo htmlentities($get_id); ?>" data-color="green"><i class="icon-copy dw dw-add"></i></a>
																		</div>
																	</td>
																</tr>

														<?php $cnt++;
															}
														} ?>

													</tbody>

												</table>

											</div>
											
										</div>
									</div>
								</div>

								<?php
								$query = mysqli_query($conn, "select * from tblemployees where emp_id = '$get_id' ") or die(mysqli_error());
								$new_row = mysqli_fetch_array($query);
								?>
							</section>
						</form>
					</div>
				</div>

			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php') ?>
</body>

</html>