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
        $circularNumber = strtolower(mysqli_real_escape_string($link,$_POST["circularNumber"]));
        $circularTitle = strtolower(mysqli_real_escape_string($link,$_POST["circularTitle"]));
        $circularDescription = mysqli_real_escape_string($link,$_POST["circularDescription"]);
        $dept = $_POST["department"];
        $yr = $_POST["year"];
        $userCategory = mysqli_real_escape_string($link,$_POST["userCategory"]);
        $documentLink = mysqli_real_escape_string($link,$_POST["documentLink"]);
        
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$documentLink)) {
            $_SESSION["errorMessage"] = "Invalid Document Link...";
            echo "<script> window.location = '../../circularPage.php';</script>";
            exit(0);
        }
    
        $department = "";
        if($dept[0] == "ALL") {
            $department = "CE,MECH,MTA,AU,CHE,FT,EEE,EIE,ECE,CSE,IT,CSD,AIML,AIDS";
        }
        else {
            foreach($dept as $d) {
                $department .= $d . ",";
            }
            $department = substr_replace($department,"",-1);
        }
        
        $year = "";
        if($yr[0] == "ALL") {
            $year = "1,2,3,4";
        }
        else {
            foreach($yr as $y) {
                $year .= $y . ",";
            }
            $year = substr_replace($year,"",-1);
        }
        
        $sql = "UPDATE Circulars SET circularTitle = '$circularTitle', circularDescription = '$circularDescription', yearCircular = '$year', department = '$department', userCategory = '$userCategory', documentLink = '$documentLink' WHERE circularNumber = '$circularNumber';";
        if(mysqli_query($link,$sql)) {
            $_SESSION["successMessage"] = $circularNumber . " updated successfully...";
            echo "<script> window.location = '../../circularPage.php';</script>";
            exit(0);
        }
    }
?>

