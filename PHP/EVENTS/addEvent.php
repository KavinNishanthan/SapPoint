<?php
    session_start();
?>

<?php

    // database-connection :: start
    require('../DATABASE/databaseConnection.php');
    // database-connection :: end
?>

<?php
    
    if(isset($_POST['upload'])) {
        $eventName = strtolower(mysqli_real_escape_string($link,$_POST["eventName"]));
        $eventOrganizer = strtolower(mysqli_real_escape_string($link,$_POST["eventOrganizer"]));
        $institute = strtolower(mysqli_real_escape_string($link,$_POST["institute"]));
        $eventType = strtolower(mysqli_real_escape_string($link,$_POST["eventType"]));
        $eventDate = mysqli_real_escape_string($link,$_POST["eventDate"]);
        $registrationDeadline = mysqli_real_escape_string($link,$_POST["registrationDeadline"]);
        $entryFee = mysqli_real_escape_string($link,$_POST["entryFee"]);
        $dept = $_POST["department"];
        $eligible = $_POST["eligibility"];
        $eventCategory = strtolower(mysqli_real_escape_string($link,$_POST["eventCategory"]));
        $coordinatorName = strtolower(mysqli_real_escape_string($link,$_POST["coordinatorName"]));
        $coordinatorNumber = mysqli_real_escape_string($link,$_POST["coordinatorNumber"]);
        $eventDescription = mysqli_real_escape_string($link,$_POST["eventDescription"]);
        $eventLink = mysqli_real_escape_string($link,$_POST["eventLink"]);
        $eventImage = addslashes(file_get_contents($_FILES["eventImage"]["tmp_name"]));
        
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$eventLink)) {
            $_SESSION["errorMessage"] = "Invalid Document Link...";
            echo "<script> window.location = '../../addEventPage.php';</script>";
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
        
        $eligibility = "";
        if($eligible[0] == "ALL") {
            $eligibility = "1,2,3,4";
        }
        
        else {
            foreach($eligible as $e) {
                $eligibility .= $e . ",";
            }
            $eligibility = substr_replace($eligibility,"",-1);
        }
        
        $sql = "INSERT INTO Events (eventName,eventDescription,eventImage,dateOfEvent,registrationDeadLine,eventOrganizer,eligibility,entryFee,eventLink,coordinatorName,coordinatorNumber,eventCategory,eventType,department,institute) VALUES ('$eventName','$eventDescription','$eventImage','$eventDate','$registrationDeadline','$eventOrganizer','$eligibility','$entryFee','$eventLink','$coordinatorName','$coordinatorNumber','$eventCategory','$eventType','$department','$institute');";
        if(mysqli_query($link,$sql)) {
            $_SESSION["successMessage"] = "Event released successfully...";
            echo "<script> window.location = '../../addEventPage.php';</script>";
            exit(0);
        }
        else {
            $_SESSION["errorMessage"] = "Oops! circular failed...";
            echo "<script> window.location = '../../addEventPage.php';</script>";
            exit(0);
        }
    }
?>

