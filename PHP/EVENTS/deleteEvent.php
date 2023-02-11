<?php

    session_start();
    // database-connection :: start
    require('../DATABASE/databaseConnection.php');
    // database-connection :: end
?>


<?php
    if(isset($_POST['eventId'])) {
        $eventId = $_POST['eventId'];
        
        $sql = "DELETE FROM Events WHERE eventId = '$eventId';";
        if(mysqli_query($link,$sql)) {
            $_SESSION["warningMessage"] = "Event Deleted successfully...";
            echo "<script> window.location = '../../addEventPage.php';</script>";
            exit(0);
        }
    }
?>