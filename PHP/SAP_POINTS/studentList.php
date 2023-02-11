<?php
    // database-connection :: start
    require('PHP/DATABASE/databaseConnection.php');
    // database-connection :: end
?>

<?php
    $colors = array("goldenrod","aquamarine","blue","blueviolet","red","green","brown","chartreuse","chocolate","coral","cornflowerblue","crimson","darkgoldenrod","darkgreen","darkmagenta","darkred","deeppink","dodgerblue","firebrick","forestgreen","hotpink","lime","limegreen","magenta","maroon","mediumblue","mediumseagreen","mediumspringgreen","tomato","yellogreen");
    
        $staffEmail = $_SESSION['staffEmail'];
        $section = $_SESSION['section'];
        $semester = $_SESSION['semester'];
        $department = $_SESSION['department'];
	$studentBatch  = $_SESSION['studentBatch'];
        // fetching the particular class-students
        if($_SESSION['designation'] == '1') {
            $sql = " SELECT * FROM Student WHERE section = '$section' AND currentSemester = '$semester' AND department = '$department' ORDER BY rollNumber;;";
        }        
	$result = mysqli_query($link,$sql);
        if(mysqli_num_rows($result) > 0) {
            $staff_sql = "SELECT staffName,staffEmail from Staff WHERE section = '$section' AND currentSemester = '$semester' AND department = '$department' AND studentBatch = '$studentBatch' AND NOT staffName = 'malliga s' ORDER BY staffName;";
            $staff_result = mysqli_query($link,$staff_sql);
            if(mysqli_num_rows($staff_result) > 0) {
                $i=1;
                $student_count = mysqli_num_rows($result);
                $staff_count = mysqli_num_rows($staff_result);
                $student_range = floor($student_count/$staff_count);
                while($staff = mysqli_fetch_array($staff_result)) {
                    echo '<label class="staffs-list" for="checkStaff' . $i . '">
                            <div class="staff-profile-image">' . strtoupper($staff['staffName'][0]) . '</div>
                            <div class="staff-profile-name">' . strtoupper($staff['staffName']) . '</div>
                            </label>
                            <input id="checkStaff' . $i . '" type="checkbox">
                            <div class="staff' . $i . '">';
                                $j = 1;
                                foreach($result as $student) {
                                    if($i == 1 && ($j >= 0 && $j <= $student_range)) {
                                        echo "<button class='students-list' onclick=openStudent('" . $student['rollNumber'] . "')>
                                            <div class='student-profile-image' style='background-color: " . $colors[rand(0,29)] . ";'>" . strtoupper($student['studentEmail'][0]) . "</div>
                                            <div class='student-profile-name'>" . $student['rollNumber'] . "<span class='name-container'>".$student['studentName']."</span></div>";
					    $rollNumber = $student['rollNumber'];
					    $sql = " SELECT COUNT(sapId) FROM SAP_" . $studentBatch ."Batch WHERE  studentRollNumber = '$rollNumber' AND stateOfProcess = '0';";
        				    $notification= mysqli_fetch_array(mysqli_query($link,$sql));
					    if($notification[0] > 0) {
						echo "<div class='notification-container'>" . $notification[0] . "</div>";
					    }

                                        echo "</button>";
                                    }
                                    else if($i == 2 && ($j > $student_range && $j <= 2*$student_range)) {
                                        echo "<button class='students-list' onclick=openStudent('" . $student['rollNumber'] . "')>
                                            <div class='student-profile-image' style='background-color: " . $colors[rand(0,29)] . ";'>" . strtoupper($student['studentEmail'][0]) . "</div>
                                            <div class='student-profile-name'>" . $student['rollNumber'] . "<span class='name-container'>".$student['studentName']."</span></div>";
					    $rollNumber = $student['rollNumber'];
					    $sql = " SELECT COUNT(sapId) FROM SAP_" . $studentBatch ."Batch WHERE  studentRollNumber = '$rollNumber' AND stateOfProcess = '0';";
        				    $notification= mysqli_fetch_array(mysqli_query($link,$sql));
					    if($notification[0] > 0) {
						echo "<div class='notification-container'>" . $notification[0] . "</div>";
					    }

                                        echo "
					    
                                        </button>";
                                    }
                                    else if($i == 3 && $j > 2*$student_range) {
                                        echo "<button class='students-list' onclick=openStudent('" . $student['rollNumber'] . "')>
                                            <div class='student-profile-image' style='background-color: " . $colors[rand(0,29)] . ";'>" . strtoupper($student['studentEmail'][0]) . "</div>
                                            <div class='student-profile-name'>" . $student['rollNumber'] . "<span class='name-container'>".$student['studentName']."</span></div>";
					    $rollNumber = $student['rollNumber'];
					    $sql = " SELECT COUNT(sapId) FROM SAP_" . $studentBatch ."Batch WHERE  studentRollNumber = '$rollNumber' AND stateOfProcess = '0';";
        				    $notification= mysqli_fetch_array(mysqli_query($link,$sql));
					    if($notification[0] > 0) {
						echo "<div class='notification-container'>" . $notification[0] . "</div>";
					    }

                                        echo "</button>";
                                    }
                                    $j++;
                                }
                            echo '</div>';
                    $i++;
                }
            }
        }
        else {
            
            // No student in the list
            echo '<div class="no-student-container">
                    <img src="IMAGES/noData.jpg" alt="No Record"/>
                </div>';
            echo "<div class='no-student'><i>Not yet student added.</i></div>";
        }
                    
?>