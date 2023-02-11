<?php

    // database-connection :: start
    require('PHP/DATABASE/databaseConnection.php');
    // database-connection :: end
?>

<?php

    $department = '{"CIVIL":"CIVIL ENGINEERING","MECH":"MECHANICAL ENGINEERING","MTA":"MECHATRONICS ENGINEERING","AU":"AUTOMOBILE ENGINEERING","CE":"CHEMICAL ENGINEERING","FT":"FOOD TECHNOLOGY","EEE":"ELECTRICAL AND ELECTRONICS ENGINEERING","EIE":"ELECTRONICS AND INSTRUMENTATION ENGINEERING","ECE":"ELECTRONICS AND COMMUNICATION ENGINEERING","CSE":"COMPUTER SCIENCE AND ENGINEERING","IT":"INFORMATION TECHNOLOGY","CSD":"COMPUTER SCIENCE AND DESIGN","AIML":"ARTIFICIAL INTELLIGENCE","AIDS":"DATA SCIENCE"}';
    
     $depobj = json_decode($department,true);
    
    if(isset($_SESSION['staffEmail'])) {
        
        $staffEmail = $_SESSION['staffEmail'];
        $sql = "SELECT * FROM Staff WHERE staffEmail = '$staffEmail';";
        $result = mysqli_query($link,$sql);
        if(mysqli_num_rows($result)) {
            foreach($result as $staff) {
                echo '<div class="name">
                    <h3>' . ucwords($staff["staffName"]) . '</h3>
                </div>
                
                <div class="rollNumber">
                    <h3>' . $staff["staffId"] . '</h3>
                </div>
                
                <div class="department">';
                    if($staff["department"] != "") {
                        echo '<h4>Department of ' . ucwords(strtolower($depobj[$staff["department"]])) . '</h4>';
                    }
                echo '</div>';
                
                if($staff["designation"] != 5) {
                    if($staff["currentSemester"] != "") {
                        echo '<div class="semester">
                                <h4>';
                                if($staff["currentSemester"] == 1) {
                                    echo $staff["currentSemester"] . '<sup>st</sup> semester';
                                }
                                else if($staff["currentSemester"] == 2) {
                                    echo $staff["currentSemester"] . '<sup>nd</sup> semester';
                                }
                                else if($staff["currentSemester"] == 3) {
                                    echo $staff["currentSemester"] . '<sup>rd</sup> semester';
                                }
                                else {
                                    echo $staff["currentSemester"] . '<sup>th</sup> semester';
                                }
                                echo '</h4>
                            </div>
                            
                            <div class="section">
                                <h4>';
                                if(ceil($staff["currentSemester"]/2) == 1) {
                                    echo 'I - ' . $staff["department"] . ' - ' . $staff["section"];
                                }
                                else if(ceil($staff["currentSemester"]/2) == 2) {
                                    echo 'II - ' . $staff["department"] . ' - ' . $staff["section"];
                                }
                                else if(ceil($staff["currentSemester"]/2) == 3) {
                                    echo 'III - ' . $staff["department"] . ' - ' . $staff["section"];
                                }
                                else if(ceil($staff["currentSemester"]/2) == 4) {
                                    echo 'IV - ' . $staff["department"] . ' - ' . $staff["section"];
                                }
                                echo '</h4>
                            </div>';
                    }
                }
                
                echo '<div class="mail">
                    <h5>' . $staffEmail . '</h5>
                </div>';
            }
        }
    }
    else if(isset($_SESSION['studentEmail'])) {
        
        $studentEmail = $_SESSION['studentEmail'];
        $sql = "SELECT * FROM Student WHERE studentEmail = '$studentEmail';";
        $result = mysqli_query($link,$sql);
        if(mysqli_num_rows($result)) {
            foreach($result as $student) {
                echo '<div class="name">
                    <h3>' . ucwords($student["studentName"]) . '</h3>
                </div>
                
                <div class="rollNumber">
                    <h3>' . $student["rollNumber"] . '</h3>
                </div>
                
                <div class="department">';
                    if($student["department"] != "") {
                        echo '<h4>Department of ' . ucwords(strtolower($depobj[$student["department"]])) . '</h4>';
                    }
                echo '</div>
                
                    <div class="semester">
                        <h4>';
                        if($student["currentSemester"] == 1) {
                            echo $student["currentSemester"] . '<sup>st</sup> semester';
                        }
                        else if($student["currentSemester"] == 2) {
                            echo $student["currentSemester"] . '<sup>nd</sup> semester';
                        }
                        else if($student["currentSemester"] == 3) {
                            echo $student["currentSemester"] . '<sup>rd</sup> semester';
                        }
                        else {
                            echo $student["currentSemester"] . '<sup>th</sup> semester';
                        }
                        echo '</h4>
                    </div>
                    
                    <div class="section">
                        <h4>';
                        if(ceil($student["currentSemester"]/2) == 1) {
                            echo 'I - ' . $student["department"] . ' - ' . $student["section"];
                        }
                        else if(ceil($student["currentSemester"]/2) == 2) {
                            echo 'II - ' . $student["department"] . ' - ' . $student["section"];
                        }
                        else if(ceil($student["currentSemester"]/2) == 3) {
                            echo 'III - ' . $student["department"] . ' - ' . $student["section"];
                        }
                        else if(ceil($student["currentSemester"]/2) == 4) {
                            echo 'IV - ' . $student["department"] . ' - ' . $student["section"];
                        }
                        echo '</h4>
                    </div>
                <div class="mail">
                    <h5>' . $studentEmail . '</h5>
                </div>';
            }
        }
    }

?>