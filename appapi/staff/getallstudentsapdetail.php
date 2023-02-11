<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
$rollNumber=$_POST['rollNumber'];
$batch=$_POST['studentBatch'];
$semester=$_POST['semester'];
$tableName = "SAP_".$batch."Batch";
$sql="SELECT sapId,studentRollNumber,sapCategory,expectedMark,allocatedMark,stateOfProcess,description,TimeOfUpload,prizeWon,semester,documentTitle,organiser,conductivityMode,conductionCategory FROM $tableName WHERE studentRollNumber='$rollNumber' AND stateOfProcess='1' AND semester = '$semester' ORDER BY TimeOfUpload DESC";
$result=array();
$res=$con->query($sql);
if($res->num_rows>0){
	while($row=$res->fetch_assoc()){
		$result[]=$row;
	}
}
echo json_encode($result);
?>