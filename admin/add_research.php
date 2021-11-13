<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php $get_researchID = $_GET['add_research']; $get_empID = ['id']?>

<?php 

    if(isset($_GET['add_research']))
    {
        $sql = "SELECT id, ProjectName, ProjectDescription FROM researchprojects WHERE id='$get_researchID'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $courseName = $row['ProjectName'];
                $courseCode = $row['ProjectDescription'];
            }
          } else {
            echo "0 results";
          } 

          $id = intval($_GET['id']);
    
        //   echo "<script type='text/javascript'>alert('{$courseCode}');</script>";


    $result = mysqli_query($conn,"INSERT INTO myresearch(Name,ResearchDescription,emp_id) VALUES('$courseName','$courseCode','$id')         
    ");		
	if ($result) {
        echo "<script>alert('Research Successfully Assigned');</script>";
        echo "<script type='text/javascript'> window.history.back(); </script>";
	} else{
	  die(mysqli_error());
   }

}

?>