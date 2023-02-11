<?php

    session_start();
    // database-connection :: start
    require('../DATABASE/databaseConnection.php');
    // database-connection :: end
?>


<?php
    if(isset($_POST['circularNumber'])) {
        $circularNumber = $_POST['circularNumber'];
        
        $sql = "DELETE FROM Circulars WHERE circularNumber = '$circularNumber';";
        if(mysqli_query($link,$sql)) {
            $_SESSION["warningMessage"] = "Circular Deleted successfully...";
            echo "<script> window.location = '../../circularPage.php';</script>";
            exit(0);
        }
    }
?>