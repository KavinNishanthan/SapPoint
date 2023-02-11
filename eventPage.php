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
        <link rel="stylesheet" href="CSS/eventPage.css">
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
        <title>Events</title>
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
    
    <main class="event-page">
	
        <!-- button-container :: start -->
            <section class="button-container">
                <button class="category-button click" onclick="filterCategory(this.innerHTML)">All</button>
                <button class="category-button click" onclick="filterCategory(this.innerHTML)">Club Events</button>
                <button class="category-button click" onclick="filterCategory(this.innerHTML)">Hiring Challenges</button>
                <button class="category-button click" onclick="filterCategory(this.innerHTML)">Quizzes</button>
                <button class="category-button click" onclick="filterCategory(this.innerHTML)">Hackathons</button>
                <button class="category-button click" onclick="filterCategory(this.innerHTML)">Scholarships</button>
                <button class="category-button click" onclick="filterCategory(this.innerHTML)">Internships</button>
                <button class="category-button click" onclick="filterCategory(this.innerHTML)">Workshops</button>
                <button class="category-button click" onclick="filterCategory(this.innerHTML)">Cultural Events</button>
                <button class="category-button click" onclick="filterCategory(this.innerHTML)">College Festivals</button>
            </section>
            <!-- button-container :: end -->
	  

            <div class="event-container">
               <!-- filter-container :: start -->

   			<!-- filter-container :: start -->

    <section class="filter-container">
        <label for="toggle" class="label-toggle"><i class="fa-solid fa-bars"></i></label><input type="checkbox" id="toggle">
        <div class="filter-container1">
            <div class="filters">
                <h4>Filters</h4>
                <button type="reset" id="reset" class="reset-button">Reset Filters</button>
            </div>

            <div class="filter">
                <div class="mode-container">
                    <h4>Category</h4>
                    <button class="category-button" onclick="modeCategory(this.innerHTML)">All</button>
                    <button class="category-button" onclick="modeCategory(this.innerHTML)">Inside</button>
                    <button class="category-button" onclick="modeCategory(this.innerHTML)">Outside</button>
                </div>

                <div class="status-container">
                    <h4>Status</h4>
                    <button class="category-button" onclick="status(this.innerHTML)">All</button>
                    <button class="category-button upcoming" onclick="status(this.innerHTML)">Upcoming</button>
                    <button class="category-button expired" onclick="status(this.innerHTML)">Expired</button>
                </div>

                <div class="payment-container">
                    <h4>Payment</h4>
                    <button class="category-button" onclick="payment(this.innerHTML)">All</button>
                    <button class="category-button" onclick="payment(this.innerHTML)">Free</button>
                    <button class="category-button" onclick="payment(this.innerHTML)">Paid</button>
                </div>

                <div class="eligibility-container">
                    <h4>Eligibility</h4>
                    <div class="eligibility-cont">
                        <div>
                            <button class="category-button eligible" value="0" onclick="eligibility(this.value)">All</button>
                        </div>
                        <div>
                            <button class="category-button eligible" value="1" onclick="eligibility(this.value)">1 <sup>st</sup> year</button>
                            <button class="category-button eligible" value="2" onclick="eligibility(this.value)">2 <sup>nd</sup> year</button>
                        </div>
                        <div>
                            <button class="category-button eligible" value="3" onclick="eligibility(this.value)">3 <sup>rd</sup> year</button>
                            <button class="category-button eligible" value="4" onclick="eligibility(this.value)">4 <sup>th</sup> year</button>
                        </div>
                    </div>
                </div>

                <div class="eligibility-container">
                    <h4>Department</h4>
                    <div class="eligibility-cont">
                        <div>
                            <button class="category-button eligible" onclick="department(this.innerHTML)">All</button>
                        </div>
                        <div>
                            <button class="category-button eligible" onclick="department(this.innerHTML)">CE</button>
                            <button class="category-button eligible" onclick="department(this.innerHTML)">MTE</button>
                        </div>
                        <div>
                            <button class="category-button eligible" onclick="department(this.innerHTML)">ECE</button>
                            <button class="category-button eligible" onclick="department(this.innerHTML)">CSE</button>
                        </div>
                        <div>
                            <button class="category-button eligible" onclick="department(this.innerHTML)">CHE</button>
                            <button class="category-button eligible" onclick="department(this.innerHTML)">EEE</button>
                        </div>
                        <div>
                            <button class="category-button eligible" onclick="department(this.innerHTML)">EIE</button>
                            <button class="category-button eligible" onclick="department(this.innerHTML)">IT</button>
                        </div>
                        <div>
                            <button class="category-button eligible" onclick="department(this.innerHTML)">MTA</button>
                            <button class="category-button eligible" onclick="department(this.innerHTML)">FT</button>
                        </div>
                        <div>
                            <button class="category-button eligible" onclick="department(this.innerHTML)">AUE</button>
                            <button class="category-button eligible" onclick="department(this.innerHTML)">CSD</button>
                        </div>
                        <div>
                            <button class="category-button eligible" onclick="department(this.innerHTML)">AIML</button>
                            <button class="category-button eligible" onclick="department(this.innerHTML)">AIDS</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
                <!-- filter-container :: end -->

                <!-- events-container :: start -->
                <section class="events-container">
                    <div class="filter-header">
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
                    </div>

                    <div class="event-list-container">
                        <?php
                            include('PHP/EVENTS/event.php');
                        ?>
                    </div>
                </section>
                <!-- events-container :: end -->
            </div>

    </main>

    <!-- javascriptLink :: start -->
    <script src="JAVASCRIPT/eventPage.js"></script>
    <!-- javascriptLink :: end -->
    </body>
    

    </html>
