<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php $get_courseID = $_GET['add_course']; $get_empID = ['id']?>

<?php 

    if(isset($_GET['add_course']))
    {
        $sql = "SELECT id, CourseName, CourseCode FROM courses WHERE id='$get_courseID'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $courseName = $row['CourseName'];
                $courseCode = $row['CourseCode'];
            }
          } else {
            echo "0 results";
          } 

          $id = intval($_GET['id']);
    
        //   echo "<script type='text/javascript'>alert('{$courseCode}');</script>";


    $result = mysqli_query($conn,"INSERT INTO mycourses(course,coursecode,emp_id) VALUES('$courseName','$courseCode','$id')         
    ");		
	if ($result) {
        echo "<script>alert('Course Successfully Assigned');</script>";
        echo "<script type='text/javascript'> window.history.back(); </script>";
	} else{
	  die(mysqli_error());
   }

}

?>