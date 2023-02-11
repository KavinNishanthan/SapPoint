<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta :: start -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="IMAGES/kec_icon.png">

    <!-- meta :: end -->

    <!-- stylesheetLink :: start -->
    <link rel="stylesheet" href="CSS/profilePage.css" type="text/css">
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
    
    <!-- html2PDFLink :: start -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- html2PDFLink :: end -->

    <!-- title :: start -->
    <title>Profile</title>
    <!-- title :: end -->

</head>

<body>
    <!-- navBar :: start -->
       <nav role="navigation" class="navbar navbar-dark bg-dark navbar-fixed-top circle">
        <div class="container-fluid">
            <!-- navbar-header :: start -->
            <div class="navbar-header">
                <!-- navbar-brand :: start -->
                <div class="navbar-brand">
                    <!-- logo-container :: start -->
                    <div class="logo-container">
                        <img src="IMAGES/kecLogo.jpg" alt="KEC" />
                    </div>
                    <!-- logo-container :: end -->
                </div>
                <!-- navbar-brand :: start -->

                <!-- toggle-container :: start -->
                <div class="toggle-container">
                    <!-- toggle-button :: start -->
                    <button type="button" class="navbar-toggle tg toggles" data-toggle="collapse" data-target="#navbarCollapse">
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
                    <ul class="nav navItems navbar-nav navbar-left menu-items">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="eventPage.php">Events</a></li>
                        <?php
                            if(isset($_SESSION['staffEmail'])  ) {
                                if($_SESSION['designation'] == 5 || $_SESSION['designation'] == 4) {
                                    echo '<li><a href="circularPage.php">Add Circulars</a></li>';
                                    echo '<li><a href="addEventPage.php">Add Events</a></li>';
                                }
				else {
					 echo '<li><a href="sappointPage.php">SAP Points</a></li>';
				}
                               
                            }
                            if(isset($_SESSION['studentEmail'])) {
                                echo '<li><a href="sappointsPage.php">SAP Points</a></li>';
                            }
                        ?>
                        <li><a href="aboutusPage.php">About us</a></li>
                    </ul>
                    <!-- navbar-menus :: end -->
		    <!-- profile-container :: start -->
                    <?php
                        if(isset($_SESSION['staffEmail'])) {
                            echo '<div class="profile-container">
                                    <div class="dropdown">
                                        <button onclick="profileFunction()" class="dropbtn"><i class="fa-regular fa-user"></i> ';
                                            echo ucwords($_SESSION["staffName"]);
                                            echo ' <i class="fa-solid fa-angle-down down-angle"></i></button>
                                        <div id="myDropdown" class="dropdown-content">
                                            <div class="profile">
                                                <div class="image-container">
                                                    <img src="IMAGES/avatar.png" alt="Profile"/>
                                                </div>
                                                <a id="profile-name" href="profilePage.php">';
                                                echo $_SESSION["staffEmail"];
                                                echo '</a>
                                            </div>
                                            <a href="profilePage.php"><i class="fa-solid fa-user-pen"></i> User Info</a>';
                                            if($_SESSION['designation'] == 1 || $_SESSION['designation'] == 4 || $_SESSION['designation'] == 6 || $_SESSION['designation'] == 5) {
                                                echo '<a href="getReportPage.php"><i class="fa-solid fa-book"></i> Student Report</a>
						    <a href="addStudentPage.php"><i class="fa-solid fa-user-plus"></i> Add Student</a>';
                                            }
                                            
                                            if($_SESSION['designation'] == 4 || $_SESSION['designation'] == 5) {
                                                echo '<a href="addStaffPage.php"><i class="fa-solid fa-user-plus"></i> Add Staff</a>';
                                            }
                                            echo '<a href="PHP/LOGOUT/logout.php"><i class="fa-solid fa-power-off"></i> Logout</a>
                                        </div>
                                    </div>
                                </div>';
                        }
                        else if(isset($_SESSION['studentEmail'])) {
                            echo '<div class="profile-container">
                                    <div class="dropdown">
                                        <button onclick="profileFunction()" class="dropbtn"><i class="fa-regular fa-user"></i> ';
                                            echo ucwords($_SESSION["studentName"]);
                                            echo ' <i class="fa-solid fa-angle-down down-angle"></i></button>
                                        <div id="myDropdown" class="dropdown-content">
                                            <div class="profile">
                                                <div class="image-container">
                                                    <img src="IMAGES/avatar.png" alt="Profile"/>
                                                </div>
                                                <a id="profile-name" href="profilePage.php">';
                                                echo $_SESSION["studentEmail"];
                                                echo '</a>
                                            </div>
                                            <a href="profilePage.php"><i class="fa-solid fa-user-pen"></i> User Info</a>';
                                            echo '<a href="PHP/LOGOUT/logout.php"><i class="fa-solid fa-power-off"></i> Logout</a>
                                        </div>
                                    </div>
                                </div>';
                        }
                        else {
                            echo '<ul class="nav navbar-nav navbar-right">
                                    <li class="togs"><a href="loginPage.php"><span class="fa-solid fa-right-to-bracket"></span> Login</a></li>
                                </ul>';
                        }
                    ?>
                    <!-- profile-container :: end -->
            </div>

                </div>
                <!-- navbar-collapse :: end -->
	         
            <!-- navbar-menus-container :: end -->
        </div>
    </nav>

    <!-- navBar :: end -->

    <!--main :: start-->
    <main class="profile-page">

        <section class="left-division">
            <div class="profile-header">
                <div class="image-container">
                    <img src="IMAGES/avatar.png" alt="Profile"/>
                </div>
                <div class="tag-container">Welcome to your profile</div>
            </div>
            <div class="profile-navbar">
                <a href="PHP/LOGOUT/logout.php" id="logout" class="btn logout-button"><i class="fa-solid fa-power-off"></i> Logout</a>
		<a href="../../forgotPasswordPage.php" id="logout" class="btn logout-button"><i class="fa-solid fa-key"></i> Change Password</a>

            </div>
            
        </section>
        
        <section class="right-division">
            <div class="profile-content-container">
                 <?php
                    include('PHP/PROFILE/profileDetails.php');
                    include('PHP/DATABASE/successMessage.php');
                    include('PHP/DATABASE/dangerMessage.php');
                ?>
            </div>
            <div class="report-container">
                <?php
                    if(isset($_SESSION['studentEmail'])) {
                        echo '<button id="report" onclick="getReport()" class="btn"><i class="fa-solid fa-file-export"></i> Get Report</button>';
                    }
                    else if(isset($_SESSION['staffEmail'])) {
                        if($_SESSION["designation"] == 5) {
                            echo '<a href="studentReportPage.php" id="report" class="btn"><i class="fa-solid fa-book"></i> Student Report</a>                                <a href="studentDetailPage.php" id="report" class="btn"><i class="fa-solid fa-circle-info"></i> Student Details</a>
                                <a href="staffDetailPage.php" id="report" class="btn"><i class="fa-solid fa-circle-info"></i> Staff Details</a>
                                <button id="batch" onclick="openBatch()" class="btn"><i class="fa-solid fa-plus"></i> Add Batch</button>
                                <button onclick="changeSemester()" id="report" class="btn"><i class="fa-solid fa-pen"></i> Change semester</button>
				<a href="addDocumentPage.php" id="report" class="btn"><i class="fa-solid fa-circle-info"></i> Add document</a>';

                        }
                        else if($_SESSION["designation"] == 4) {
                            echo '<a href="studentDetailPage.php" id="report" class="btn"><i class="fa-solid fa-circle-info"></i> Student Details</a>
                                <a href="staffDetailPage.php" id="report" class="btn"><i class="fa-solid fa-circle-info"></i> Staff Details</a>
                                <a href="studentReportPage.php" id="report" class="btn"><i class="fa-solid fa-book"></i> Student Report</a>
				<a href="addDocumentPage.php" id="report" class="btn"><i class="fa-solid fa-circle-info"></i> Add document</a>';

                        }
                        else if($_SESSION["designation"] == 6) {
                            echo '<a href="studentReportPage.php" id="report" class="btn"><i class="fa-solid fa-book"></i> Student Report</a>
				<a href="addDocumentPage.php" id="report" class="btn"><i class="fa-solid fa-circle-info"></i> Add document</a>';

                        }

                        else if($_SESSION["designation"] == 1) {
                            echo '<a href="studentReportPage.php" id="report" class="btn"><i class="fa-solid fa-book"></i> Student Report</a>
					<a href="studentDetailPage.php" id="report" class="btn"><i class="fa-solid fa-circle-info"></i> Student Details</a>';
                        }
                    }
                ?>
                
                <!-- myModal :: start -->
                <div class='myModal' id="myModal" style="display:none">
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="text" id="studentBatch" placeholder="Enter Batch" class="form-control" maxlength="4">
                        </div>
                    </div>
                    
                    <div class="button-container">
                        <button onclick="cancel()" class="btn">CANCEL</button>
                        <button id="add" class="btn">ADD</button>
                    </div>
                </div>
                <!-- myModal :: end -->
                
                <!-- myModal1 :: start -->
                <div class='myModal1' id="myModal1" style="display:none">
                    <div class="form-group">
                        <select class="form-control" id="semester" name="semester">
                            <option>SEMESTER</option>
                            <option value="1">I</option>
                            <option value="2">II</option>
                            <option value="3">III</option>
                            <option value="4">IV</option>
                            <option value="5">V</option>
                            <option value="6">VI</option>
                            <option value="7">VII</option>
                            <option value="8">VIII</option>
                        </select>
                    </div>
                    
                    <div class="button-container">
                        <button onclick="cancel()" class="btn">CANCEL</button>
                        <button id="get" class="btn">GET</button>
                    </div>
                </div>
                <!-- myModal1 :: end -->
                
                <!-- myModal3 :: start -->
                <div class='myModal3' id="myModal3" style="display:none;">
                    <div class="select-container">
                        <div class="form-group">
                        From<select class="form-control" id="fromsemester" name="semester">
                            <option>SEMESTER</option>
                            <option value="1">I</option>
                            <option value="2">II</option>
                            <option value="3">III</option>
                            <option value="4">IV</option>
                            <option value="5">V</option>
                            <option value="6">VI</option>
                            <option value="7">VII</option>
                            <option value="8">VIII</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        To<select class="form-control" id="tosemester" name="semester">
                            <option>SEMESTER</option>
                            <option value="1">I</option>
                            <option value="2">II</option>
                            <option value="3">III</option>
                            <option value="4">IV</option>
                            <option value="5">V</option>
                            <option value="6">VI</option>
                            <option value="7">VII</option>
                            <option value="8">VIII</option>
                        </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="text" id="cstudentBatch" placeholder="Enter Batch" class="form-control" maxlength="4">
                        </div>
                    </div>
                    
                    <div class="button-container">
                        <button onclick="cancel()" class="btn">CANCEL</button>
                        <button id="change" class="btn">CHANGE</button>
                    </div>
                </div>
                <!-- myModal3 :: end -->
            </div>
        </section>
        
        <!-- black-overlay1 :: start -->
        <div id='black-overlay1' class='black-overlay1'></div>
        <!-- black-overlay1 :: end -->

        <!-- myModal2 :: start -->
        <div class='myModal2' id="myModal2">
            <!--title-bar :: start-->
            <div class="row">
                <div class="col-sm-10 col-md-6">
                    <h4>STUDENT ACTIVITY POINTS</h4>
                </div>
                <div class="icon">
                    <ul>
                        <li onclick="Cancel()"><i class="fa-solid fa-xmark col-sm-2"></i></li>
                    </ul>
                </div>
            </div>
            <!--title-end :: end-->
            
            <!-- table-container :: start -->
            <div class="table-container" id="tableContainer">
                
                
            </div>
            <!--table-container :: end-->
            
            <button class="btn download-button" onclick = "download()">DOWNLOAD <i class="fa-solid fa-download"></i></button>
                
        </div>
        <!-- myModal2 :: end -->

    </main>
    <!--main :: end-->

    <!-- javascriptLink :: start -->
    <script src="JAVASCRIPT/profilePage.js"></script>
    <!-- javascriptLink :: end -->

</body>

</html>