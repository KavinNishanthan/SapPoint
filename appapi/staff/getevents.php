<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
$sql="SELECT * FROM Events ";
$res=array();
$result=$con->query($sql);

if($result){
	while($row=$result->fetch_assoc()){
	    $row['eventImage'] = base64_encode($row['eventImage']);
		$res[]=$row;
	}
}
echo json_encode($res);
?>