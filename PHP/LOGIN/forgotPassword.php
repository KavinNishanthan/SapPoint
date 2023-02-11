<?php
    session_start();
?>

<?php
    // database-connection :: start
    require '../DATABASE/databaseConnection.php';
    // database-connection :: end
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    require 'vendor/autoload.php';

    function sendEmail($userEmail,$userName,$token) {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "mykec@kongu.edu";
        $mail->Password = "kongu@2040";
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";
        $mail->isHTML(true);
        $mail->setFrom("mykec@kongu.edu","my_kec");
        $mail->addAddress($userEmail);
        $mail->Subject = "Change password";
        $mail->Body = "<div>
                        <h4>Hey " . ucwords($userName) . " !</h4>
                        <p>You are receiving this email because we received a password reset request for your account.</p>
                        <a href='https://mykec.kongu.edu/changePasswordPage.php?verifyToken=" . $token . "&userEmail=" . $userEmail . "'>Reset Password</a>
                    </div>";
        if($mail->send()) {
            $_SESSION['successMessage'] = "Reset Password link sent successfully...";
            echo "<script>window.location = '../../forgotPasswordPage.php';</script>";
            exit(0);
        }
        else {
            $_SESSION['successMessage'] = "Something is wrong" . $mail->ErrorInfo;
            echo "<script>window.location = '../../forgotPasswordPage.php';</script>";
            exit(0);
        }
    }

    
    if(isset($_POST['submit'])) {
        $userEmail = mysqli_real_escape_string($link,$_POST["userEmail"]);
        
        if(preg_match("/^[a-zA-Z0-9._]+@kongu.ac.in$/",$userEmail)) {
            
            $token = md5(rand());
            $sql = "SELECT * FROM Staff WHERE staffEmail = '$userEmail' LIMIT 1;";
            $result = mysqli_query($link,$sql);
            if(mysqli_num_rows($result) > 0) {
                $staff = mysqli_fetch_array($result);
                $staffName = $staff['staffName'];
                $staffEmail = $staff['staffEmail'];
                
                $sql = "UPDATE Staff SET verifyToken = '$token' WHERE staffEmail = '$staffEmail' LIMIT 1;";
                if(mysqli_query($link,$sql)) {
                    sendEmail($staffEmail,$staffName,$token);
                }
                else {
                    $_SESSION['invalidEmail'] = "Oops! Something went wrong...";
                    echo "<script>window.location = '../../forgotPasswordPage.php';</script>";
                    exit(0);
                }
            }
            else 
            {
                $_SESSION['invalidEmail'] = "Email not found!...";
                echo "<script>window.location = '../../forgotPasswordPage.php';</script>";
                exit(0);
            }
        }
        else if(preg_match("/^[a-z]+(.[0-9a-z]+@kongu.edu)$/",$userEmail)) {
            $token = md5(rand());
            $sql = "SELECT * FROM Student WHERE studentEmail = '$userEmail' LIMIT 1;";
            $result = mysqli_query($link,$sql);
            if(mysqli_num_rows($result) > 0) {
                $student = mysqli_fetch_array($result);
                $studentName = $student['studentName'];
                $studentEmail = $student['studentEmail'];
                
                $sql = "UPDATE Student SET verifyToken = '$token' WHERE studentEmail = '$studentEmail' LIMIT 1;";
                if(mysqli_query($link,$sql)) {
                    sendEmail($studentEmail,$studentName,$token);
                }
                else {
                    $_SESSION['invalidEmail'] = "Oops! Something went wrong...";
                    echo mysqli_error($link);
                    // echo "<script>window.location = '../../forgotPasswordPage.php';</script>";
                    // exit(0);
                }
            }
            else 
            {
                $_SESSION['invalidEmail'] = "Email not found!...";
                echo "<script>window.location = '../../forgotPasswordPage.php';</script>";
                exit(0);
            }
        }
    }
    
    if(isset($_POST['change'])) {
        $userEmail = mysqli_real_escape_string($link,$_POST["userEmail"]);
        $new_userPassword = mysqli_real_escape_string($link,$_POST["new_userPassword"]);
        $confirm_userPassword = mysqli_real_escape_string($link,$_POST["confirm_userPassword"]);
        $token = mysqli_real_escape_string($link,$_POST["tokenId"]);
        
        if(preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/",$new_userPassword)) {
            if($new_userPassword == $confirm_userPassword) {
                if(preg_match("/^[a-zA-Z0-9._]+@kongu.ac.in$/",$userEmail)) {
                    $sql = "SELECT verifyToken FROM Staff WHERE verifyToken = '$token';";
                    $result = mysqli_query($link,$sql);
                    if(mysqli_num_rows($result) > 0) {
                        $new_password = md5($confirm_userPassword);
                        $sql = "UPDATE Staff SET passcode = '$new_password' WHERE verifyToken = '$token';";
                        if(mysqli_query($link,$sql)) {
                            $new_token = md5(rand());
                            $sql = "UPDATE Staff SET verifyToken = '$new_token'  WHERE verifyToken = '$token';";
                            if(mysqli_query($link,$sql)) {
                                $_SESSION['successMessage'] = "Password changed successfully!...";
                                echo "<script>window.open('../../loginPage.php','_blank').focus();</script>";
                                echo "<script>window.close();</script>";
                                exit(0);
                            }
                        }
                        else {
                            $_SESSION['invalidPassword'] = "Unable to change password!...";
                            echo "<script>window.location = '../../changePasswordPage.php?verifyToken=" . $token . "&userEmail=" . $userEmail . "';</script>";
                            exit(0);
                        }
                    }
		    else {
                        $_SESSION['errorMessage'] = "Email verification expired!...";
                            echo "<script>window.open('../../loginPage.php','_blank').focus();</script>";
                                echo "<script>window.close();</script>";
                                exit(0);
                    }
                }
                else if(preg_match("/^[a-z]+(.[0-9a-z]+@kongu.edu)$/",$userEmail)) {
                    $sql = "SELECT verifyToken FROM Student WHERE verifyToken = '$token';";
                    $result = mysqli_query($link,$sql);
                    if(mysqli_num_rows($result) > 0) {
                        $new_password = md5($confirm_userPassword);
                        $sql = "UPDATE Student SET passcode = '$new_password' WHERE verifyToken = '$token';";
                        if(mysqli_query($link,$sql)) {
                            $new_token = md5(rand());
                            $sql = "UPDATE Student SET verifyToken = '$new_token' WHERE verifyToken = '$token';";
                            if(mysqli_query($link,$sql)) {
                                $_SESSION['successMessage'] = "Password changed successfully!...";
                                echo "<script>window.open('../../loginPage.php','_blank').focus();</script>";
                                echo "<script>window.close();</script>";
                                exit(0);
                            }
                        }
                        else {
                            $_SESSION['invalidPassword'] = "Unable to change password!...";
                            echo "<script>window.location = '../../changePasswordPage.php?verifyToken=" . $token . "&userEmail=" . $userEmail . "';</script>";
                            exit(0);
                        }
                    }
		    else {
                        $_SESSION['errorMessage'] = "Email verification expired!...";
                            echo "<script>window.open('../../loginPage.php','_blank').focus();</script>";
                                echo "<script>window.close();</script>";
                                exit(0);
                    }
                }
            }
            else {
                $_SESSION['cinvalidPassword'] = "Password and Confirm Password does not match !...";
                echo "<script>window.location = '../../changePasswordPage.php?verifyToken=" . $token . "&userEmail=" . $userEmail . "';</script>";
                exit(0);
            }
        }
        else {
            $_SESSION['invalidPassword'] = "Create a strong password. Atleast a lowercase, a uppercase, a digit, a special character. Minimum length of 8 characters.!...";
            echo "<script>window.location = '../../changePasswordPage.php?verifyToken=" . $token . "&userEmail=" . $userEmail . "';</script>";
            exit(0);
        }
    }

?>
