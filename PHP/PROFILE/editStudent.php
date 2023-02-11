<?php

    session_start();
    // database-connection :: start
    require('../DATABASE/databaseConnection.php');
    // database-connection :: end
?>


<?php
    if(isset($_POST['rollNumber'])) {
        $rollNumber = $_POST['rollNumber'];
        
        $sql = "SELECT * FROM Student WHERE rollNumber = '$rollNumber';";
        $result = mysqli_query($link,$sql);
        if(mysqli_num_rows($result) > 0) {
            $student = mysqli_fetch_array($result); 
            echo '<form class="form-horizontal" action="PHP/PROFILE/updateStudent.php" method="post">
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="text" name="rollNumbers" value="' . $student["rollNumber"] . '" class="form-control" maxlength="10" required disabled>
                            <label for="rollNumbers">Roll Number</label>
                        </div>
                    </div>
                    
                    <input type="hidden" name="rollNumber" value="' . $student["rollNumber"] . '" class="form-control">
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="text" name="studentName" value="' . ucwords($student["studentName"]) . '" class="form-control" maxlength="50" required>
                            <label for="studentName">Student Name</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="email" name="studentEmail" value="' . $student["studentEmail"] . '" class="form-control" maxlength="50" required>
                            <label for="studentEmail">Student Email</label>
                        </div>
                    </div>

			<div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="text" name="mentor" value="' . $student["mentor"] . '" class="form-control" maxlength="50" required>
                            <label for="mentor">Mentor</label>
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <select class="form-control" name="department" required>
                                <option value="CE"';
                                    if($student["department"] == "CE") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Civil Engineering</option>
                                <option value="MECH"';
                                    if($student["department"] == "MECH") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Mechanical Engineering</option>
                                <option value="MTA"';
                                    if($student["department"] == "MTA") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Mechatronics Engineering</option>
                                <option value="AU"';
                                    if($student["department"] == "AU") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Automobile Engineering</option>
                                <option value="CHE"';
                                    if($student["department"] == "CHE") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Chemical Engineering</option>
                                <option value="FT"';
                                    if($student["department"] == "FT") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Food Technology</option>
                                <option value="EEE"';
                                    if($student["department"] == "EEE") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Electrical and Electronics Engineering</option>
                                <option value="EIE"';
                                    if($student["department"] == "EIE") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Electronics and Instrumentation Engineering</option>
                                <option value="ECE"';
                                    if($student["department"] == "ECE") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Electronics and Communication Engineering</option>
                                <option value="CSE"';
                                    if($student["department"] == "CSE") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Computer Science and Engineering</option>
                                <option value="IT"';
                                    if($student["department"] == "IT") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Information Technology</option>
                                <option value="CSD"';
                                    if($student["department"] == "CSD") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Computer Science and Design</option>
                                <option value="AIML"';
                                    if($student["department"] == "AIML") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Artificial Intelligence and Machine Learning</option>
                                <option value="AIDS"';
                                    if($student["department"] == "AIDS") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Artificial Intelligence and Data Science</option>
                            </select>
                            <label for="department">Department</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <select class="form-control" name="semester" required>
                                <option value="1"';
                                    if($student["currentSemester"] == "1") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>I</option>
                                <option value="2"';
                                    if($student["currentSemester"] == "2") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>II</option>
                                <option value="3"';
                                    if($student["currentSemester"] == "3") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>III</option>
                                <option value="4"';
                                    if($student["currentSemester"] == "4") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>IV</option>
                                <option value="5"';
                                    if($student["currentSemester"] == "5") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>V</option>
                                <option value="6"';
                                    if($student["currentSemester"] == "6") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>VI</option>
                                <option value="7"';
                                    if($student["currentSemester"] == "7") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>VII</option>
                                <option value="8"';
                                    if($student["currentSemester"] == "8") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>VIII</option>
                            </select>
                            <label for="semester">Semester</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <select class="form-control" name="section" required>
                                <option value="A"';
                                    if($student["section"] == "A") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>A</option>
                                <option value="B"';
                                    if($student["section"] == "B") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>B</option>
                                <option value="C"';
                                    if($student["section"] == "C") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>C</option>
                                <option value="D"';
                                    if($student["section"] == "D") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>D</option>
                            </select>
                            <label for="section">Section</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="text" name="studentBatch" value="' . $student["studentBatch"] . '" class="form-control" maxlength="4" required>
                            <label for="studentBatch">Student Batch</label>
                        </div>
                    </div>
                    
                    <div class="submit-button-container">
                        <button type="reset" class="btn reset-button">CANCEL</button>
                        <button type="submit" name="save" class="btn upload-button">SAVE</button>
                    </div>
                    
                </form>';
        }
    }
?>