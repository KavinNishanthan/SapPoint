<?php
    
    // database-connection :: start
    require('PHP/DATABASE/databaseConnection.php');
    // database-connection :: end
    
?>

<?php

    if(isset($_SESSION['rollNumber'])) {
        $rollNumber = $_SESSION['rollNumber'];
        $studentBatch = $_SESSION['studentBatch'];
        $semester = $_SESSION['semester'];
        $sql1 = "SELECT * FROM Activity_Points";
        $activityPoints = mysqli_query($link,$sql1);
        // fetching the particular class-students
        $sql = " SELECT * FROM SAP_" . $studentBatch ."Batch WHERE  studentRollNumber = '$rollNumber' AND semester = '$semester' ORDER BY stateOfProcess;";
        $result = mysqli_query($link,$sql);
        if(mysqli_num_rows($result) > 0) {
            // display the student list
            foreach($result as $student) {
                foreach($activityPoints as $ap) {
                    if($ap['sapCategory'] == $student['sapCategory'] && $ap['subCategory'] == $student['conductionCategory'] && $ap['prizeWon'] == $student['prizeWon']) {
                        if($ap['prizeWon'] == '0') {
                            $divElement = strtoupper($ap['Title']) . "<br>" . $ap['description'];
                            $points = $ap['points'];
                        }
                        else {
                            $divElement = strtoupper($ap['Title']) . "<br>" . $ap['description'] . "  <i class='fa-solid fa-trophy prize'></i>";
                            $points = $ap['points'];
                        }
                    }
                }
                
      
                if($student['conductivityMode'] == 1) {
                    echo "<div class='card-blocks'>
                            <div class='points'style='background-color:rgb(255, 3, 192);'>";
                            if($student['stateOfProcess'] == 0 || $student['stateOfProcess'] == 2) {
                                echo $points;
                            } 
                            else {
                                echo $student['allocatedMark'];
                            }
                            echo "</div>
                                <div class='document-submitted'> " . $divElement . " </div>
                                <div class='state'>";
                                if($student['stateOfProcess'] == 0) {
                                    echo "<div class='waiting'>Waiting</div>";
                                }
                                else if($student['stateOfProcess'] == 1) {
                                    echo "<div class='accepted'>Accepted</div>";
                                }
                                else {
                                    echo "<div class='rejected'>Rejected</div>";
                                }
                                echo "</div>
                                <button class='btn view-button' onclick = viewButton('" . $student['sapId'] . "')>VIEW</button>
                            </div>";
                }
                else {
                    echo "<div class='card-blocks'>
                            <div class='points'style='background-color:rgb(0, 254, 110);'>"; 
                            if($student['stateOfProcess'] == 0 || $student['stateOfProcess'] == 2) {
                                echo $points;
                            } 
                            else {
                                echo $student['allocatedMark'];
                            }
                            echo "</div>
                                <div class='document-submitted'> " . $divElement . " </div>
                                <div class='state'>";
                                if($student['stateOfProcess'] == 0) {
                                    echo "<div class='waiting'>Waiting</div>";
                                }
                                else if($student['stateOfProcess'] == 1) {
                                    echo "<div class='accepted'>Accepted</div>";
                                }
                                else {
                                    echo "<div class='rejected'>Rejected</div>";
                                }
                                echo "</div>
                                <button class='btn view-button' onclick = viewButton('" . $student['sapId'] . "')>VIEW</button>
                            </div>";
                }
            }
        }
        else {
            echo '<div class="no-record-container">
                    <img src="IMAGES/noData.jpg" alt="No Record"/>
                </div>';
            echo "<div class='no-student'><i>No record available.</i></div>";
        }
    }
?>