<?php
include 'config.php';
$return["error"] = false;
$return["msg"] = "";
$return["success"] = false;
$return["name"] = "";
$return["result"] = "";
$return["dfile"] = "";
$return["save"] = "";


if(isset($_FILES["file"])){

	$target_dir = "files/";
	$filename = $_FILES["file"]["name"]; 
	$savefile = "$target_dir/$filename";
	$file = $_FILES["file"];

	
	
	
        	$return["save"] = "Done Saving";

		$sql = " INSERT INTO `test`(`pdffile`, `Kavin`) VALUES ('$file','lkj'); ";
		$result=$con->query($sql);
		$return["name"] = $filename;
		$return["result"] = $result;
		$return["dfile"] = $file;
		if($result===true)
		{
			 $return["error"] = false;
		}
		else
		{
			$return["error"] = true;
      			$return["msg"] =  "Error during uploding file.";
		}

	
}
else{
    $return["error"] = true;
    $return["msg"] =  "No file is sublitted.";
}

header('Content-Type: application/json');
echo json_encode($return);
?>