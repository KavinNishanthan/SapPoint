<?php
    session_start();
?>

<?php

    // database-connection :: start
    require('../DATABASE/databaseConnection.php');
    // database-connection :: end
?>

<?php
    
    function sendFCM($circularNumber,$circularTitle,$circularTopic) {

        $url = 'https://fcm.googleapis.com/fcm/send';
        $apiKey = 'AAAAUNTqziw:APA91bGg1jr6xMuBU-ok-oIJ3zIsDii_nx8dp6Wk_zuSpAgwCNM1WRjvVf8hAD8l8CUJh0cCCDcF84XF6awaNVkr-UyxrIjG89Wr9hscwaM32NOgB3zaUAVK-DxY4WVQjFtxgbknXNum';
    
        $headers = array(
            'Authorization:key = ' . $apiKey,
            'Content-Type:application/json'
        );
    
        $notificationData = [
            'title' => ucwords($circularNumber),
            'body' => ucwords($circularTitle)
        ];
    
        $notificationBody = [
            'notification' => $notificationData,
            'time_to_live' => 86400,
            'to' => '/topics/' . $circularTopic
        ];
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($notificationBody));
        $result = curl_exec($ch);
        curl_close($ch);
    }
    
    if(isset($_POST['upload'])) {
        $circularNumber = strtolower(mysqli_real_escape_string($link,$_POST["circularNumber"]));
        $circularTitle = strtolower(mysqli_real_escape_string($link,$_POST["circularTitle"]));
        $circularDescription = mysqli_real_escape_string($link,$_POST["circularDescription"]);
        $dept = $_POST["department"];
        $yr = $_POST["year"];
        $userCategory = mysqli_real_escape_string($link,$_POST["userCategory"]);
        $documentLink = mysqli_real_escape_string($link,$_POST["documentLink"]);
        
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$documentLink)) {
            $_SESSION["errorMessage"] = "Invalid Document Link...";
            echo "<script> window.location = '../../circularPage.php';</script>";
            exit(0);
        }
    
        $department = "";
        if($dept[0] == "ALL") {
            $department = "CE,MECH,MTA,AU,CHE,FT,EEE,EIE,ECE,CSE,IT,CSD,AIML,AIDS";
        }
        else {
            foreach($dept as $d) {
                $department .= $d . ",";
            }
            $department = substr_replace($department,"",-1);
        }
        
        $year = "";
        if($yr[0] == "ALL") {
            $year = "1,2,3,4";
        }
        else {
            foreach($yr as $y) {
                $year .= $y . ",";
            }
            $year = substr_replace($year,"",-1);
        }
        
        $sql = "INSERT INTO Circulars (circularNumber,circularTitle,circularDescription,department,yearCircular,userCategory,documentLink) VALUES ('$circularNumber','$circularTitle','$circularDescription','$department','$year','$userCategory','$documentLink');";
        if(mysqli_query($link,$sql)) {
	    if($userCategory == "1") {
                sendFCM($circularNumber,$circularTitle,"circular");
            }
            else{
                sendFCM($circularNumber,$circularTitle,"circular");
                if($yr[0] == "ALL") {
                    for($i = 1; $i <= 4; $i++) {
                        $circularTopic =  "circular".$i;
			echo $circularTopic;

                        sendFCM($circularNumber,$circularTitle,$circularTopic);
                    }
                }
                else {
                    foreach($yr as $y) {
                        $circularTopic = "circular".$y;
			echo $circularTopic;
                        sendFCM($circularNumber,$circularTitle,$circularTopic);
                    }
                }
            }
		
           $_SESSION["successMessage"] = "Circular released successfully...";
            echo "<script> window.location = '../../circularPage.php';</script>";
            exit(0);
        }
        else {
            $_SESSION["errorMessage"] = "Oops! circular failed...";
            echo "<script> window.location = '../../circularPage.php';</script>";
            exit(0);
        }
    }
?>

