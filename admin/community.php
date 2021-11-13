<?php include('includes/header.php') ?>
<?php include('../includes/session.php') ?>

<?php
if (isset($_GET['delete'])) { //method to describe deleting element from the database
	$Community_id = $_GET['delete'];
	$sql = "DELETE FROM community where id = " . $Community_id;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('Community deleted Successfully');</script>";
		echo "<script type='text/javascript'> document.location = 'community.php'; </script>";
	}
} //basically, if delete button pressed, then delete the content found at id number
?>

<?php
if (isset($_POST['add'])) {
	$deptname = $_POST['CommunityName'];
	$deptshortname = $_POST['CommunityCode'];
	$description = $_POST['Description'];

	$query = mysqli_query($conn, "select * from community where CommunityName = '$deptname'") or die(mysqli_error());
	$count = mysqli_num_rows($query);

	if ($count > 0) {
		echo "<script>alert('Community Already exist');</script>";
	} else {
		$query = mysqli_query($conn, "insert into community (CommunityName, CommunityCode, Description)
  		 values ('$deptname', '$deptshortname', '$description')      
		") or die(mysqli_error());

		if ($query) {
			echo "<script>alert('Community Added Successfully');</script>";
			echo "<script type='text/javascript'> document.location = 'community.php'; </script>";
		}
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

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Community List</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Community Module</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
						<div class="card-box pd-30 pt-10 height-100-p">
							<h2 class="mb-30 h4">New Community</h2>
							<section>
								<form name="save" method="post">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Community Name</label>
												<input name="CommunityName" type="text" class="form-control" required="true" autocomplete="off">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Community Code</label>
												<input name="CommunityCode" type="text" class="form-control" required="true" autocomplete="off" style="text-transform:uppercase">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Community Description</label>
												<input name="Description" type="text" class="form-control" required="true" autocomplete="off" style="text-transform:uppercase">
											</div>
										</div>
									</div>
									<div class="col-sm-12 text-right">
										<div class="dropdown">
											<input class="btn btn-primary" type="submit" value="REGISTER" name="add" id="add">
										</div>
									</div>
								</form>
							</section>
						</div>
					</div>

					<div class="col-lg-8 col-md-6 col-sm-12 mb-30">
						<div class="card-box pd-30 pt-10 height-100-p">
							<h2 class="mb-30 h4">Community List</h2>
							<div class="pb-20">
								<table class="data-table table stripe hover nowrap">
									<thead>
										<tr>
											<th>Id</th>
											<th class="table-plus">Project Name</th>
											<th>Project Code</th>
											<th>Description</th>
											<th class="datatable-nosort">ACTION</th>
										</tr>
									</thead>
									<tbody>

										<?php $sql = "SELECT * from community";
										$query = $dbh->prepare($sql);
										$query->execute();
										$results = $query->fetchAll(PDO::FETCH_OBJ);
										$cnt = 1;
										if ($query->rowCount() > 0) {
											foreach ($results as $result) {               ?>

												<tr>
													<td> <?php echo htmlentities($cnt); ?></td>
													<td><?php echo htmlentities($result->CommunityName); ?></td>
													<td><?php echo htmlentities($result->CommunityCode); ?></td>
													<td><?php echo htmlentities($result->Description); ?></td>

													<td>
														<div class="table-actions">
															<a href="edit_department.php?edit=<?php echo htmlentities($result->id); ?>" data-color="#1f2d55"><i class="icon-copy dw dw-edit2"></i></a>
															<a href="community.php?delete=<?php echo htmlentities($result->id); ?>" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
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

			</div>

			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<?php include('includes/scripts.php') ?>
</body>

</html>