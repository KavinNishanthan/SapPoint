<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
$id=$_POST['rollNumber'];
$semester=$_POST['semester'];
$batch=$_POST['studentBatch'];
$tableName = "SAP_".$batch."Batch";
$sql="SELECT sapId,studentRollNumber,sapCategory,expectedMark,allocatedMark,stateOfProcess,description,TimeOfUpload,prizeWon,semester,documentTitle,organiser,conductivityMode,conductionCategory FROM $tableName WHERE studentRollNumber='$id' AND semester='$semester' ORDER BY TimeOfUpload DESC";
$result=array();
$res=$con->query($sql);
if($res->num_rows>0){
	while($row=$res->fetch_assoc()){
		$result[]=$row;
	}
}
echo json_encode($result);
?>