<?php

    session_start();
    // database-connection :: start
    require('../DATABASE/databaseConnection.php');
    // database-connection :: end
?>


<?php
    if(isset($_POST['amark']) && isset($_POST['sid'])) {
        $sapId = $_POST['sid'];
        $allocatedMark = $_POST['amark'];
        
        $sql = "UPDATE SAP_" . $_SESSION['studentBatch'] . "Batch SET allocatedMark = '$allocatedMark', stateOfProcess = '1' WHERE sapId = '$sapId';";
        mysqli_query($link,$sql);
    }
?>