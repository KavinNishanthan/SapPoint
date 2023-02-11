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
        $staffId = mysqli_real_escape_string($link,$_POST["staffId"]);
        $staffName = strtolower(mysqli_real_escape_string($link,$_POST["staffName"]));
        $staffEmail = mysqli_real_escape_string($link,$_POST["staffEmail"]);
        $designation = mysqli_real_escape_string($link,$_POST["designation"]);
        $department = mysqli_real_escape_string($link,$_POST["department"]);
        $semester = mysqli_real_escape_string($link,$_POST["semester"]);
        $section = mysqli_real_escape_string($link,$_POST["section"]);
        $studentBatch = mysqli_real_escape_string($link,$_POST["studentBatch"]);
        
        if($designation != '1') {
            $semester = "";
            $section = "";
            $studentBatch = "";
        }
        
        $sql = "UPDATE Staff SET staffName = '$staffName', staffEmail = '$staffEmail', designation = '$designation', studentBatch = '$studentBatch', department = '$department', section = '$section', currentSemester = '$semester' WHERE staffId = '$staffId';";
        if(mysqli_query($link,$sql)) {
            $_SESSION["successMessage"] = $staffId . " updated successfully...";
            echo "<script> window.location = '../../staffDetailPage.php';</script>";
            exit(0);
        }
    }
?>

