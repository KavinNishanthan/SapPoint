<?php

    session_start();
    // database-connection :: start
    require('../DATABASE/databaseConnection.php');
    // database-connection :: end
?>


<?php
    if(isset($_POST['eventId'])) {
        $eventId = $_POST['eventId'];
         
        $sql = "SELECT * FROM Events WHERE eventId = '$eventId';";
        $result = mysqli_query($link,$sql);
        
        if(mysqli_num_rows($result) > 0) {
            $dept = "CE,MECH,MTA,AU,CHE,FT,EEE,EIE,ECE,CSE,IT,CSD,AIML,AIDS";
            $year = "1,2,3,4";
            $event = mysqli_fetch_array($result);
            echo '<form class="form-horizontal" action="PHP/EVENTS/updateEvent.php" method="post" enctype="multipart/form-data">
            
                    <input type="hidden" name="eventId" value="' . $eventId . '" class="form-control" maxlength="30">
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="text" name="eventName" value="' . ucwords($event["eventName"]) . '" class="form-control" maxlength="30" required>
                            <label for="eventName">Event Name</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="text" name="eventOrganizer"  value="' . ucwords($event["eventOrganizer"]) . '" class="form-control" maxlength="30" required>
                            <label for="eventOrganizer">Event Organizer</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="text" name="institute" value="' . ucwords($event["institute"]) . '" class="form-control" maxlength="40" required>
                            <label for="institute">Institute</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <select class="form-control" name="eventType" required>
                                <option value="club events"';
                                if($event["eventType"] == "club events") {
                                    echo "selected = 'selected'";
                                }
                                echo '>Club Events</option>
                                <option value="hiring challenges"';
                                if($event["eventType"] == "hiring challenges") {
                                    echo "selected = 'selected'";
                                }
                                echo '>Hiring Challenges</option>
                                <option value="quizzes"';
                                if($event["eventType"] == "quizzes") {
                                    echo "selected = 'selected'";
                                }
                                echo '>Quizzes</option>
                                <option value="hackathons"';
                                if($event["eventType"] == "hackathons") {
                                    echo "selected = 'selected'";
                                }
                                echo '>Hackathons</option>
                                <option value="scholarships"';
                                if($event["eventType"] == "scholarships") {
                                    echo "selected = 'selected'";
                                }
                                echo '>Scholarships</option>
                                <option value="internships"';
                                if($event["eventType"] == "internships") {
                                    echo "selected = 'selected'";
                                }
                                echo '>Internships</option>
                                <option value="workshops"';
                                if($event["eventType"] == "workshops") {
                                    echo "selected = 'selected'";
                                }
                                echo '>Workshops</option>
                                <option value="cultural events"';
                                if($event["eventType"] == "cultural events") {
                                    echo "selected = 'selected'";
                                }
                                echo '>Cultural Events</option>
                                <option value="college festivals"';
                                if($event["eventType"] == "college festivals") {
                                    echo "selected = 'selected'";
                                }
                                echo '>College Festivals</option>
                            </select>
                            <label for="eventType">Event Type</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="date" name="eventDate" value="' . $event["dateOfEvent"] . '" class="form-control" maxlength="50" required>
                            <label for="eventDate">Date of Event</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="date" name="registrationDeadline" value="' . $event["registrationDeadLine"] . '" class="form-control" maxlength="50" required>
                            <label for="registrationDeadline">Registration Deadline</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="text" name="entryFee" value="' . $event["entryFee"] . '" class="form-control" maxlength="50" required>
                            <label for="entryFee">Entry Fee</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <select class="form-control" name="eligibility[]" required multiple="multiple">
                                <option value="ALL"';
                                if($event["eligibility"] == $year) {
                                    echo "selected = 'selected'";
                                }
                                echo '>All</option>
                                <option value="1"';
                                if(strpos($event["eligibility"],"1") !== false && $event["eligibility"] != $year) {
                                    echo "selected = 'selected'";
                                }
                                echo '>I</option>
                                <option value="2"';
                                if(strpos($event["eligibility"],"2") !== false && $event["eligibility"] != $year) {
                                    echo "selected = 'selected'";
                                }
                                echo '>II</option>
                                <option value="3"';
                                if(strpos($event["eligibility"],"3") !== false && $event["eligibility"] != $year) {
                                    echo "selected = 'selected'";
                                }
                                echo '>III</option>
                                <option value="4"';
                                if(strpos($event["eligibility"],"4") !== false && $event["eligibility"] != $year) {
                                    echo "selected = 'selected'";
                                }
                                echo '>IV</option>
                            </select>
                            <label for="eligibility">Eligibility</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <select class="form-control" name="department[]" required multiple="multiple">
                                <option value="ALL"';
                                if($event["department"] == $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>All</option>
                                <option value="CE"';
                                if(strpos($event["department"],"CE") !== false && $event["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Civil Engineering</option>
                                <option value="MECH"';
                                if(strpos($event["department"],"MECH") !== false && $event["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Mechanical Engineering</option>
                                <option value="MTA"';
                                if(strpos($event["department"],"MTA") !== false && $event["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Mechatronics Engineering</option>
                                <option value="AU"';
                                if(strpos($event["department"],"AU") !== false && $event["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Automobile Engineering</option>
                                <option value="CHE"';
                                if(strpos($event["department"],"CHE") !== false && $event["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Chemical Engineering</option>
                                <option value="FT"';
                                if(strpos($event["department"],"FT") !== false && $event["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Food Technology</option>
                                <option value="EEE"';
                                if(strpos($event["department"],"EEE") !== false && $event["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Electrical and Electronics Engineering</option>
                                <option value="EIE"';
                                if(strpos($event["department"],"EIE") !== false && $event["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Electronics and Instrumentation Engineering</option>
                                <option value="ECE"';
                                if(strpos($event["department"],"ECE") !== false && $event["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Electronics and Communication Engineering</option>
                                <option value="CSE"';
                                if(strpos($event["department"],"CSE") !== false && $event["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Computer Science and Engineering</option>
                                <option value="IT"';
                                if(strpos($event["department"],"IT") !== false && $event["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Information Technology</option>
                                <option value="CSD"';
                                if(strpos($event["department"],"CSD") !== false && $event["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Computer Science and Design</option>
                                <option value="AIML"';
                                if(strpos($event["department"],"AIML") !== false && $event["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Artificial Intelligence and Machine Learning</option>
                                <option value="AIDS"';
                                if(strpos($event["department"],"AIDS") !== false && $event["department"] != $dept) {
                                    echo "selected = 'selected'";
                                }
                                echo '>Artificial Intelligence and Data Science</option>
                            </select>
                            <label for="department">Department</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <select class="form-control" name="eventCategory" required>
                                <option value="1"';
                                if($event["eventCategory"] == '1') {
                                    echo "selected = 'selected'";
                                }
                                echo '>Inside</option>
                                <option value="2"';
                                if($event["eventCategory"] == '2') {
                                    echo "selected = 'selected'";
                                }
                                echo '>Outside</option>
                            </select>
                            <label for="eventCategory">Event Category</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="text" name="coordinatorName" value="' . $event["coordinatorName"] . '" class="form-control" maxlength="50" required>
                            <label for="coordinatorName">Co-ordinator Name</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="text" name="coordinatorNumber" value="' . $event["coordinatorNumber"] . '" class="form-control" maxlength="50" required>
                            <label for="coordinatorNumber">Co-ordinator Number</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <textarea type="text" name="eventDescription" class="form-control" maxlength="500" rows="5" required>' . $event["eventDescription"] . '</textarea>
                            <label for="eventDescription">Event Description</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="file" name="eventImage" id="eventImage" class="form-control">
                            <label for="eventImage">Event Image</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="link" name="eventLink"  value="' . $event["eventLink"] . '" class="form-control" maxlength="50" required>
                            <label for="eventLink">Event Link</label>
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