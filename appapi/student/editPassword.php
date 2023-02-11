<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
$email=$_POST['email'];
$pass=$_POST['pass'];
// echo json_encode($email);
// echo json_encode($pass);
$sql=" UPDATE `Student` SET `passcode` = '$pass' WHERE `Student`.`studentEmail` = '$email' ";
$result=$con->query($sql);
if($result===true){
	echo ("Successfully Done");
}else{
    echo ('not Successfully Done');
}

?>