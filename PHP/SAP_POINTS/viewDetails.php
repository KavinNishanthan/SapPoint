<?php
    session_start();
    require("../DATABASE/databaseConnection.php");
?>

<?php
    if(isset($_POST['sid'])) {
        $sapId = $_POST['sid'];
	$studentBatch = $_SESSION['studentBatch'];
        $sql = "SELECT * FROM SAP_" . $studentBatch . "Batch WHERE sapId = '$sapId';";
        $result = mysqli_fetch_array(mysqli_query($link,$sql));
        echo "<div class='document-detail-container' id='documentDetail'>
			<div class='title-container'>" . strtoupper($result['documentTitle']) . "</div>
                        <div class='desc-container'>" . $result['description'] . "</div>
			<div class='expected-mark'>Expected Mark : <span class='mark' id='emark'>" . $result['expectedMark'] . "</span></div>
                        <div class='allocatedMark'> Allocated Mark : " . $result['allocatedMark'] . "</div>
                   </div>
            <div class='button-container'>";
		if($result["stateOfProcess"] != 1) {
			echo "<button class='btn reject-button' onclick = deleteButton('" . $result['sapId'] . "') id='reject'>DELETE</button>
                <button class='btn edit-button'onclick = editButton('" . $result['sapId'] . "') id='open'>EDIT</button>";
		}
                echo "<button class='btn open-button'onclick = openButton('" . $result['sapId'] . "') id='open'>OPEN PDF</button>
                
            </div>";
    }
?>