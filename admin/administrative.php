<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>

<?php 
	 if (isset($_GET['delete'])) {
		$Task_id = $_GET['delete'];
		$sql = "DELETE FROM administrativetasks where id = ".$Task_id;
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('Task deleted Successfully');</script>";
     		echo "<script type='text/javascript'> document.location = 'administrative.php'; </script>";
			
		}
	}
?>

<?php
 if(isset($_POST['add']))
{
	$deptname=$_POST['TaskName'];
	$deptshortname=$_POST['TaskCode'];
	$description=$_POST['description'];

     $query = mysqli_query($conn,"select * from administrativetasks where TaskName = '$deptname'")or die(mysqli_error());
	 $count = mysqli_num_rows($query);
     
     if ($count > 0){ 
     	echo "<script>alert('Task Already exist');</script>";
      }
      else{
        $query = mysqli_query($conn,"insert into administrativetasks (TaskName, TaskCode, description)
  		 values ('$deptname', '$deptshortname','$description')      
		") or die(mysqli_error()); 

		if ($query) {
			echo "<script>alert('Task Added Successfully');</script>";
			echo "<script type='text/javascript'> document.location = 'administrative.php'; </script>";
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

	<?php include('includes/navbar.php')?>

	<?php include('includes/right_sidebar.php')?>

	<?php include('includes/left_sidebar.php')?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Task List</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
										<li class="breadcrumb-item active" aria-current="page">Task Module</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
							<div class="card-box pd-30 pt-10 height-100-p">
								<h2 class="mb-30 h4">New Task</h2>
								<section>
									<form name="save" method="post">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label >Task Name</label>
												<input name="TaskName" type="text" class="form-control" required="true" autocomplete="off">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Task Code</label>
												<input name="TaskCode" type="text" class="form-control" required="true" autocomplete="off" style="text-transform:uppercase">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Task Description</label>
												<input name="description" type="text" class="form-control" required="true" autocomplete="off" style="text-transform:uppercase">
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
								<h2 class="mb-30 h4">Task List</h2>
								<div class="pb-20">
									<table class="data-table table stripe hover nowrap">
										<thead>
										<tr>
											<th>Task Id</th>
											<th class="table-plus">Task Name</th>
											<th>Task Code</th>
											<th>Task Description</th>
											<th class="datatable-nosort">ACTION</th>
										</tr>
										</thead>
										<tbody>

											<?php $sql = "SELECT * from administrativetasks";
											$query = $dbh -> prepare($sql);
											$query->execute();
											$results=$query->fetchAll(PDO::FETCH_OBJ);
											$cnt=1;
											if($query->rowCount() > 0)
											{
											foreach($results as $result)
											{               ?>  

											<tr>
												<td> <?php echo htmlentities($cnt);?></td>
	                                            <td><?php echo htmlentities($result->TaskName);?></td>
	                                            <td><?php echo htmlentities($result->TaskCode);?></td>
	                                            <td><?php echo htmlentities($result->description);?></td>

												<td>
													<div class="table-actions">
														<a href="edit_department.php?edit=<?php echo htmlentities($result->id);?>" data-color="#1f2d55"><i class="icon-copy dw dw-edit2"></i></a>
														<a href="administrative.php?delete=<?php echo htmlentities($result->id);?>" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
													</div>
												</td>
											</tr>

											<?php $cnt++;} }?>  

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

	<?php include('includes/scripts.php')?>
</body>
</html>