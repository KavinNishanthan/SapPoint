<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
$staffId=$_POST['staffId'];
$sql="SELECT * FROM Staff WHERE staffId='$staffId'";
$res=array();
$result=$con->query($sql);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$res[]=$row;
	}
}
echo json_encode($res);
?>