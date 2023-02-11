<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
$sql="SELECT * FROM Circulars where DATEDIFF(CURDATE(),timeStamp) <= 50 ORDER BY timeStamp DESC";
$res=array();
$result=$con->query($sql);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$res[]=$row;
	}
}
echo json_encode($res);
?>