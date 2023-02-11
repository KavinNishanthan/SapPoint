<?php
    
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
            foreach($result as $std) {
                $studentBatch = $std['studentBatch'];
            }
        }
        $sql1 = "SELECT * FROM Activity_Points";
        $activityPoints = mysqli_query($link,$sql1);
        // fetching the particular class-students
        $sql = " SELECT * FROM SAP_" . $studentBatch . "Batch WHERE  studentRollNumber = '$rollNumber' AND stateOfProcess = '1';";
        $result = mysqli_query($link,$sql);
        if(mysqli_num_rows($result) > 0) {
                                
            // display the student list
            foreach($result as $student) {
                foreach($activityPoints as $ap) {
                    if($ap['sapCategory'] == $student['sapCategory'] && $ap['subCategory'] == $student['conductionCategory'] && $ap['prizeWon'] == $student['prizeWon']) {
                        if($ap['prizeWon'] == '0') {
                            $divElement = strtoupper($ap['Title']) . "<br>" . $ap['description'];
                        }
                        else {
                            $divElement = strtoupper($ap['Title']) . "<br>" . $ap['description'] . "  <i class='fa-solid fa-trophy prize'></i>";
                        }
                    }
                }
                
                
                if($student['conductivityMode'] == 1) {
                    echo "<div class='card-blocks'>
                            <div class='points'style='background-color:rgb(255, 3, 192);'>" . $student['allocatedMark'] . "</div>
                                <div class='document-submitted'> " . $divElement . " </div>
                                <button class='btn view-button' onclick = viewButton('" . $student['sapId'] . "','" . $rollNumber . "')>VIEW</button>
                            </div>";
                }
                else {
                    echo "<div class='card-blocks'>
                            <div class='points'style='background-color:rgb(0, 254, 110);'>" . $student['allocatedMark'] . "</div>
                                <div class='document-submitted'> " . $divElement . " </div>
                                <button class='btn view-button' onclick = viewButton('" . $student['sapId'] . "','" . $rollNumber . "')>VIEW</button>
                            </div>";
                }
            }
        }
        else {
            // No student in the list
            echo '<div class="no-record-container">
                    <img src="IMAGES/noData.jpg" alt="No Record"/>
                </div>';
            echo "<div class='not-submitted'><i>Not yet document accepted.</i></div>";
        }
    }
    
?>