<?php
header("Access-Control-Allow-Origin: *");
include "config.php";
$point=$_POST['point'];
$batch=$_POST['studentBatch'];
$stateOfProcess=$_POST['stateOfProcess'];
$sapid=$_POST['sapid'];
$tableName = "SAP_".$batch."Batch";
$sql="UPDATE $tableName SET allocatedMark = '$point',stateOfProcess='$stateOfProcess' WHERE sapId = $sapid;";
if($con->query($sql) ){
    echo "Success";
}else{
    echo "Failed";
}
?>