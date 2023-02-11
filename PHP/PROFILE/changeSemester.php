<?php

    session_start();
    
    // database-connection :: start
    require('../DATABASE/databaseConnection.php');
    // database-connection :: end
?>

<?php
    
    if(isset($_POST["from_semester"]) && isset($_POST["to_semester"]) && isset($_POST["studentBatch"])) {
        $from_semester = $_POST["from_semester"];
        $to_semester = $_POST["to_semester"];
        $studentBatch = $_POST["studentBatch"];
        if($studentBatch != "") {
            $sql = "SELECT studentName FROM Student WHERE studentBatch = '$studentBatch';";
            if(mysqli_num_rows(mysqli_query($link,$sql)) > 0) {
                if($from_semester != "SEMESTER" && $to_semester != "SEMESTER") {
                    $sql = "UPDATE Student SET currentSemester = '$to_semester' WHERE currentSemester = '$from_semester' AND studentBatch = '$studentBatch';";
                    if(mysqli_query($link,$sql)) {
                        $_SESSION['successMessage'] = 'Semester changed from ' . $from_semester . ' to ' . $to_semester . ' successfully!...';
                    }
                    else {
                        $_SESSION['errorMessage'] = 'Something went wrong!...';
                    }
                    
                    $sql = "UPDATE Staff SET currentSemester = '$to_semester' WHERE currentSemester = '$from_semester' AND studentBatch = '$studentBatch';";
                    if(mysqli_query($link,$sql)) {
                        $_SESSION['successMessage'] = 'Semester changed from ' . $from_semester . ' to ' . $to_semester . ' successfully!...';
                    }
                    else {
                        $_SESSION['errorMessage'] = 'Something went wrong!...';
                    }
                }
                else {
                    $_SESSION['errorMessage'] = 'Please choose all fields!...';
                }
            }
            else {
                $_SESSION['errorMessage'] = "No such Batch found!...";
            }
        }
        else {
            $_SESSION['errorMessage'] = 'Please enter student batch field!...';
        }
        
    }
    
?>

 