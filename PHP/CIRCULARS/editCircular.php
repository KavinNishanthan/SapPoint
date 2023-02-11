<?php

    session_start();
    // database-connection :: start
    require('../DATABASE/databaseConnection.php');
    // database-connection :: end
?>


<?php
    if(isset($_POST['circularNumber'])) {
        $circularNumber = $_POST['circularNumber'];
         
        $sql = "SELECT * FROM Circulars WHERE circularNumber = '$circularNumber';";
        $result = mysqli_query($link,$sql);
        
        if(mysqli_num_rows($result) > 0) {
            $dept = "CE,MECH,MTA,AU,CHE,FT,EEE,EIE,ECE,CSE,IT,CSD,AIML,AIDS";
            $year = "1,2,3,4";
            $circular = mysqli_fetch_array($result);
            echo '<form class="form-horizontal" action="PHP/CIRCULARS/updateCircular.php" method="post">
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="text" name="circularNumbers" value="' . ucwords($circular["circularNumber"]) . '" class="form-control" maxlength="50" disabled>
                            <label for="circularNumbers">Circular Number</label>
                        </div>
                    </div>
                    
                    <input type="hidden" name="circularNumber" value="' . $circular["circularNumber"] . '" class="form-control" maxlength="50">
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="text" name="circularTitle" value="' . ucwords($circular["circularTitle"]) . '" class="form-control" maxlength="50" required>
                            <label for="circularTitle">Circular Title</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <textarea type="text" name="circularDescription" class="form-control" maxlength="250" rows="3" required>' . $circular["circularDescription"] . '</textarea>
                            <label for="circularDescription">Circular Description</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <select class="form-control" name="department[]" required multiple="multiple">
                                <option value="ALL"';
                                if($circular["department"] == $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>All</option>
                                <option value="CE"';
                                if(strpos($circular["department"],"CE") !== false && $circular["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Civil Engineering</option>
                                <option value="MECH"';
                                if(strpos($circular["department"],"MECH") !== false && $circular["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Mechanical Engineering</option>
                                <option value="MTA"';
                                if(strpos($circular["department"],"MTA") !== false && $circular["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Mechatronics Engineering</option>
                                <option value="AU"';
                                if(strpos($circular["department"],"AU") !== false && $circular["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Automobile Engineering</option>
                                <option value="CHE"';
                                if(strpos($circular["department"],"CHE") !== false && $circular["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Chemical Engineering</option>
                                <option value="FT"';
                                if(strpos($circular["department"],"FT") !== false && $circular["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Food Technology</option>
                                <option value="EEE"';
                                if(strpos($circular["department"],"EEE") !== false && $circular["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Electrical and Electronics Engineering</option>
                                <option value="EIE"';
                                if(strpos($circular["department"],"EIE") !== false && $circular["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Electronics and Instrumentation Engineering</option>
                                <option value="ECE"';
                                if(strpos($circular["department"],"ECE") !== false && $circular["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Electronics and Communication Engineering</option>
                                <option value="CSE"';
                                if(strpos($circular["department"],"CSE") !== false && $circular["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Computer Science and Engineering</option>
                                <option value="IT"';
                                if(strpos($circular["department"],"IT") !== false && $circular["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Information Technology</option>
                                <option value="CSD"';
                                if(strpos($circular["department"],"CSD") !== false && $circular["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Computer Science and Design</option>
                                <option value="AIML"';
                                if(strpos($circular["department"],"AIML") !== false && $circular["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Artificial Intelligence and Machine Learning</option>
                                <option value="AIDS"';
                                if(strpos($circular["department"],"AIDS") !== false && $circular["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Artificial Intelligence and Data Science</option>
                            </select>
                            <label for="department">Department</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <select class="form-control" name="year[]" required multiple="multiple">
                                <option value="ALL"';
                                if($circular["yearCircular"] == $year) {
                                    echo "selected = 'selected'";
                                }
                                echo '>All</option>
                                <option value="1"';
                                if(strpos($circular["yearCircular"],"1") !== false && $circular["yearCircular"] != $year) {
                                    echo "selected = 'selected'";
                                }
                                echo '>I</option>
                                <option value="2"';
                                if(strpos($circular["yearCircular"],"2") !== false && $circular["yearCircular"] != $year) {
                                    echo "selected = 'selected'";
                                }
                                echo '>II</option>
                                <option value="3"';
                                if(strpos($circular["yearCircular"],"3") !== false && $circular["yearCircular"] != $year) {
                                    echo "selected = 'selected'";
                                }
                                echo '>III</option>
                                <option value="4"';
                                if(strpos($circular["yearCircular"],"4") !== false && $circular["yearCircular"] != $year) {
                                    echo "selected = 'selected'";
                                }
                                echo '>IV</option>
                            </select>
                            <label for="year">Year</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <select class="form-control" name="userCategory" required>
                                <option value="0"';
                                if($circular["userCategory"] == '0') {
                                    echo "selected = 'selected'";
                                }
                                echo '>All</option>
                                <option value="1"';
                                if($circular["userCategory"] == '1') {
                                    echo "selected = 'selected'";
                                }
                                echo '>Staff</option>
                                <option value="2"';
                                if($circular["userCategory"] == '2') {
                                    echo "selected = 'selected'";
                                }
                                echo '>Student</option>
                            </select>
                            <label for="userCategory">Category</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="link" name="documentLink" value="' . $circular["documentLink"] . '" class="form-control" maxlength="50" required>
                            <label for="documentLink">Document Link</label>
                        </div>
                    </div>
                    
                    <div class="submit-button-container">
                        <button type="reset" class="btn reset-button">CANCEL</button>
                        <button type="submit" name="save" class="btn upload-button">UPLOAD</button>
                    </div>
                    
                </form>';
        }
    }
?>