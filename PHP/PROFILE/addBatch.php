<?php

    session_start();
    
    // database-connection :: start
    require('../DATABASE/databaseConnection.php');
    // database-connection :: end
?>

<?php
    
    if(isset($_POST["studentBatch"])) {
        
        $studentBatch = $_POST["studentBatch"];
        
        $year = date("Y");
        if($studentBatch <= $year && $studentBatch >= "2019") {
            $sql = "CREATE TABLE SAP_" . $studentBatch . "Batch (
                sapId int(15) PRIMARY KEY AUTO_INCREMENT,
                studentRollNumber varchar(8) ,
                sapCategory varchar(2),
                sapDocument longblob,
                expectedMark varchar(3),
                allocatedMark varchar(3) DEFAULT 0,
                stateOfProcess varchar(1) DEFAULT 0,
                description varchar(500),
                TimeOfUpload timestamp DEFAULT CURRENT_TIMESTAMP,
                prizeWon varchar(1) DEFAULT 0,
                semester varchar(1),
                documentTitle varchar(50),
                organiser varchar(50),
                conductivityMode varchar(1) DEFAULT 0,
                conductionCategory varchar(40)
            );";
            
            if(mysqli_query($link,$sql)) {
                $_SESSION['successMessage'] = 'Student Batch added successfully!...';
            }
            else {
                $_SESSION['errorMessage'] = 'Table already exists!...';
            }
        }
        else {
            $_SESSION['errorMessage'] = 'Invalid student Batch!...';
        }
    }
    
?>

 