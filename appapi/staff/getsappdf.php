<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
$id=$_POST['sapId'];
$batch=$_POST['studentBatch'];
$tableName = "SAP_".$batch."Batch";
$sql="SELECT sapDocument FROM $tableName WHERE sapId='$id'";
$res=array();
$result=$con->query($sql);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		//$row['document'] = base64_encode($row['document']);
		$res[]=$row;
	}
}
echo json_encode($res);
?>