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
        <link rel="stylesheet" href="CSS/circularPage.css">
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
        <title>Circulars</title>
        <!-- title :: end -->

    </head>

    <body>
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
    <div class="add-button-container">
            <button class="add-button" onclick="getForm()">+</button>
        </div>
    <main class="circular-page">
         
        <section class="category-container">
            <button class="staff active">STAFF</button>
            <div class="form-group">
                <div class="col-sm-10 col-md-8 input-fields">
                    <input type="text" id="search" placeholder="Search" class="form-control">
                </div>
            </div>
            <button class="student">STUDENT</button>
        </section>
        
        <?php
            include("PHP/DATABASE/successMessage.php");
            include("PHP/DATABASE/dangerMessage.php");
            include("PHP/DATABASE/warningMessage.php");
        ?>
        
        <section class="staff-circular-container">
            <div class="staff-circular">
                <?php
                    include("PHP/CIRCULARS/staffCircular.php");
                ?>
            </div>
        </section>
        
        <section class="student-circular-container">
            <div class="student-circular">
                <?php
                    include("PHP/CIRCULARS/studentCircular.php");
                ?>
            </div>
        </section>
        
        <!-- black-overlay1 :: start -->
        <div id='black-overlay1' class='black-overlay1'></div>
        <!-- black-overlay1 :: end -->
        
        <!-- myModal :: start -->
        <div id='myModal' class='myModal'>
            <div class='myModal-navbar'>View Details<div class='close-container'><i onclick="Cancel()" id='close' class="fa-solid fa-xmark"></i></div></div>
           
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

        <!-- myModal1 :: start -->
        <div class='myModal1' id="myModal1">
            <!--title-bar :: start-->
            <div class="row">
                <div class="col-sm-10 col-md-6">
                    <h4>ADD CIRCULAR</h4>
                </div>
                <div class="icon">
                    <ul>
                        <li onclick="cancel()"><i class="fa-solid fa-xmark col-sm-2"></i></li>
                    </ul>
                </div>
            </div>
            <!--title-end :: end-->
            
            <div class="form-container">
                <form class="form-horizontal" action="PHP/CIRCULARS/addCircular.php" method="post">
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="text" name="circularNumber" class="form-control" maxlength="50" required>
                            <label for="circularNumber">Circular Number</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="text" name="circularTitle" class="form-control" maxlength="50" required>
                            <label for="circularTitle">Circular Title</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <textarea type="text" name="circularDescription" class="form-control" maxlength="250" rows="3" required></textarea>
                            <label for="circularDescription">Circular Description</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <select class="form-control" name="department[]" required multiple="multiple">
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
                            <label for="department">Department</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <select class="form-control" name="year[]" required multiple="multiple">
                                <option value="ALL">All</option>
                                <option value="1">I</option>
                                <option value="2">II</option>
                                <option value="3">III</option>
                                <option value="4">IV</option>
                            </select>
                            <label for="year">Year</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <select class="form-control" name="userCategory" required>
                                <option value="0">All</option>
                                <option value="1">Staff</option>
                                <option value="2">Student</option>
                            </select>
                            <label for="userCategory">Category</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="link" name="documentLink" class="form-control" maxlength="500" required>
                            <label for="documentLink">Document Link</label>
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
        
        <!-- myModal2 :: start -->
        <div class='myModal2' id="myModal2">
            <!--title-bar :: start-->
            <div class="row">
                <div class="col-sm-10 col-md-6">
                    <h4>EDIT CIRCULAR</h4>
                </div>
                <div class="icon">
                    <ul>
                        <li onclick="cancel()"><i class="fa-solid fa-xmark col-sm-2"></i></li>
                    </ul>
                </div>
            </div>
            <!--title-end :: end-->
            
            <div class="form-container1" id="formContainer">
                
            </div>

        </div>
        <!-- myModal2 :: end -->
       
    </main>

    <!-- javascriptLink :: start -->
    <script src="JAVASCRIPT/circularPage.js"></script>
    <!-- javascriptLink :: end -->
    </body>
    

    </html>