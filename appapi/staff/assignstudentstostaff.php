<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
$dept=$_POST['department'];
$semester=$_POST['semester'];
$stuyear=$_POST['studentBatch'];
$section=$_POST['section'];
$sql="SELECT rollNumber FROM Student WHERE currentSemester='$semester' AND department='$dept' AND section='$section' AND studentBatch='$stuyear' ";
$res=array();
$result=$con->query($sql);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$res[]=$row;
	}
}
echo json_encode($res);
?>