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
    <link rel="stylesheet" href="CSS/studentInfoPage.css">
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

        <section class="student-container">
            <!-- search-bar-container :: start -->
            
            <!-- search-bar-container :: end -->
            <div class="toggle-container">
                    <!-- toggle-button :: start -->
                    <button type="button" class="navbar-toggle button" data-toggle="collapse" data-target="#navbarItems">
                        <span class="sr-only">Toggle Navigation</span><i class="fa-solid fa-user"><span>Student Info</span></i>
                      
                    </button>
                    <a class="navbar-brand mr-auto student-info" href="#"></a>
                    <!-- toggle-button :: end -->
                </div>
                <!-- toggle-container :: end -->
            
            <!-- students-list-container :: start -->
            <div class="students-list-container">
               <div class="navbar-collapse collapse" id="navbarItems">
                     <!-- search-form :: start -->
                <div class="form-group">
                                <div class="input-fields ">
                                   <input type="text" id="search" placeholder="Search" class="form-control search-box"><span class="fa-solid fa-magnifying-glass"></span>
                                    
                                </div>
                            </div>
                <!-- search-form :: end -->
                   <ul class="nav flex-column">
                       <?php include('PHP/PROFILE/studentsList.php'); ?>
                   </ul>
               </div>
            </div>
            <!-- students-list-container :: end -->
        </section>
        <!-- student-container :: end -->
        
        <!-- profile-staff-container :: start -->
        <section class="profile-staff-container">
            <!-- profile-header :: start -->
            <div class="profile-header">
                <?php
                    if(isset($_GET['id'])) {
                        $_SESSION['rollNumber'] = $_GET['id'];
                        include('PHP/PROFILE/studentProfileDetails.php');
                    }
                ?>
            </div>
            <!-- profile-header :: end -->
            
            <!-- change-semester :: start -->
                               
            <div class="semester-container">
                
                </span><select id ="semester" name="semester" required>
                    <option value="1">I</option>
                    <option value="2">II</option>
                    <option value="3">III</option>
                    <option value="4">IV</option>
                    <option value="5">V</option>
                    <option value="6">VI</option>
                    <option value="7">VII</option>
                    <option value="8">VIII</option>
                </select>
                <span><button type="submit" class="change-button btn" id="change">CHANGE</button></span>
                <span><button type="submit" class="get-button btn" id="get" onclick = getDetail()>GET REPORT</button></span>
            </div>
            <!-- change-semester :: end -->
    
            <!-- profile-body :: start -->
            <div class="sap-table">
                <?php
                    if(isset($_GET['id'])) {
                        $_SESSION['rollNumber'] = $_GET['id'];
                        include('PHP/PROFILE/sapMarks.php');
                    }
                ?>
            </div>
            <!-- profile-body :: end -->

        </section>
        <!-- profile-staff-container :: end -->
        
        <!-- black-overlay1 :: start -->
        <div id='black-overlay1' class='black-overlay1'></div>
        <!-- black-overlay1 :: end -->

        <!-- myModal1 :: start -->
        <div class='myModal1' id="myModal1">
            <!--title-bar :: start-->
            <div class="row">
                <div class="col-sm-10 col-md-6">
                    <h4>STUDENT ACTIVITY POINTS</h4>
                </div>
                <div class="icon">
                    <ul>
                        <li onclick="cancel()"><i class="fa-solid fa-xmark col-sm-2"></i></li>
                    </ul>
                </div>
            </div>
            <!--title-end :: end-->
            
            <!-- table-container :: start -->
            <div class="table-container" id="tableContainer">
                <?php 
                    
                    if(isset($_GET['id'])) {
                        $rollNumber = mysqli_real_escape_string($link,$_GET['id']);
                        
                        $_SESSION['rollNumber'] = $rollNumber;
                        
                        include('PHP/SAP_POINTS/tableContainer.php'); 
                    }
                    
                ?>
                
            </div>
            <!--table-container :: end-->
            
            <button class="btn download-button" onclick = "download()">DOWNLOAD <i class="fa-solid fa-download"></i></button>
                
        </div>
        <!-- myModal1 :: end -->

    </main>
    <!--main :: end-->

    <!-- javascriptLink :: start -->
    <script src="JAVASCRIPT/studentInfoPage.js"></script>
    <!-- javascriptLink :: end -->

</body>

</html>