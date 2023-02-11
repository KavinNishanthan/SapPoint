<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
$email=$_POST['email'];
$pass=$_POST['pass'];
$sql="SELECT * FROM Student where studentEmail='$email'";
$res=array();
$result=$con->query($sql);
if($result->num_rows==1){
	while($row=$result->fetch_assoc()){
		$res[]=$row;
	}
	if($res[0]['passcode']!=$pass){
	    echo json_encode('Wrong password');
	}else{
	    echo json_encode($res);
	}
}else{
    echo json_encode('Account not found');
}

?>