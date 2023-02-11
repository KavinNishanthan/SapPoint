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
        $studentBatch = $_SESSION['studentBatch'];
        
        $sapId = mysqli_real_escape_string($link,$_POST["sapId"]);
        $category = mysqli_real_escape_string($link,$_POST["category"]);
        $subCategory = mysqli_real_escape_string($link,$_POST["subCategory"]);
        if ($subCategory != "submitted" && $category != "5" && $category != "6" && $category != "7" && $category != "8" && $category != "9" && $category != "10" && $category != "11" && $category != "12") {
                $prizeWon = mysqli_real_escape_string($link,$_POST["prizeWon"]);
        }
        else {
            $prizeWon = 0;
        }
        if($category == "1" || $category == "2" || $category == "3" || $category == "13") {
                $conductivityMode = mysqli_real_escape_string($link,$_POST["conductivityMode"]);
        }
        else {
            $conductivityMode = 0;
        }
        $documentTitle = strtolower(mysqli_real_escape_string($link,$_POST["documentTitle"]));
        $organizer = strtolower(mysqli_real_escape_string($link,$_POST["organizer"]));
        $description = mysqli_real_escape_string($link,$_POST["description"]);
        $expectedMark = mysqli_real_escape_string($link,$_POST["expectedMark"]);
        
        if (!empty($_FILES['sapDocument']['name'])) {
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
        
            $sql = "UPDATE SAP_" . $studentBatch . "Batch SET sapCategory = '$category', sapDocument = '$sapDocument', expectedMark = '$expectedMark', description = '$description', prizeWon = '$prizeWon', documentTitle = '$documentTitle', organiser = '$organizer', conductivityMode = '$conductivityMode', conductionCategory = '$subCategory', stateOfProcess = '0', allocatedMark = '0' WHERE sapId = '$sapId';";
        }
        else {
            $sql = "UPDATE SAP_" . $studentBatch . "Batch SET sapCategory = '$category', expectedMark = '$expectedMark', description = '$description', prizeWon = '$prizeWon', documentTitle = '$documentTitle', organiser = '$organizer', conductivityMode = '$conductivityMode', conductionCategory = '$subCategory', stateOfProcess = '0', allocatedMark = '0' WHERE sapId = '$sapId';";
        }
        
        if(mysqli_query($link,$sql)) {
            $_SESSION["successMessage"] = ucwords($documentTitle) . " updated successfully...";
            echo "<script> window.location = '../../sappointsPage.php';</script>";
            exit(0);
        }
    }
?>

