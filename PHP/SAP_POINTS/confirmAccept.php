<?php

    if(isset($_POST['sid']) && isset($_POST['rollNumber']) && isset($_POST['allocatedMark'])) {
        $sapId = $_POST['sid'];
	$rollNumber = $_POST['rollNumber'];
	$allocatedMark = $_POST['allocatedMark'];
                echo "<div class='confirm-detail-container'>
                        <h4>Are you sure want to Accept ?</h4>
                    </div>
                    <div class='button-container1'>
                        <button class='btn no-button' onclick = confirmCancel()>CANCEL</button>
                        <button class='btn yes-button' onclick = documentAcceptConfirm('" . $rollNumber . "','" . $sapId . "','" . $allocatedMark . "')>OK</button>
                    </div>";
    }
    
?>