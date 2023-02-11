<?php

    session_start();
    // database-connection :: start
    require('../DATABASE/databaseConnection.php');
    // database-connection :: end
?>


<?php
    if(isset($_POST['staffId'])) {
        $staffId = $_POST['staffId'];
        
        $sql = "DELETE FROM Staff WHERE staffId = '$staffId';";
        if(mysqli_query($link,$sql)) {
            $_SESSION["warningMessage"] = $staffId . " removed successfully...";
            echo "<script> window.location = '../../staffDetailPage.php';</script>";
            exit(0);
        }
    }
?>