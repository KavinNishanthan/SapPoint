<?php

    session_start();
    // database-connection :: start
    require('../DATABASE/databaseConnection.php');
    // database-connection :: end
?>


<?php
    if(isset($_POST['sid'])) {
        $sapId = $_POST['sid'];
        
        if($_POST['desc'] != "") {
            $description = $_POST['desc'];
        }
        else {
            $description = "Nil";
        }
        
        $sql = "UPDATE SAP_" . $_SESSION['studentBatch'] . "Batch SET allocatedMark = '0', stateOfProcess = '2',description = '$description' WHERE sapId = '$sapId';";
        mysqli_query($link,$sql);
    }
?>