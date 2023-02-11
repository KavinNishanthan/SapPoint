<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
$sql="SELECT document FROM SAP_2020Batch WHERE sapId='65'";
$res=array();
$result=$con->query($sql);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$res[]=$row;
	}
}
echo json_encode($res);
?>
