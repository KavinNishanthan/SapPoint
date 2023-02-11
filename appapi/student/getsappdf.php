<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
$id= (int)$_POST["sapId"];
$batch=$_POST["batch"];
$table = "SAP_".$batch."Batch";
$sql= "SELECT sapDocument FROM `$table` WHERE `$table`.`sapId` = $id " ;
$res=array();
$result=$con->query($sql);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$res[]=$row;
	}
}
echo json_encode($res);
?>