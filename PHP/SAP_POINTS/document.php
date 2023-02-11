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
        $sql = " SELECT * FROM SAP_" . $studentBatch . "Batch WHERE  studentRollNumber = '$rollNumber' AND stateOfProcess = '1' ORDER BY sapCategory;";
        $result = mysqli_query($link,$sql);
        if(mysqli_num_rows($result) > 0) {
                                
            // display the student list
            foreach($result as $student) {
                $doc = explode(" ",$student['TimeOfUpload']);
                $documentDate = date("d-m-Y", strtotime($doc[0]));
                $documentTime = date('g:i a', strtotime($doc[1]));
                if($student['sapCategory'] == '1') {
                    echo '<div class="category-header-container"><h4>Paper Presentation</h4></div>
                        <div class="time-container">
                            <div>Date : ' . $documentDate . '</div>
                            <div>Time : ' . $documentTime . '</div>
                        </div>
                        <div class="paper-presentation-container">
                            <embed src="data:application/pdf;base64,' . $student['sapDocument'] . '" class="sap-document"/>
                        </div>';
                }
                else if($student['sapCategory'] == '2') {
                    echo '<div class="category-header-container"><h4>Project Presentation</h4></div>
                        <div class="time-container">
                            <div>Date : ' . $documentDate . '</div>
                            <div>Time : ' . $documentTime . '</div>
                        </div>
                        <div class="paper-presentation-container">
                            <embed src="data:application/pdf;base64,' . $student['sapDocument'] . '" class="sap-document"/>
                        </div>';
                }
                else if($student['sapCategory'] == '3') {
                    echo '<div class="category-header-container"><h4>Techno Managerial Events</h4></div>
                        <div class="time-container">
                            <div>Date : ' . $documentDate . '</div>
                            <div>Time : ' . $documentTime . '</div>
                        </div>
                        <div class="paper-presentation-container">
                            <embed src="data:application/pdf;base64,' . $student['sapDocument'] . '" class="sap-document"/>
                        </div>';
                }
                else if($student['sapCategory'] == '4') {
                    echo '<div class="category-header-container"><h4>Sports and Games</h4></div>
                        <div class="time-container">
                            <div>Date : ' . $documentDate . '</div>
                            <div>Time : ' . $documentTime . '</div>
                        </div>
                        <div class="paper-presentation-container">
                            <embed src="data:application/pdf;base64,' . $student['sapDocument'] . '" class="sap-document"/>
                        </div>';
                }
                else if($student['sapCategory'] == '5') {
                    echo '<div class="category-header-container"><h4>Membership</h4></div>
                        <div class="time-container">
                            <div>Date : ' . $documentDate . '</div>
                            <div>Time : ' . $documentTime . '</div>
                        </div>
                        <div class="paper-presentation-container">
                            <embed src="data:application/pdf;base64,' . $student['sapDocument'] . '" class="sap-document"/>
                        </div>';
                }
                else if($student['sapCategory'] == '6') {
                    echo '<div class="category-header-container"><h4>Leadership / Organization Events</h4></div>
                        <div class="time-container">
                            <div>Date : ' . $documentDate . '</div>
                            <div>Time : ' . $documentTime . '</div>
                        </div>
                        <div class="paper-presentation-container">
                            <embed src="data:application/pdf;base64,' . $student['sapDocument'] . '" class="sap-document"/>
                        </div>';
                }
                else if($student['sapCategory'] == '7') {
                    echo '<div class="category-header-container"><h4>VAC / Online Courses</h4></div>
                        <div class="time-container">
                            <div>Date : ' . $documentDate . '</div>
                            <div>Time : ' . $documentTime . '</div>
                        </div>
                        <div class="paper-presentation-container">
                            <embed src="data:application/pdf;base64,' . $student['sapDocument'] . '" class="sap-document"/>
                        </div>';
                }
                else if($student['sapCategory'] == '8') {
                    echo '<div class="category-header-container"><h4>Project to Paper / Patent Copyright</h4></div>
                        <div class="time-container">
                            <div>Date : ' . $documentDate . '</div>
                            <div>Time : ' . $documentTime . '</div>
                        </div>
                        <div class="paper-presentation-container">
                            <embed src="data:application/pdf;base64,' . $student['sapDocument'] . '" class="sap-document"/>
                        </div>';
                }
                else if($student['sapCategory'] == '9') {
                    echo '<div class="category-header-container"><h4>GATE / CAT / Govt Exams</h4></div>
                        <div class="time-container">
                            <div>Date : ' . $documentDate . '</div>
                            <div>Time : ' . $documentTime . '</div>
                        </div>
                        <div class="paper-presentation-container">
                            <embed src="data:application/pdf;base64,' . $student['sapDocument'] . '" class="sap-document"/>
                        </div>';
                }
                else if($student['sapCategory'] == '10') {
                    echo '<div class="category-header-container"><h4>Placement and Internship</h4></div>
                        <div class="time-container">
                            <div>Date : ' . $documentDate . '</div>
                            <div>Time : ' . $documentTime . '</div>
                        </div>
                        <div class="paper-presentation-container">
                            <embed src="data:application/pdf;base64,' . $student['sapDocument'] . '" class="sap-document"/>
                        </div>';
                }
                else if($student['sapCategory'] == '11') {
                    echo '<div class="category-header-container"><h4>Entrepreneurship</h4></div>
                        <div class="time-container">
                            <div>Date : ' . $documentDate . '</div>
                            <div>Time : ' . $documentTime . '</div>
                        </div>
                        <div class="paper-presentation-container">
                            <embed src="data:application/pdf;base64,' . $student['sapDocument'] . '" class="sap-document"/>
                        </div>';
                }
                else if($student['sapCategory'] == '12') {
                    echo '<div class="category-header-container"><h4>Social Activities</h4></div>
                        <div class="time-container">
                            <div>Date : ' . $documentDate . '</div>
                            <div>Time : ' . $documentTime . '</div>
                        </div>
                        <div class="paper-presentation-container">
                            <embed src="data:application/pdf;base64,' . $student['sapDocument'] . '" class="sap-document"/>
                        </div>';
                }
                else if($student['sapCategory'] == '13') {
                    echo '<div class="category-header-container"><h4>Others(Culturals,Essay etc..)</h4></div>
                        <div class="time-container">
                            <div>Date : ' . $documentDate . '</div>
                            <div>Time : ' . $documentTime . '</div>
                        </div>
                        <div class="paper-presentation-container">
                            <embed src="data:application/pdf;base64,' . $student['sapDocument'] . '" class="sap-document"/>
                        </div>';
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