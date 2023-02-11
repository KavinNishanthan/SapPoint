<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta :: start -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- meta :: end -->

    <!-- stylesheetLink :: start -->
    <link rel="stylesheet" href="CSS/studentDetailPage.css" type="text/css">
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

    <!-- title :: start -->
    <title>Students</title>
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
    <main class="get-report-page">
        <section class="report-container">
            <div class="container-fluid header-container">
                <div class="form-group">
                    <div class="col-sm-10 col-md-8 input-fields">
                        <input type="text" id="search" placeholder="Search" class="form-control">
                    </div>
                </div>
                <div class="reports-container">
                    <?php
                            echo '<form class="form-horizontal" id="filterClass">
                                <div class="report-details">
                                    <div class="department-container">';
                                        if($_SESSION['designation'] == 5) {
                                            echo '<div class="form-group">
                                                    <select class="form-control" name="department">
                                                        <option>DEPARTMENT</option>
                                                        <option value="ALL">All</option>
                                                        <option value="CE">Civil Engineering</option>
                                                        <option value="MECH">Mechanical Engineering</option>
                                                        <option value="MTA">Mechatronics Engineering</option>
                                                        <option value="AU">Automobile Engineering</option>
                                                        <option value="CHE">Chemical Engineering</option>
                                                        <option value="FT">Food Technology</option>
                                                        <option value="EEE">Electrical and Electronics Engineering</option>
                                                        <option value="EIE">Electronics and Instrumentation Engineering</option>
                                                        <option value="ECE">Electronics and Communication Engineering</option>
                                                        <option value="CSE">Computer Science and Engineering</option>
                                                        <option value="IT">Information Technology</option>
                                                        <option value="CSD">Computer Science and Design</option>
                                                        <option value="AIML">Artificial Intelligence and Machine Learning</option>
                                                        <option value="AIDS">Artificial Intelligence and Data Science</option>
                                                    </select>
                                                </div>';
                                        }
                                    echo '</div>
                                    
                                    <div class="form-group">
                                        <select class="form-control" name="section">
                                            <option>SECTION</option>
                                            <option value="ALL">All</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <select class="form-control" name="semester">
                                            <option>SEMESTER</option>
                                            <option value="ALL">All</option>
                                            <option value="1">I</option>
                                            <option value="2">II</option>
                                            <option value="3">III</option>
                                            <option value="4">IV</option>
                                            <option value="5">V</option>
                                            <option value="6">VI</option>
                                            <option value="7">VII</option>
                                            <option value="8">VIII</option>
                                        </select>
                                    </div>';
                                    
                                    if($_SESSION['designation'] == 5) {
                                        echo '<button type="button" name="change" class="btn upload-button" id="uploadButton" onclick="adminFilter()">CHANGE</button>';
                                    }
                                    else {
                                        echo '<button type="button" name="change" class="btn upload-button" id="uploadsButton" onclick="hodFilter()">CHANGE</button>';
                                    }
                                
                                echo '</div>
                            </form>';
                    ?>
                </div>
            </div>
            
            <!-- black-overlay1 :: start -->
            <div id='black-overlay1' class='black-overlay1'></div>
            <!-- black-overlay1 :: end -->
            
            <!-- myModal :: start -->
            <div id='myModal' class='myModal'>
                <div class='myModal-navbar'>Delete Student<div class='close-container'><i onclick="Cancel()" id='close' class="fa-solid fa-xmark"></i></div></div>
               
                <div class="confirm-container">
                    <div class='confirm-detail-container'>
                        Are you sure want to delete ?
                    </div>
                    
                    <div class='button-container1'>
                        <button class='btn no-button' id='creject'>CANCEL</button>
                        <button class='btn yes-button' id='caccept'>OKAY</button>
                    </div>
                </div>
            </div>
            <!-- myModal :: end -->
            
            <div class="detail-container">
                <?php
                    include('PHP/DATABASE/warningMessage.php');
                    include('PHP/DATABASE/successMessage.php');
		    include('PHP/PROFILE/studentDetail.php');
                ?>
            </div>
            
            <?php
                include('PHP/DATABASE/warningMessage.php');
                include('PHP/DATABASE/successMessage.php');
            ?>
            <div class="detail-container1">
                
            </div>
            
            <!-- myModal1 :: start -->
        <div class='myModal1' id="myModal1">
            <!--title-bar :: start-->
            <div class="row">
                <div class="col-sm-10 col-md-6">
                    <h4>EDIT STUDENT</h4>
                </div>
                <div class="icon">
                    <ul>
                        <li onclick="cancel()"><i class="fa-solid fa-xmark col-sm-2"></i></li>
                    </ul>
                </div>
            </div>
            <!--title-end :: end-->
            
            <div class="form-container">
                
            </div>
                
        </div>
        <!-- myModal1 :: end -->
        
        </section>
    </main>
    <!--main :: end-->
    
    <script src="JAVASCRIPT/studentDetailPage.js"></script>
    
</body>

</html>