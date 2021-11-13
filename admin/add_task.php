<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php $get_taskID = $_GET['add_task']; $get_empID = ['id']?>

<?php 

    if(isset($_GET['add_task']))
    {
        $sql = "SELECT id, TaskName, TaskDescription FROM administrativetasks WHERE id='$get_taskID'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $courseName = $row['TaskName'];
                $courseCode = $row['TaskDescription'];
            }
          } else {
            echo "0 results";
          } 

          $id = intval($_GET['id']);
    
        //   echo "<script type='text/javascript'>alert('{$courseCode}');</script>";


    $result = mysqli_query($conn,"INSERT INTO mytasks(name,description,emp_id) VALUES('$courseName','$courseCode','$id')         
    ");		
	if ($result) {
        echo "<script>alert('Course Successfully Assigned');</script>";
        echo "<script type='text/javascript'> window.history.back(); </script>";
	} else{
	  die(mysqli_error());
   }

}

?>