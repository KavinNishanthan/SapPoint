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
        
        $studentBatch = $_SESSION['studentBatch'];
        $rollNumber = $_SESSION['rollNumber'];
        $semester = $_SESSION['semester'];
        
        $category = mysqli_real_escape_string($link,$_POST["category"]);
        $subCategory = mysqli_real_escape_string($link,$_POST["subCategory"]);
        $prizeWon = mysqli_real_escape_string($link,$_POST["prizeWon"]);
        $conductivityMode = mysqli_real_escape_string($link,$_POST["conductivityMode"]);
        $documentTitle = strtolower(mysqli_real_escape_string($link,$_POST["documentTitle"]));
        $organizer = strtolower(mysqli_real_escape_string($link,$_POST["organizer"]));
        $description = mysqli_real_escape_string($link,$_POST["description"]);
        $expectedMark = mysqli_real_escape_string($link,$_POST["expectedMark"]);
        
        if($prizeWon == "") {
            $prizeWon = 0;
        }
        
        if($conductivityMode == "") {
            $conductivityMode = 0;
        }
        
        $documentType = $_FILES["sapDocument"]["type"];
        $documentSize = $_FILES["sapDocument"]["size"];
        $sapDocument = base64_encode( file_get_contents( $_FILES["sapDocument"]["tmp_name"]  ) );
	        
        if($documentType != "application/pdf") {
            $_SESSION["errorMessage"] = "Oops! Please choose a pdf file...";
            echo "<script> window.location = '../../sappointsPage.php';</script>";
            exit(0);
        }
        
        if($documentSize > 204800) {
            $_SESSION["errorMessage"] = "Oops! Please choose a pdf file size less than 200KB...";
            echo "<script> window.location = '../../sappointsPage.php';</script>";
            exit(0);
        }
        
        $sql = "INSERT INTO SAP_" . $studentBatch . "Batch (studentRollNumber,sapCategory,sapDocument,expectedMark,description,prizeWon,semester,documentTitle,organiser,conductivityMode,conductionCategory) VALUES ('$rollNumber','$category','$sapDocument','$expectedMark','$description','$prizeWon','$semester','$documentTitle','$organizer','$conductivityMode','$subCategory');";
        if(mysqli_query($link,$sql)) {
            $_SESSION["successMessage"] = "Document added successfully...";
            echo "<script> window.location = '../../sappointsPage.php';</script>";
            exit(0);
        }
        else {
            $_SESSION["errorMessage"] = "Oops! document failed...";
            echo "<script> window.location = '../../sappointsPage.php';</script>";
            exit(0);
        }
    }
?>

