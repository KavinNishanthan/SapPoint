<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
$CurrentYear = $_POST['year'];
$CDep = $_POST['CDep'] ;
$sql="SELECT * FROM Circulars where (userCategory=0 OR userCategory=2) AND (yearCircular LIKE '%$CurrentYear%') AND (department LIKE '%$CDep%') ORDER BY timeStamp DESC ";
$res=array();
$result=$con->query($sql);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$res[]=$row;
	}
}
echo json_encode($res);
?>