<?php
    session_start();
?>

<?php

    // database-connection :: start
    require('../DATABASE/databaseConnection.php');
    // database-connection :: end
?>

<?php
    
    if(isset($_POST['save'])) {
        $rollNumber = mysqli_real_escape_string($link,$_POST["rollNumber"]);
        $studentName = strtolower(mysqli_real_escape_string($link,$_POST["studentName"]));
        $studentEmail = mysqli_real_escape_string($link,$_POST["studentEmail"]);
	$mentor = mysqli_real_escape_string($link,$_POST["mentor"]);
        $department = mysqli_real_escape_string($link,$_POST["department"]);
        $semester = mysqli_real_escape_string($link,$_POST["semester"]);
        $section = mysqli_real_escape_string($link,$_POST["section"]);
        $studentBatch = mysqli_real_escape_string($link,$_POST["studentBatch"]);
        
        $sql = "UPDATE Student SET studentName = '$studentName', studentEmail = '$studentEmail',mentor = '$mentor', studentBatch = '$studentBatch', department = '$department', section = '$section', currentSemester = '$semester' WHERE rollNumber = '$rollNumber';";
        if(mysqli_query($link,$sql)) {
            $_SESSION["successMessage"] = $rollNumber . " updated successfully...";
            echo "<script> window.location = '../../studentDetailPage.php';</script>";
            exit(0);
        }
    }
?>

