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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    
    <!-- 
        - favicon
    -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

    <!-- 
        - google font link
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:wght@600;700;900&family=Quicksand:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <title>
        MY KEC
    </title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
        
        .navbar {
            font-size: 17px;
        }
        
        .navbar-dark {
            background-color: rgb(0, 183, 255);
        }
        
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .navbar-nav>li>a {
            color: white;
        }
        
        .nav.navItems>li>a:hover,
        .nav.navbar-right>li>a:hover {
            background-color: transparent;
            color: black;
        }
        
        nav.circle ul li a {
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        nav.circle ul li a:after {
            display: block;
            position: absolute;
            margin: 0;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            content: '.';
            color: transparent;
            width: 1px;
            height: 1px;
            border-radius: 50%;
            background: transparent;
        }
        
        nav.circle ul li a:hover:after {
            -webkit-animation: circle 1.5s ease-in forwards;
        }
        
        @-webkit-keyframes circle {
            0% {
                width: 1px;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                margin: auto;
                height: 1px;
                z-index: -1;
                background: white;
                border-radius: 100%;
            }
            100% {
                background: white;
                height: 5000%;
                width: 5000%;
                z-index: -1;
                top: 1;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                border-radius: 0;
            }
        }
        
        .logo-container {
            height: 45px;
            width: 45px;
            border-radius: 50%;
        }
        
        .logo-container>img {
            height: 100%;
            width: 100%;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .profile-container {
            position: relative;
            padding-top: 7px;
            margin-top: -10px;
            align-items: center;
            display: flex;
            gap: 20px;
            float: right;
            cursor: pointer;
        }
        
        .dropbtn {
            background-color: rgb(0, 183, 255);
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }
        
        .dropbtn:hover,
        .dropbtn:focus {
            background-color: rgb(0, 183, 255);
        }
        
        .dropdown {
            position: relative;
            display: inline-block;
        }
        
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            width: 260px;
            margin-left: -78px;
            overflow: auto;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
        
        .dropdown-content a {
            font-size: 15px;
            color: grey;
            padding: 12px 30px;
            text-decoration: none;
            display: block;
        }
        
        .dropdown a:hover {
            color: black;
            background-color: #ddd;
            text-decoration: none;
        }
        
        .show {
            display: block;
        }
        
        .profile {
            padding-top: 10px;
            padding-bottom: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-bottom: 1px solid lightgray;
            margin-bottom: 10px;
        }
        
        #profile-name {
            font-size: 13px;
            background-color: white;
            color: black;
        }
        
        #profile-name:hover {
            background-color: white;
            color: black;
        }
        
        .image-container {
            height: 150px;
            width: 150px;
            border-radius: 50%;
        }
        
        .image-container>img {
            height: 100%;
            width: 100%;
            border-radius: 50%;
            object-fit: cover;
        }
        
         :root {
            --raisin-black-2: hsl(245, 16%, 16%);
            --raisin-black-1: hsl(244, 17%, 19%);
            --majorelle-blue: #87cefaf1;
            --ghost-white-1: hsl(240, 100%, 99%);
            --ghost-white-2: hsl(228, 50%, 96%);
            --white-opacity: hsla(0, 0%, 100%, 0.5);
            --independence: hsl(245, 17%, 27%);
            --lavender-web: hsl(247, 69%, 95%);
            --eerie-black: hsl(210, 11%, 15%);
            --cool-gray: hsl(244, 17%, 61%);
            --sapphire: #87cefaf1;
            --white: hsl(0, 0%, 100%);
            --ff-quicksand: "Quicksand", sans-serif;
            --ff-mulish: "Mulish", sans-serif;
            --transition: 0.25s ease;
            --section-padding: 80px;
        }
        
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        li {
            list-style: none;
        }
        
        a {
            padding: 10px;
            text-decoration: none;
        }
        
        html {
            font-family: var(--ff-quicksand);
            scroll-behavior: smooth;
        }
        
        body {
            background: var(--gray);
        }
        
        .container {
            padding-inline: 15px;
        }
        
        .about-container {
            padding-block: var(--section-padding);
        }
        
        .about-content {
            margin-bottom: 30px;
        }
        
        .about-icon {
            width: 60px;
            height: 60px;
            background: var(--lavender-web);
            display: grid;
            place-items: center;
            color: var(--majorelle-blue);
            font-size: 40px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        
        .about-title {
            margin-bottom: 10px;
        }
        
        .about-text {
            color: var(--cool-gray);
            font-weight: var(--fw-500);
            line-height: 1.8;
            margin-bottom: 20px;
        }
        
        .about-list {
            list-style: none;
            display: grid;
            gap: 20px;
        }
        
        .about-card {
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 17px 0 rgba(0, 0, 0, 0.2);
            border-radius: 4px;
            transition: var(--transition);
        }
        
        .about-card:hover {
            background: var(--majorelle-blue);
            transform: translateY(-5px);
            color: white;
            box-shadow: 0 5px 18px hsla(245, 67%, 59%, 0.4);
        }
        
         ::-webkit-scrollbar {
            width: 0px;
        }
        
         ::-webkit-scrollbar-track {
            background: transparent;
        }
        
         ::-webkit-scrollbar-thumb {
            background: transparent
        }
        
         ::-webkit-scrollbar-thumb:hover {
            background: transparent;
        }
        
        .button-container {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
	    flex-direction:column;
            padding-bottom: 3%;
            padding-top: 1%;
            margin-top: -20%;
        }
        
        .download-button {
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            border-radius: 25px;
            gap: 5%;
            padding: 5px 15%;
            background-color: rgb(0, 183, 255);
        }

	.button-container button:hover {
            color: white;
            background-color: rgb(47, 241, 176);
        }		
        
        .button-container a:hover {
            text-decoration: none;
            color: white;
        }
        
        .android-icon {
            font-size: 40px;
        }
        
        .about-card .card-icon {
            width: 60px;
            height: 60px;
            background: var(--lavender-web);
            display: grid;
            place-items: center;
            color: var(--majorelle-blue);
            font-size: 28px;
            border-radius: 50%;
            margin-inline: auto;
            margin-bottom: 20px;
            transition: var(--transition);
        }
        
        .about-card:hover .card-icon {
            background: hsla(0, 0%, 100%, 0.15);
            color: var(--white);
            box-shadow: 0 0 0 8px hsla(0, 0%, 100%, 0.05);
        }
        
        .about-card .card-title {
            margin-bottom: 10px;
            transition: var(--transition);
        }
        
        .about-card:hover .card-title {
            color: var(--white);
        }
        
        .about-card .card-text {
            color: var(--cool-gray);
            font-size: var(--fs-6);
            font-weight: var(--fw-500);
            line-height: 1.8;
            transition: var(--transition);
        }
        
        .about-card:hover .card-text {
            color: hsla(0, 0%, 100%, 0.5);
        }
        
        @media (min-width: 350px) {
            .button-container {
                margin-top: -10%;
                margin-left: -15px;
                padding-bottom: 10%;
            }
        }
        
        @media (min-width: 450px) {
            .about-card .card-text {
                max-width: 300px;
                margin-inline: auto;
            }
            .button-container {
                margin-left: -15px;
            }
        }
        
        @media (min-width: 576px) {
            .container {
                max-width: 525px;
                margin-inline: auto;
            }
            .section-text {
                max-width: 460px;
                margin-inline: auto;
                margin-bottom: 80px;
            }
            .button-container {
                margin-left: -15px;
            }
        }
        
        @media (min-width: 768px) {
            .container {
                max-width: 720px;
            }
            .section-text {
                max-width: 645px;
            }
            .about-list {
                grid-template-columns: 1fr 1fr;
            }
            .button-container {
                margin-top: 1%;
            }
        }
        
        @media (min-width: 992px) {
            .container {
                max-width: 950px;
            }
            .section-text {
                max-width: 450px;
            }
            .about .container {
                display: flex;
                align-items: center;
                gap: 50px;
            }
            .about-content {
                margin-bottom: 0;
                width: 40%;
            }
            .about-list {
                gap: 30px;
                padding-bottom: 50px;
            }
            .about-list li:nth-child(odd) {
                transform: translateY(50px);
            }
        }
        
        @media (min-width: 1200px) {
            .container {
                max-width: 1150px;
            }
        }
    </style>

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
                    <ul class="nav navItems navbar-nav navbar-left menu-items">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="eventPage.php">Events</a></li>
                        <?php
                            if(isset($_SESSION['staffEmail']) && ($_SESSION['designation'] == 1 || $_SESSION['designation'] == 4 || $_SESSION['designation'] == 5)) {
                                if($_SESSION['designation'] == 5 || $_SESSION['designation'] == 4) {
                                    echo '<li><a href="circularPage.php">Add Circulars</a></li>';
                                    echo '<li><a href="addEventPage.php">Add Events</a></li>';
                                }
                                if($_SESSION['designation'] == 1) {
                                    echo '<li><a href="sappointPage.php">SAP Points</a></li>';
                                }                            }
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
                                            if($_SESSION['designation'] == 1 || $_SESSION['designation'] == 4 || $_SESSION['designation'] == 5) {
                                                echo '<a href="studentInfoPage.php"><i class="fa-solid fa-circle-info"></i> Student Info</a>
                                                    <a href="getReportPage.php"><i class="fa-solid fa-circle-info"></i> Get Report</a>';
                                            }
                                            
                                            if($_SESSION['designation'] == 4 || $_SESSION['designation'] == 5) {
                                                echo '<a href="addStudentPage.php"><i class="fa-solid fa-circle-info"></i> Add Student</a>
                                                    <a href="addStaffPage.php"><i class="fa-solid fa-circle-info"></i> Add Staff</a>';
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
                                    <li><a href="loginPage.php"><span class="fa-solid fa-right-to-bracket"></span> Login</a></li>
                                </ul>';
                        }
                    ?>
                    <!-- profile-container :: end -->
                </div>
                <!-- navbar-collapse :: end -->
            </div>
            <!-- navbar-menus-container :: end -->
        </div>
    </nav>
    <!-- navBar :: end -->
    

  <main>
    <article>
      <article>
            <section class="about-container">
                <div class="container">

                    <ul class="about-list">

                        <li>
                            <div class="about-card">

                                <div class="card-icon">
                                    <ion-icon name="thumbs-up"></ion-icon>
                                </div>

                                <h3 class="h3 card-title">Easy To Use</h3>

                                <p class="card-text">
                                    The SAP is easy to use by the given user Interface.
                                </p>

                            </div>
                        </li>

                        <li>
                            <div class="about-card">

                                <div class="card-icon">
                                    <ion-icon name="trending-up"></ion-icon>
                                </div>

                                <h3 class="h3 card-title">Grow Your Passion</h3>

                                <p class="card-text">
                                    Participate and win contests with will of fire.
                                </p>

                            </div>
                        </li>

                        <li>
                            <div class="about-card">

                                <div class="card-icon">
                                    <ion-icon name="shield-checkmark"></ion-icon>
                                </div>

                                <h3 class="h3 card-title">Use the features</h3>

                                <p class="card-text">
                                    You can use the sap points to improve your marks.
                                </p>

                            </div>
                        </li>

                        <li>
                            <div class="about-card">

                                <div class="card-icon">
                                    <ion-icon name="server"></ion-icon>
                                </div>

                                <h3 class="h3 card-title">Data Privacy</h3>

                                <p class="card-text">
                                    We assure that we will not use your data unnecessarly without your permission.
                                </p>

                            </div>
                        </li>

                    </ul>

                </div>
            </section>

        </article>    </article>
	   <div class="button-container">
		<?php
			if($_SESSION['staffEmail']) {
				echo ' <a href="./IMAGES/app-release.apk"><button class = "btn download-button" > 
                    			<i class="fa-brands fa-android android-icon"></i> Get Android version</button></a>';
			}
			else if($_SESSION['studentEmail']) {
				echo ' <a href="./IMAGES/app-release-s.apk"><button class = "btn download-button" > 
                    			<i class="fa-brands fa-android android-icon"></i> Get Android version</button></a>';
			}
			else {
				echo ' <a href="./IMAGES/app-release.apk"><button class = "btn download-button" > 
                    			<i class="fa-brands fa-android android-icon"></i> Get Staff Android version</button></a>
					<a href="./IMAGES/app-release-s.apk"><button class = "btn download-button" > 
                    			<i class="fa-brands fa-android android-icon"></i> Get Student Android version</button></a>';

			}
		?>
           </div>  
  </main>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <script src="JAVASCRIPT/aboutusPage.js"></script>
</body>