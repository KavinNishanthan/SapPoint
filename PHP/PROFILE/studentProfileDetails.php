<?php

    // database-connection :: start
    require('PHP/DATABASE/databaseConnection.php');
    // database-connection :: end
?>

<?php

    $department = '{"CIVIL":"CIVIL ENGINEERING","MECH":"MECHANICAL ENGINEERING","MTA":"MECHATRONICS ENGINEERING","AU":"AUTOMOBILE ENGINEERING","CE":"CHEMICAL ENGINEERING","FT":"FOOD TECHNOLOGY","EEE":"ELECTRICAL AND ELECTRONICS ENGINEERING","EIE":"ELECTRONICS AND INSTRUMENTATION ENGINEERING","ECE":"ELECTRONICS AND COMMUNICATION ENGINEERING","CSE":"COMPUTER SCIENCE AND ENGINEERING","IT":"INFORMATION TECHNOLOGY","CSD":"COMPUTER SCIENCE AND DESIGN","AIML":"ARTIFICIAL INTELLIGENCE","AIDS":"DATA SCIENCE"}';
    
     $depobj = json_decode($department,true);
    
    if(isset($_SESSION['rollNumber'])) {
        
        $rollNumber = $_SESSION['rollNumber'];
        $sql = "SELECT * FROM Student WHERE rollNumber = '$rollNumber';";
        $result = mysqli_query($link,$sql);
        if(mysqli_num_rows($result)) {
            foreach($result as $student) {
                echo '<div class="profile-image-container">
                            <img src="../../IMAGES/profile.jpg" alt="Staff Profile" />
                        </div>
                        <div class="profile-detail-container">
                            <div class="username">' . ucwords($student["studentName"]) . '</div>
                            <div class="user-id">' . $rollNumber . '</div>
                            <div class="department">Department of ' . ucwords(strtolower($depobj[$student["department"]])) . '</div>
                            <div class="place-detail">
                                <div class="mail"><i class="fa-solid fa-envelope"></i>
                                    <div class="contact-mail">' . $student["studentEmail"] . '</div>
                                </div>
                            </div>
                        </div>';
            }
        }
        unset($_SESSION["rollNumber"]);
    }

?>