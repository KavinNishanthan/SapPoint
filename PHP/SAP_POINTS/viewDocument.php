<?php
    session_start();
    require("../DATABASE/databaseConnection.php");
?>

<?php
    if(isset($_POST['sid'])) {
        $sapId = $_POST['sid'];
        $studentBatch = $_SESSION['studentBatch'];
        
        $sql = "SELECT sapDocument FROM SAP_" . $studentBatch . "Batch WHERE sapId = '$sapId';";
        $result = mysqli_fetch_array(mysqli_query($link,$sql));
        
        echo "<embed src='data:application/pdf;base64," . $result['sapDocument'] . "' class='sap-document' />";
    }
?>