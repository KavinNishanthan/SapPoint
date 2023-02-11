<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
$rollNo = $_POST['rollNo'];
$batch  = $_POST['batch'];
$sem = $_POST['sem'];
$table = "SAP_".$batch."Batch";
$sql="SELECT `sapId`, `studentRollNumber`, `sapCategory`, `expectedMark`, `allocatedMark`, `stateOfProcess`, `description`, `TimeOfUpload`, `prizeWon`, `semester`, `documentTitle`, `organiser`, `conductivityMode`, `conductionCategory` FROM $table where studentRollNumber='$rollNo' AND semester = '$sem' ";
$res=array();
$result=$con->query($sql);
if($con->query($sql)){
	while($row=$result->fetch_assoc()){
		$res[]=$row;
	}
	echo json_encode($res);
}
else{
    echo "no data found";
}
?>