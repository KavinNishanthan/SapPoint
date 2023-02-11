<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
$id=(int)$_POST['id'];
$batch=$_POST['batch'];
// echo $id;
// echo $batch;
$table = "SAP_".$batch."Batch";
$sql= "DELETE FROM `$table` WHERE `$table`.`sapId` = $id" ;
// $res =  $con->query($sql);
// echo $res;
if($con->query($sql)){
	echo "True";
}
else{
    echo "False";
}
?>