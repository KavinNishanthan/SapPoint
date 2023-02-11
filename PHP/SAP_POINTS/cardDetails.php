<?php

    session_start();
    
    // database-connection :: start
    require('../DATABASE/databaseConnection.php');
    // database-connection :: end
    
?>

<?php

    if(isset($_POST['sapId']) && isset($_POST['rollNumber'])) {
        $sapId = $_POST['sapId'];
	$rollNumber = $_POST['rollNumber'];
        $studentBatch = $_SESSION['studentBatch'];
        $sql = " SELECT * FROM SAP_" . $studentBatch . "Batch WHERE sapId = '$sapId';";
        $result = mysqli_fetch_array(mysqli_query($link,$sql));
            echo "<div class='doc-detail-container'>
                        <div class='title-container'>" . strtoupper($result['documentTitle']) . "</div>
                        <div class='desc-container'>" . $result['description'] . "</div>
                        <div class='expected-mark'>Expected Mark : <span class='mark' id='emark'>" . $result['expectedMark'] . "</span></div>
                        <div class='expected-mark'>Allocated Mark : <span class='mark'><input id='amark' type='text' value='" . $result['expectedMark'] . "' ></span><i class='fa-solid fa-pen' id='edit'></i></div>
                    </div>
                    <div class='button-container'>
                        <button class='btn reject-button' onclick = documentReject('" . $sapId . "','" . $rollNumber . "')>REJECT</button>
                        <button class='btn accept-button' onclick = documentAccept('" . $sapId . "','" . $rollNumber . "')>ACCEPT</button>
                        <button class='btn open-button' onclick=documentOpen('" . $sapId . "')>OPEN PDF</button>
                        
                    </div>";
    }
    
?>