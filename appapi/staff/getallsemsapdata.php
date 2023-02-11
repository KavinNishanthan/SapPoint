<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
$id=$_POST['rollNumber'];
$batch=$_POST['studentBatch'];
$tableName = "SAP_".$batch."Batch";
$sql="SELECT semester,SUM(allocatedMark) FROM $tableName WHERE studentRollNumber='$id' AND stateOfProcess=1 GROUP BY semester ORDER BY semester";
$result=array();
$res=$con->query($sql);
if($res->num_rows>0){
	while($row=$res->fetch_assoc()){
		$result[]=$row;
	}
}
echo json_encode($result);
?>