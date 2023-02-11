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
    <link rel="stylesheet" href="CSS/addDocumentPage.css" type="text/css">
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
                    <ul class="nav navItems navbar-nav navbar-left menu-items navItems">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="eventPage.php">Events</a></li>
                        <li><a href="circularPage.php">Add Circulars</a></li>
                        <li><a href="addEventPage.php">Add Events</a></li>
                        <li><a href="sappointPage.php">SAP Points</a></li>
                    </ul>
                    <!-- navbar-menus :: end -->

                    <!-- profile-container :: start -->
                    <div class="profile-container">
                        <div class="dropdown">
                            <button onclick="profileFunction()" class="dropbtn"><i class="fa-regular fa-user"></i>  <?= ucwords($_SESSION['staffName']) ?> <i class="fa-solid fa-angle-down down-angle"></i></button>
                            <div id="myDropdown" class="dropdown-content">
                                <div class="profile">
                                    <div class="image-container">
                                        <img src="IMAGES/avatar.png" alt="Profile"/>
                                    </div>
                                    <a id="profile-name" href="profilePage.php"><?= $_SESSION['staffEmail'] ?></a>
                                </div>
                                <a href="profilePage.php"><i class="fa-solid fa-user-pen"></i> User Info</a>
                                <a href="getReportPage.php"><i class="fa-solid fa-file-export"></i> Get Report</a>
                                <a href="addStaffPage.php"><i class="fa-solid fa-user-plus"></i> Add Staff</a>
                                <a href="addStudentPage.php"><i class="fa-solid fa-user-plus"></i> Add Student</a>
                                <a href="PHP/LOGOUT/logout.php"><i class="fa-solid fa-power-off"></i> Logout</a>
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
        <!-- button-container :: start -->
        <div class="button-container">
            <form method="post" action="PHP/PROFILE/addDocument.php" id="addDocForm" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-sm-10 col-md-8 input-fields">
                        <input type="file" name="sapDocument" id="sapDocument" class="form-control" required>
                        <label for="sapDocument">Proof Document</label>
                    </div>
                </div>
                <button type="submit" class="btn add-button" name="add">ADD DOCUMENTS</button>
            </form>
        </div>
        <!-- button-container :: end -->
        
        <!-- google-sheet-container :: start -->
        <div class="google-sheet-container">
            <iframe class="google-sheet" src="https://docs.google.com/spreadsheets/d/1CeCoAuwuNo3oxMJUiAtkh8pBcF4u9qVuLRKR4duiTvE/edit?usp=sharing" title="Add Document"></iframe>
        </div>
        <!-- google-sheet-container :: end -->
        
    </main>
    <!--main :: end-->

    <!-- javascriptLink :: start -->
    <script src="JAVASCRIPT/profilePage.js"></script>
    <!-- javascriptLink :: end -->

</body>

</html>