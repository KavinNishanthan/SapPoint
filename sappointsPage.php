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
    <link rel="stylesheet" href="CSS/sappointsPage.css">
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
    <title>Sap Point</title>
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

    <!-- main :: start -->
    <main class="sappoint-page">

        <!-- sap-details-container :: start -->
        <section class="sap-details-container">
                <!-- filter-container :: start -->
                <div class="filter-container">
                    <!-- search-bar-container :: start -->
                    <div class="search-bar-container">
                        <!-- search-form :: start -->
                        <div class="input-group input-fields">
                            <!-- search-value :: start -->
                            <input type="text" id="search" placeholder="Search">
                            <!-- search-value :: end -->
                        </div>
                        <!-- search-form :: end -->
                    </div>
                    <!-- search-bar-container :: end -->
                        
                    <div class="file-container">
                        <div class="icon-container" id="filter1">
                        <div class="dropdown">
                                <div class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                                    <i class="fa-solid fa-filter icon"></i></div>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                    <li>
                                        <div class="dropdown-elements">All</div>
                                    </li>
                                    <li>
                                        <div class="dropdown-elements">Paper Presentation</div>
                                    </li>
                                    <li>
                                        <div class="dropdown-elements">Project Presentation</div>
                                    </li>
                                    <li>
                                        <div class="dropdown-elements">Techno Managerial Events</div>
                                    </li>
                                    <li>
                                        <div class="dropdown-elements">Sports and Games</div>
                                    </li>
                                    <li>
                                        <div class="dropdown-elements">Membership</div>
                                    </li>
                                    <li>
                                        <div class="dropdown-elements">Leadership / Organization Events</div>
                                    </li>
                                    <li>
                                        <div class="dropdown-elements">VAC / Online Courses</div>
                                    </li>
                                    <li>
                                        <div class="dropdown-elements">Project to Paper / Patent Copyright</div>
                                    </li>
                                    <li>
                                        <div class="dropdown-elements">GATE / CAT Govt Exams</div>
                                    </li>
                                    <li>
                                        <div class="dropdown-elements">Placement and Internship</div>
                                    </li>
                                    <li>
                                        <div class="dropdown-elements">Entrepreneurship</div>
                                    </li>
                                    <li>
                                        <div class="dropdown-elements">Social Activities</div>
                                    </li>
                                    <li>
                                        <div class="dropdown-elements">Others (Culturals, Essay etc..)</div>
                                    </li>
                                </ul>
                            </div>
                    </div>
                    <div class="add-file-container">
                        <div class="add-file" onclick="uploadFile()">
                            <i class="fa-solid fa-file-circle-plus"></i>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- filter-container :: end -->
    
                <!-- sap-container :: start -->
                <div class="sap-container">
                    <?php
                        include('PHP/DATABASE/warningMessage.php');
                        include('PHP/DATABASE/successMessage.php');
                        include('PHP/DATABASE/dangerMessage.php');
                        include('PHP/SAP_POINTS/sapsDetails.php');
                    ?>
                </div>
                <!-- sap-container :: start -->
            </div>
            
            <!-- black-overlay :: start -->
            <div id='black-overlay' class='black-overlay'></div>
            <!-- black-overlay :: end -->
            
            <!-- myModal :: start -->
            <div id='myModal' class='myModal'>
                <div class='myModal-navbar'>View Details<div class='close-container'><i id='close' class="fa-solid fa-xmark"></i></div></div>
                <div class="mark-container" id="markContainer">
                    
                </div>
                
                <div class="confirm-container" id="confirmContainer">
                    <div class='confirm-detail-container'>
                        Are you sure want to <span id="ard"></span> ?
                    </div>
                    <div class='button-container1'>
                        <button class='btn no-button' id='creject'>CANCEL</button>
                        <button class='btn yes-button' id='caccept'>OKAY</button>
                    </div>
                </div>
            </div>
            <!-- myModal :: end -->
            
            <!-- conduction-detail-container :: start -->
            <div class="conduction-detail-container">
                <div class="detail-close">
                        <i onclick="detailClose()" class="fa-solid fa-xmark"></i>
                    </div>
                    <div class="detail-container">
                        <div class="online-container">
                            <div class="color-online"></div>
                            <div class="color-detail">Online</div>
                        </div>
                        <div class="online-container">
                            <div class="color-offline"></div>
                            <div class="color-detail">Offline</div>
                        </div>
                        <div class="online-container">
                            <div class="prize"><i class="fa-solid fa-trophy"></i></div>
                            <div class="color-detail">Prize</div>
                        </div>
                    </div>
            </div>
            <!-- conduction-detail-container :: end -->

        </section>
        <!-- sap-details-container :: end -->

        <!-- black-overlay1 :: start -->
        <div id='black-overlay2' class='black-overlay2'></div>
        <!-- black-overlay1 :: end -->

        <!-- myModal1 :: start -->
        <div class='myModal2' id="myModal2">
            <!--title-bar :: start-->
            <div class="row">
                <div class="title">
                    <h4>ADD DOCUMENT</h4>
                </div>
                <div class="icon">
                    <ul>
                        <li onclick="cancel()"><i class="fa-solid fa-xmark col-sm-2"></i></li>
                    </ul>
                </div>
            </div>
            <!--title-end :: end-->
            
            <div class="form-container">
                <form class="form-horizontal" action="PHP/SAP_POINTS/addDocument.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <select class="form-control" name="category" required>
                                <option></option>
                                <option value="1">Paper Presentation</option>
                                <option value="2">Project Presentation</option>
                                <option value="3">Techno Managerial Events</option>
                                <option value="4">Sports and Games</option>
                                <option value="5">Membership</option>
                                <option value="6">Leadership / Organization Events</option>
                                <option value="7">VAC / Online Courses</option>
                                <option value="8">Project to paper / Patent Copyright</option>
                                <option value="9">GATE / CAT / Govt Exams</option>
                                <option value="10">Placement and Internship</option>
                                <option value="11">Entrepreneurship</option>
                                <option value="12">Social Activities</option>
                                <option value="13">Others(Cultural, Essay etc..)</option>
                            </select>
                            <label for="category">Category</label>
                        </div>
                    </div>
            
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <select class="form-control" name="subCategory" required>
                                
                            </select>
                            <label for="subCategory">Sub Category</label>
                        </div>
                    </div>
            
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields prize-won">
                            <select class="form-control" name="prizeWon">
                                <option></option>
                                <option value="0">Participated</option>
                                <option value="1">Prize</option>
                            </select>
                            <label for="prizeWon">Prize</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields conductivity-mode">
                            <select class="form-control" name="conductivityMode" >
                                <option></option>
                                <option value="0">Offline</option>
                                <option value="1">Online</option>
                            </select>
                            <label for="conductivityMode">Conductivity Mode</label>
                        </div>
                    </div>
            
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="text" name="documentTitle" class="form-control" maxlength="50" required>
                            <label for="documentTitle">Document Title</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="text" name="organizer" class="form-control" maxlength="50" required>
                            <label for="organizer">Organizer</label>
                        </div>
                    </div>
            
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <textarea type="text" name="description" class="form-control" maxlength="250" rows="3" required></textarea>
                            <label for="description">Description</label>
                        </div>
                    </div>
            
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="number" name="expectedMark" class="form-control" maxlength="5" required>
                            <label for="expectedMark">Expected Mark</label>
                        </div>
                    </div>
            
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="file" name="sapDocument" id="sapDocument" class="form-control" required>
                            <label for="sapDocument">Proof Document</label>
                        </div>
                    </div>
            
                    <div class="submit-button-container">
                        <button type="reset" class="btn reset-button">CANCEL</button>
                        <button type="submit" name="upload" class="btn upload-button">UPLOAD</button>
                    </div>
                </form>

            </div>
                
        </div>
        <!-- myModal1 :: end -->
        
        <div class='myModal4' id="myModal4">
            <!--title-bar :: start-->
            <div class="row">
                <div class="col-sm-10 col-md-6">
                    <h4>EDIT DOCUMENT</h4>
                </div>
                <div class="icon">
                    <ul>
                        <li onclick="Cancel()"><i class="fa-solid fa-xmark col-sm-2"></i></li>
                    </ul>
                </div>
            </div>
            <!--title-end :: end-->
            
            <div class="form-container1">
                
            </div>
                
        </div>
        
        <!-- myModal1 :: start -->
        <div class='myModal3' id="myModal3">
            <!--title-bar :: start-->
            <div class="row">
                <div class="col-sm-10 col-md-6">
                    <h4>SAP DOCUMENT</h4>
                </div>
                <div class="icon">
                    <ul>
                        <li onclick="Cancel()"><i class="fa-solid fa-xmark col-sm-2"></i></li>
                    </ul>
                </div>
            </div>
            <!--title-end :: end-->
            
            <div class="document-container">
                
            </div>
                
        </div>
        <!-- myModal1 :: end -->

        <!-- student-details-container :: start -->
        <section class="student-details-container">
            <!-- progress-container :: start -->
		<div class="progress-container">
                    <?php
			include('PHP/SAP_POINTS/progressBars.php');
		    ?>
                </div>	            
            <!-- progress-container :: end -->

            <!-- details-container :: start -->
            <div class="details-container">

                <!-- student-profile-details :: start -->
                <div class="student-profile-details">
                    <?php
                        include('PHP/SAP_POINTS/studentsDetails.php');
                    ?>
                </div>
                <!-- student-profile-details :: end -->
            </div>
            <!-- details-container :: end -->
        </section>
        <!-- student-details-container :: end -->
        
        <!-- black-overlay1 :: start -->
        <div id='black-overlay1' class='black-overlay1'></div>
        <!-- black-overlay1 :: end -->

        <!-- myModal1 :: start -->
        <div class='myModal1' id="myModal1">
            <!--title-bar :: start-->
            <div class="row">
                <div class="title">
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
                    include('PHP/SAP_POINTS/tableContainers.php'); 
                    
                ?>
                
            </div>
            <!--table-container :: end-->
            
            <button class="btn download-button" onclick = "download()">DOWNLOAD <i class="fa-solid fa-download"></i></button>
                
        </div>
        <!-- myModal1 :: end -->
        
    </main>
    <!-- main :: end -->

    <!-- javascriptLink :: start -->
    <script src="JAVASCRIPT/sappointsPage.js"></script>
    <script src="JAVASCRIPT/tableContainers.js"></script>
    <!-- javascriptLink :: end -->

</body>

</html>