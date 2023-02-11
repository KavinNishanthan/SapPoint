<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
$batch=$_POST['studentBatch'];
$semester=$_POST['semester'];
$studentList=$_POST['studentList'];
$tableName = "SAP_".$batch."Batch";
$list=explode(",",$studentList);
$cond=implode("','", $list);
$val="'$cond'";

$sql="SELECT studentRollNumber,SUM(allocatedMark) FROM $tableName WHERE stateOfProcess='1' AND semester=$semester AND studentRollNumber in($val) GROUP BY studentRollNumber ORDER BY studentRollNumber";
$res=array();
$result=$con->query($sql);
if($con->query($sql)){
	while($row=$result->fetch_assoc()){
		$res[]=$row;
	}
}
echo json_encode($res);
?>