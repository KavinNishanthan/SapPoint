<?php

    session_start();
    // database-connection :: start
    require('../DATABASE/databaseConnection.php');
    // database-connection :: end
?>


<?php
    if(isset($_POST['rollNumber'])) {
        $rollNumber = $_POST['rollNumber'];
        
        $sql = "DELETE FROM Student WHERE rollNumber = '$rollNumber';";
        if(mysqli_query($link,$sql)) {
            $_SESSION["warningMessage"] = $rollNumber . " removed successfully...";
            echo "<script> window.location = '../../studentDetailPage.php';</script>";
            exit(0);
        }
    }
?>