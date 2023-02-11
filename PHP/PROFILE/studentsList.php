<?php
    // database-connection :: start
    require('PHP/DATABASE/databaseConnection.php');
    // database-connection :: end
?>

<?php
    $colors = array("goldenrod","aquamarine","blue","blueviolet","red","green","brown","chartreuse","chocolate","coral","cornflowerblue","crimson","darkgoldenrod","darkgreen","darkmagenta","darkred","deeppink","dodgerblue","firebrick","forestgreen","hotpink","magenta","maroon","mediumblue","mediumseagreen","mediumspringgreen","tomato");
    
        $staffEmail = $_SESSION['staffEmail'];
        $section = $_SESSION['section'];
        $semester = $_SESSION['semester'];
        $department = $_SESSION['department'];
        // fetching the particular class-students
        if($_SESSION['designation'] == 4) {
            $sql = " SELECT * FROM Student WHERE department = '$department' ORDER BY rollNumber;";
        }
        else {
            $sql = " SELECT * FROM Student WHERE section = '$section' AND currentSemester = '$semester' AND department = '$department' ORDER BY rollNumber;";
        }
        $result = mysqli_query($link,$sql);
        if(mysqli_num_rows($result) > 0) {
            // display the student list
            foreach($result as $student) {
                echo "<a href='studentInfoPage.php?id=" . $student['rollNumber'] . "' class='students-list' value='" . $student['rollNumber'] . "'>
                        <div class='student-profile-image' style='background-color: " . $colors[rand(0,26)] . ";'>" . strtoupper($student['studentEmail'][0]) . "</div>
                        <div class='student-profile-name'>" . $student['rollNumber'] . "</div>
                    </a>";
                
            }
        }
        else {
            
            // No student in the list
            echo "<div class='no-student'><i>Not yet student added.</i></div>";
        }
        
    
                    
?>