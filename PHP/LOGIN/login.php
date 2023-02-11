<?php
    session_start();
?>

<?php
    // database-connection :: start
    require '../DATABASE/databaseConnection.php';
    // database-connection :: end

    // login-form :: start
    if(isset($_POST['submit'])) {
        $userEmail = mysqli_real_escape_string($link,$_POST["userEmail"]);
        $userPassword = mysqli_real_escape_string($link,$_POST["userPassword"]);
        
        if(preg_match("/^[a-zA-Z0-9._]+@kongu.ac.in$/",$userEmail)) {
            // check for account exist :: start
            $sql = "SELECT * FROM Staff WHERE staffEmail = '$userEmail';";
            $result = mysqli_query($link,$sql);
            if(mysqli_num_rows($result) > 0) {
                foreach($result as $staff) {
                    $password = $staff['passcode'];
                    //check for password :: start
                    if(md5($userPassword) == $password) {
                        $_SESSION['designation'] = $staff['designation'];
                        $_SESSION['staffEmail'] = $userEmail;
                        $_SESSION['staffName'] = $staff['staffName'];
                        $_SESSION['department'] = $staff['department'];
                        $_SESSION['semester'] = $staff['currentSemester'];
                        $_SESSION['section'] = $staff['section'];
                        $_SESSION['studentBatch'] = $staff['studentBatch'];
                        
                        // navigate to home-page :: start
                        
                        echo "<script>window.open('../../index.php','_blank').focus();</script>";
                        echo "<script>window.close();</script>";
                        exit(0);
                        // navigate to home-page :: end
                    }
                    else
                    // password does not match
                    {
                        $_SESSION['invalidPassword'] = "Incorrect password!";
                        
                         // navigate to login-page :: start
                        echo "<script>window.location = '../../loginPage.php';</script>";
                        exit(0);
                        // navigate to login-page :: end
                    }
                    //check for password :: start
                }
            }
            // email does not exist
                else 
                {
                    $_SESSION['invalidEmail'] = "Invalid email id!";
                        
                    // navigate to login-page :: start
                    echo "<script>window.location = '../../loginPage.php';</script>";
                    exit(0);
                    // navigate to login-page :: end
                }
                // check for account exist :: end
        }
        
        if(preg_match("/^[a-z]+(.[0-9a-z]+@kongu.edu)$/",$userEmail)) {
            // check for account exist :: start
        $sql = "SELECT * FROM Student WHERE studentEmail = '$userEmail';";
        $result = mysqli_query($link,$sql);
        if(mysqli_num_rows($result) > 0) {
            foreach($result as $student) {
                $password = $student['passcode'];
                //check for password :: start
                if(md5($userPassword) == $password) {
                    $_SESSION['rollNumber'] = $student['rollNumber'];
                    $_SESSION['studentEmail'] = $userEmail;
                    $_SESSION['studentName'] = $student['studentName'];
                    $_SESSION['department'] = $student['department'];
                    $_SESSION['semester'] = $student['currentSemester'];
                    $_SESSION['section'] = $student['section'];
                    $_SESSION['studentBatch'] = $student['studentBatch'];
                    
                    // navigate to home-page :: start
                    
                    echo "<script>window.open('../../index.php','_blank').focus();</script>";
                    echo "<script>window.close();</script>";
                    exit(0);
                    // navigate to home-page :: end
                }
                else
                // password does not match
                {
                    $_SESSION['invalidPassword'] = "Incorrect password!";
                    
                     // navigate to login-page :: start
                    echo "<script>window.location = '../../loginPage.php';</script>";
                    exit(0);
                    // navigate to login-page :: end
                }
                //check for password :: start
            }
        }
        // email does not exist
            else 
            {
                $_SESSION['invalidEmail'] = "Invalid email id!";
                    
                // navigate to login-page :: start
                echo "<script>window.location = '../../loginPage.php';</script>";
                exit(0);
                // navigate to login-page :: end
            }
            // check for account exist :: end
        }
    }
    //login-form :: end
?>
