<?php

    session_start();
    // database-connection :: start
    require('../DATABASE/databaseConnection.php');
    // database-connection :: end
?>


<?php
    if(isset($_POST['sid'])) {
        $sapId = $_POST['sid'];
        $studentBatch = $_SESSION['studentBatch'];
        
         $sql = "DELETE FROM SAP_" . $studentBatch ."Batch WHERE sapId = '$sapId';";
        if(mysqli_query($link,$sql)) {
            $_SESSION["warningMessage"] = "Document Deleted successfully...";
            echo "<script> window.location = '../../sappointsPage.php';</script>";
            exit(0);
        }
    }
?>