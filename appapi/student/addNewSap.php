<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");

header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Methods: POST"); header("Access-Control-Max-Age: 3600");

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-with");

$studentRollNumber = $_POST['studentRollNumber'];
$sapCategory= $_POST['sapCategory'];

$doc = $_POST['doc'];
// $doc = base64_decode($doc);
$expectedMark = $_POST['expectedMark'];
$description = $_POST['description'];
$prizeWon=$_POST['prizeWon'];
$semester = $_POST['semester'];
$documentTitle = $_POST['documentTitle'];
$organiser = $_POST['organiser'];
$conductivityMode = $_POST['conductivityMode'];
$conductionCategory = $_POST['conductionCategory'];

$batch=$_POST['batch'];
$table = "SAP_".$batch."Batch";

$sql="INSERT INTO `$table` (`studentRollNumber`, `sapCategory`, `sapDocument`, `expectedMark`, `allocatedMark`, `stateOfProcess`, `description`,`prizeWon`, `semester`, `documentTitle`, `organiser`, `conductivityMode`, `conductionCategory`) VALUES ('$studentRollNumber', '$sapCategory','$doc', '$expectedMark', '0', '0', '$description',  '$prizeWon', '$semester', '$documentTitle', '$organiser', '$conductivityMode', '$conductionCategory');";
$result=$con->query($sql);
if($result===true){
	echo ("Successfully added Done");
}else{
    echo ('not Successfully added not Done');
}

?>
