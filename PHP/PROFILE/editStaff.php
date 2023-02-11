<?php

    session_start();
    // database-connection :: start
    require('../DATABASE/databaseConnection.php');
    // database-connection :: end
?>


<?php
    if(isset($_POST['staffId'])) {
        $staffId = $_POST['staffId'];
        
        $sql = "SELECT * FROM Staff WHERE staffId = '$staffId';";
        $result = mysqli_query($link,$sql);
        if(mysqli_num_rows($result) > 0) {
            $staff = mysqli_fetch_array($result); 
            echo '<form class="form-horizontal" action="PHP/PROFILE/updateStaff.php" method="post">
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="text" name="staffIds" value="' . $staff["staffId"] . '" class="form-control" maxlength="10" required disabled>
                            <label for="staffIds">Roll Number</label>
                        </div>
                    </div>
                    
                    <input type="hidden" name="staffId" value="' . $staff["staffId"] . '" class="form-control">
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="text" name="staffName" value="' . ucwords($staff["staffName"]) . '" class="form-control" maxlength="50" required>
                            <label for="staffName">Staff Name</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="email" name="staffEmail" value="' . $staff["staffEmail"] . '" class="form-control" maxlength="50" required>
                            <label for="staffEmail">Staff Email</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <select class="form-control" name="department" required>
                                <option value="CE"';
                                    if($staff["department"] == "CE") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Civil Engineering</option>
                                <option value="MECH"';
                                    if($staff["department"] == "MECH") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Mechanical Engineering</option>
                                <option value="MTA"';
                                    if($staff["department"] == "MTA") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Mechatronics Engineering</option>
                                <option value="AU"';
                                    if($staff["department"] == "AU") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Automobile Engineering</option>
                                <option value="CHE"';
                                    if($staff["department"] == "CHE") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Chemical Engineering</option>
                                <option value="FT"';
                                    if($staff["department"] == "FT") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Food Technology</option>
                                <option value="EEE"';
                                    if($staff["department"] == "EEE") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Electrical and Electronics Engineering</option>
                                <option value="EIE"';
                                    if($staff["department"] == "EIE") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Electronics and Instrumentation Engineering</option>
                                <option value="ECE"';
                                    if($staff["department"] == "ECE") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Electronics and Communication Engineering</option>
                                <option value="CSE"';
                                    if($staff["department"] == "CSE") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Computer Science and Engineering</option>
                                <option value="IT"';
                                    if($staff["department"] == "IT") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Information Technology</option>
                                <option value="CSD"';
                                    if($staff["department"] == "CSD") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Computer Science and Design</option>
                                <option value="AIML"';
                                    if($staff["department"] == "AIML") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Artificial Intelligence and Machine Learning</option>
                                <option value="AIDS"';
                                    if($staff["department"] == "AIDS") {
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
                                    if($staff["currentSemester"] == "1") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>I</option>
                                <option value="2"';
                                    if($staff["currentSemester"] == "2") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>II</option>
                                <option value="3"';
                                    if($staff["currentSemester"] == "3") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>III</option>
                                <option value="4"';
                                    if($staff["currentSemester"] == "4") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>IV</option>
                                <option value="5"';
                                    if($staff["currentSemester"] == "5") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>V</option>
                                <option value="6"';
                                    if($staff["currentSemester"] == "6") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>VI</option>
                                <option value="7"';
                                    if($staff["currentSemester"] == "7") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>VII</option>
                                <option value="8"';
                                    if($staff["currentSemester"] == "8") {
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
                                    if($staff["section"] == "A") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>A</option>
                                <option value="B"';
                                    if($staff["section"] == "B") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>B</option>
                                <option value="C"';
                                    if($staff["section"] == "C") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>C</option>
                                <option value="D"';
                                    if($staff["section"] == "D") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>D</option>
                            </select>
                            <label for="section">Section</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <select class="form-control" name="designation" required>
                                <option value="1"';
                                    if($staff["designation"] == "1") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Class Advisor</option>
                                <option value="2"';
                                    if($staff["designation"] == "2") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Teaching Staff</option>
                                <option value="3"';
                                    if($staff["designation"] == "3") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Non Teaching Staff</option>
                                <option value="4"';
                                    if($staff["designation"] == "4") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Head of the Department</option>
                            </select>
                            <label for="designation">Designation</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="text" name="studentBatch" value="' . $staff["studentBatch"] . '" class="form-control" maxlength="4" required>
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