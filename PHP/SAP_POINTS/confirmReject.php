<?php

    if(isset($_POST['sid']) && isset($_POST['rollNumber'])) {
        $sapId = $_POST['sid'];
	$rollNumber = $_POST['rollNumber'];
                echo "<div class='confirm-detail-container'>
                        <h4>Are you sure want to Reject ?</h4>
                    </div>
		    <div id='commentContainer'>
                        <div class='form-group'>
                                <div class='col-sm-10 col-md-8 input-fields'>
                                    <input type='text' id='description' placeholder='Add comment' class='form-control' maxlength='200'>
                                </div>
                            </div>
                    </div>
                    <div class='button-container1'>
                        <button class='btn no-button' onclick = confirmCancel()>CANCEL</button>
                        <button class='btn yes-button' onclick = documentRejectConfirm('" . $rollNumber . "','" . $sapId . "')>OK</button>
                    </div>";
    }
    
?>