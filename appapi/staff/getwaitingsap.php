<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
$batch=$_POST['studentBatch'];
$sem=$_POST['semester'];
$studentList=$_POST['studentList'];
$tableName = "SAP_".$batch."Batch";
$list=explode(",",$studentList);
$cond=implode("','", $list);
$val="'$cond'";
$sql="SELECT sapId,studentRollNumber,sapCategory,expectedMark,allocatedMark,stateOfProcess,description,TimeOfUpload,prizeWon,semester,documentTitle,organiser,conductivityMode,conductionCategory FROM $tableName WHERE studentRollNumber IN($val) AND stateOfProcess=0 AND semester=$sem";
$res=array();
$result=$con->query($sql);
if($con->query($sql)){
	while($row=$result->fetch_assoc()){
		$res[]=$row;
	}
}
echo json_encode($res);
?>