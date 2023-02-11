<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
$rollNumber=$_POST['rollNumber'];
$sql="SELECT * FROM Student WHERE rollNumber='$rollNumber'";
$res=array();
$result=$con->query($sql);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$res[]=$row;
	}
}
echo json_encode($res);
?>