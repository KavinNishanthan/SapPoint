<?php
    session_start();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="IMAGES/kec_icon.png">

    <!-- meta :: start -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- meta :: end -->

    <!-- stylesheetLink :: start -->
    <link rel="stylesheet" href="CSS/loginPage.css">
     <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
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
    
     <script src="https://kit.fontawesome.com/a81368914c.js"></script>

    <!-- title :: start -->
    <title>Login</title>
    <!-- title :: end -->
</head>

<body >
    <div class="container loginPage">
        <img class="wave" src="IMAGES/wave.png">
        <div class="container block">
            <div class="img">
                <img src="IMAGES/backGround.png">
            </div>
            <div class="login-content">
                <form method="post" action="PHP/LOGIN/login.php">
                    <img src="IMAGES/kecLogo.jpg">
                    <h2 class="title">LOGIN</h2>
                    <!-- message-container :: start -->
                    <div class="message-container ">
                        <?php
                            if(isset($_SESSION['invalidEmail'])):
                        ?>
                            <div class="alert alert-danger alert-dismissible myAlert">
                            <a href="#" class="close cancel" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong> <?= $_SESSION['invalidEmail']; ?> </strong>
                            </div>
                            
                        <?php
                            unset($_SESSION['invalidEmail']);
                            endif;
                        ?>
                    </div>
                    <!-- message-container :: end -->
                    
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="div">
                            <h5>Email</h5>
                            <input type="email" name="userEmail" class="input" required>
                        </div>
                    </div>
                    
                    <!-- message-container :: start -->
                    <div class="message-container ">
                        <?php
                            if(isset($_SESSION['invalidPassword'])):
                        ?>
                            <div class="alert alert-danger alert-dismissible myAlert">
                            <a href="#" class="close cancel" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong> <?= $_SESSION['invalidPassword']; ?> </strong>
                            </div>
                            
                        <?php
                            unset($_SESSION['invalidPassword']);
                            endif;
                        ?>
                    </div>
                    <!-- message-container :: end -->
                    
                    <div class="input-div pass">
                        <div class="i">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="div">
                            <h5>Password</h5>
                            <input name="userPassword" type="password" id="password-field" class="input" required>
                            <span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                        </div>
                    </div>
                    <!-- forgot-password :: start -->
                            <div class=" forgot-password-container ">
                                <a href="forgotPasswordPage.php">Forgot Password?</a>
                            </div>
                            <!-- forgot-password :: end-->
                            
                    <input type="submit" class="btn class" name="submit" value="Login">
                </form>
            </div>
        </div>
    </div>
    
    <script src="JAVASCRIPT/loginPage.js"></script>
</body>

</html>