<?php

    session_start();
    // database-connection :: start
    require('../DATABASE/databaseConnection.php');
    // database-connection :: end
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta :: start -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- meta :: end -->

    <!-- stylesheetLink :: start -->
    <link rel="stylesheet" href="../../CSS/addStudentPage.css" type="text/css">
    <!-- stylesheetLink :: end -->

    <!-- bootstrapCDNLink :: start -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- bootstrapCDNLink :: end -->

    <!-- fontawesomeCDNLink :: start -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <!-- fontawesomeCDNLink :: end -->

    <!-- googleFontsCDNLink :: start -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
    <!-- googleFontsCDNLink :: start -->

    <!-- jQueryLink :: start -->
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <!-- jQueryLink :: end -->

    <!-- title :: start -->
    <title>Profile</title>
    <!-- title :: end -->

</head>

<body>
    <!-- navBar :: start -->
    <nav role="navigation" class="navbar navbar-dark bg-dark navbar-fixed-top">
        <div class="container-fluid">
            <!-- navbar-header :: start -->
            <div class="navbar-header">
                <!-- navbar-brand :: start -->
                <div class="navbar-brand">
                    <!-- logo-container :: start -->
                    <div class="logo-container">
                        <img src="../../IMAGES/kecLogo.jpg" alt="KEC" />
                    </div>
                    <!-- logo-container :: end -->
                </div>
                <!-- navbar-brand :: start -->

                <!-- toggle-container :: start -->
                <div class="toggle-container">
                    <!-- toggle-button :: start -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar bg-success"></span>
                        <span class="icon-bar bg-success"></span>
                        <span class="icon-bar bg-success"></span>
                    </button>
                    <!-- toggle-button :: end -->
                </div>
                <!-- toggle-container :: end -->
            </div>
            <!-- navbar-header :: end -->

            <!-- navbar-menus-container :: start -->
            <div class="navbar-menus-container">
                <!-- navbar-collapse :: start -->
                <div class="navbar-collapse collapse" id="navbarCollapse">
                    <!-- navbar-menus :: start -->
                    <ul class="nav navbar-nav navbar-left menu-items">
                        <li><a href="../../index.php">Home</a></li>
                        <li><a href="../../eventPage.php">Events</a></li>
                        <li><a href="../../circularPage.php">Add Circulars</a></li>
			<li><a href="../../addEventPage.php">Add Events</a></li>
                        <li><a href="../../aboutusPage.php">About us</a></li>
                    </ul>
                    <!-- navbar-menus :: end -->

                    <!-- profile-container :: start -->
                    <div class="profile-container">
                        <div class="dropdown">
                            <button onclick="profileFunction()" class="dropbtn"><i class="fa-regular fa-user"></i>  <?= ucwords($_SESSION['staffName']) ?> <i class="fa-solid fa-angle-down down-angle"></i></button>
                            <div id="myDropdown" class="dropdown-content">
                                <div class="profile">
                                    <div class="image-container">
                                        <img src="../../IMAGES/avatar.png" alt="Profile"/>
                                    </div>
                                    <a id="profile-name" href="../../profilePage.php"><?= $_SESSION['staffEmail'] ?></a>
                                </div>
                                <a href="../../profilePage.php"><i class="fa-solid fa-user-pen"></i> User Info</a>
                                <a href="../../getReportPage.php"><i class="fa-solid fa-file-export"></i> Get Report</a>
                                <a href="../../studentInfoPage.php"><i class="fa-solid fa-circle-info"></i> Student Info</a>
                                <a href="../../addStaffPage.php"><i class="fa-solid fa-user-plus"></i> Add Staff</a>
                                <a href="../../addStudentPage.php"><i class="fa-solid fa-user-plus"></i> Add Student</a>
                                <a href="../LOGOUT/logout.php"><i class="fa-solid fa-power-off"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- profile-container :: end -->
                </div>
                <!-- navbar-collapse :: end -->
            </div>
            <!-- navbar-menus-container :: end -->


        </div>
    </nav>
    <!-- navBar :: end -->

    <!--main :: start-->
    <main>
        <div class="addStudent-container">
            <?php

                use PHPMailer\PHPMailer\PHPMailer;
                use PHPMailer\PHPMailer\SMTP;
                use PHPMailer\PHPMailer\Exception;
                
                //Load Composer's autoloader
                require 'vendor/autoload.php';
            
                function sendEmail($staffEmail,$staffName,$password) {
                    $mail = new PHPMailer();
                    $mail->isSMTP();
                    $mail->Host = "smtp.gmail.com";
                    $mail->SMTPAuth = true;
                    $mail->Username = "mykec@kongu.edu";
                    $mail->Password = "kongu@2040";
                    $mail->Port = 465;
                    $mail->SMTPSecure = "ssl";
                    $mail->isHTML(true);
                    $mail->setFrom("mykec@kongu.edu","my_kec");
                    $mail->addAddress($staffEmail);
                    $mail->Subject = "Account activation";
                    $mail->Body = "<div>
                                    <h4>Hey " . ucwords($staffName) . " !</h4>
                                    <p>You have been successfully added to the MY KEC application.</p>
                                    <p>Welcome to our application! Happy journey,</p>
                                    <h5>Login credentials:-</h5>
                                    <p>Your Email : " . $staffEmail . "</p>
                                    <p>Your Passcode : " . $password . "</p>
                                    <a href='https://mykec.kongu.edu'>Click here</a>
                                </div>";
                    if($mail->send()) {
                        echo '<div class="alert alert-success alert-dismissible fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong> Mail sent to ' . $staffEmail . ' </strong>
                                </div>';
                    }
                    else {
                        echo "Something is wrong" . $mail->ErrorInfo;
                    }
                }
                
                function randomPassword() {
                    $alpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                    return substr(str_shuffle($alpha),0,8);
                }
                
                if(isset($_POST['add'])) {
                    
                    $staffEmail = $_SESSION['staffEmail'];
		    if($_SESSION['designation'] == 4) {
			$sql = "SELECT department FROM Staff WHERE staffEmail = '$staffEmail';";
                    	$result = mysqli_fetch_array(mysqli_query($link,$sql));
			$staffDepartment = $result[0];
		    }
                    $json_data = file_get_contents('https://script.google.com/macros/s/AKfycbzZKi4pQ6G6eg0smLTplDsook79Qn0WGIkN8dr0NUkPHw46SM47f1JgbHKeybJfMQAu/exec');
                
                    $response_data = json_decode($json_data);
                    
                    foreach ($response_data as $user) {
                        $staffId = $user->id;
                        $staffName = strtolower($user->name);
                        $staffEmail = $user->email;
                        $desig = strtolower($user->designation);
                        if($desig == "class advisor") {
                            $designation = 1;
                        }
                        else if($desig == "teaching") {
                            $designation = 2;
                        }
                        else if($desig == "non teaching") {
                            $designation = 3;
                        }
			else {
			    $designation = 4;
			}
                        $studentBatch = $user->studentbatch;
                        $department = $user->department;
                        $section = $user->section;
                        $semester = $user->semester;
                        $password = randomPassword();
                        $passcode = md5($password);
			$verifyToken = md5(rand());
                        
                        if($staffId != "" && $staffName != "" && $staffEmail != "" && $studentBatch != "" && $department != "" && $designation != "") {
                      	  if($_SESSION['designation'] == 4) {
                            if($staffDepartment == $department) {
                                
                                $sql = "SELECT * FROM Staff WHERE staffEmail = '$staffEmail';";
                                $result = mysqli_query($link,$sql);
                                if(mysqli_num_rows($result) > 0) {
                                    echo '<div class="alert alert-danger alert-dismissible fade in">
                                            <a href="#" class="close cancel" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong> ' . $staffEmail . ' already exists!</strong>
                                            </div>';
                                }
                                else {
                                    $sql = "INSERT INTO Staff (staffId,staffName,staffEmail,department,designation,passcode,currentSemester,section,studentBatch,verifyToken) VALUES ('$staffId','$staffName','$staffEmail','$department','$designation','$passcode','$semester','$section','$studentBatch','$verifyToken');";
                    	
                            	    if(mysqli_query($link,$sql)) {
                            	        sendEmail($staffEmail,$staffName,$password);
                            	    }
                            	    else {
                            	        echo mysqli_error($link);
                            	    }
                                }
                            }
                            else {                                
                                echo '<div class="alert alert-danger alert-dismissible fade in">
                                            <a href="#" class="close cancel" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Unable to add ' . $staffId . '! Please check the department and section</strong>
                                            </div>';
                            }
			  }
			  else {
				$sql = "INSERT INTO Staff (staffId,staffName,staffEmail,department,designation,passcode,currentSemester,section,studentBatch,verifyToken) VALUES ('$staffId','$staffName','$staffEmail','$department','$designation','$passcode','$semester','$section','$studentBatch','$verifyToken');";
                    	
                            	if(mysqli_query($link,$sql)) {
                            	    sendEmail($staffEmail,$staffName,$password);
                            	}
                            	else {
                            	    echo mysqli_error($link);
                            	}

			   }
                        }
                    	else {
                    	     if($staffId == "" && $staffName == "" && $staffEmail == "" ) {
                    	         echo '<div class="alert alert-danger alert-dismissible fade in">
                                            <a href="#" class="close cancel" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Unable to add staff ! Please check the credentials</strong>
                                            </div>';
                    	     }
                    	     else {
                    	         if($staffId != "") {
                    	            echo '<div class="alert alert-danger alert-dismissible fade in">
                                            <a href="#" class="close cancel" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Unable to add ' . $staffId . ' ! Please check the credentials</strong>
                                            </div>';
                    	         }
                    	         else if($staffName != "") {
                    	             echo '<div class="alert alert-danger alert-dismissible fade in">
                                            <a href="#" class="close cancel" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Unable to add ' . $staffName . ' ! Please check the credentials</strong>
                                            </div>';
                    	         }
                    	         else if($staffEmail != "") {
                    	             echo '<div class="alert alert-danger alert-dismissible fade in">
                                            <a href="#" class="close cancel" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Unable to add ' . $staffEmail . ' ! Please check the credentials</strong>
                                            </div>';
                    	         }
                    	     }
                    	}
                    }
                }
            
        ?>
        </div>
    </main>
    <!--main :: end-->
    
    <!-- javascriptLink :: start -->
    <script src="../../JAVASCRIPT/profilePage.js"></script>
    <!-- javascriptLink :: end -->

</body>

</html>