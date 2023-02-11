<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
$year = $_POST['year'];
$dep = $_POST['dep'];
$sql="SELECT * FROM Events ORDER BY dateOfEvent DESC ";
$res=array();
$result=$con->query($sql);

if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
	    $row['eventImage']= base64_encode($row['eventImage']);
		$res[]=$row;
	}
}
echo json_encode($res);

?>