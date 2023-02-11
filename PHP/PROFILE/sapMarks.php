<?php

    // database-connection :: start
    require('PHP/DATABASE/databaseConnection.php');
    // database-connection :: end
?>

<?php
    
    if(isset($_SESSION['rollNumber'])) {
        $rollNumber = $_SESSION['rollNumber'];
        if(isset($_SESSION['reportSem'])) {
            $sem = $_SESSION['reportSem'];
        }
        else {
            $sem = $_SESSION['semester'];
        }
        $sql = " SELECT * FROM SAP_" . $_SESSION['studentBatch'] ."Batch WHERE  studentRollNumber = '$rollNumber' AND stateOfProcess = '1' AND semester = '$sem';";
        $result = mysqli_query($link,$sql);
        $totalMark = array(0,0,0,0,0,0,0,0,0,0,0,0,0);
        if(mysqli_num_rows($result) > 0) {
            foreach($result as $student) {
                if($student["sapCategory"] == 1 && $totalMark[0] <= 75) {
                    $totalMark[0] += $student["allocatedMark"];
                }
                else if($student["sapCategory"] == 2 && $totalMark[1] <= 100) {
                    $totalMark[1] += $student["allocatedMark"];
                }
                else if($student["sapCategory"] == 3 && $totalMark[2] <= 75) {
                    $totalMark[2] += $student["allocatedMark"];
                }
                else if($student["sapCategory"] == 4 && $totalMark[3] <= 100) {
                    $totalMark[3] += $student["allocatedMark"];
                }
                else if($student["sapCategory"] == 5 && $totalMark[4] <= 50) {
                    $totalMark[4] += $student["allocatedMark"];
                }
                else if($student["sapCategory"] == 6 && $totalMark[5] <= 100) {
                    $totalMark[5] += $student["allocatedMark"];
                }
                else if($student["sapCategory"] == 7 && $totalMark[6] <= 100) {
                    $totalMark[6] += $student["allocatedMark"];
                }
                else if($student["sapCategory"] == 8 && $totalMark[7] <= 100) {
                    $totalMark[7] += $student["allocatedMark"];
                }
                else if($student["sapCategory"] == 9 && $totalMark[8] <= 50) {
                    $totalMark[8] += $student["allocatedMark"];
                }
                else if($student["sapCategory"] == 10 && $totalMark[9] <= 50) {
                    $totalMark[9] += $student["allocatedMark"];
                }
                else if($student["sapCategory"] == 11 && $totalMark[10] <= 100) {
                    $totalMark[10] += $student["allocatedMark"];
                }
                else if($student["sapCategory"] == 12 && $totalMark[1] <= 50) {
                    $totalMark[11] += $student["allocatedMark"];
                }
                else if($student["sapCategory"] == 13 && $totalMark[1] <= 25) {
                    $totalMark[12] += $student["allocatedMark"];
                }
            }
        }
        
        echo '<div class="table-one table-responsive col-md-6">
                    <table class="table">
                        <tbody>
                          <tr class="success">
                            <td class="col-md-10">Paper Presentation</td>
                            <td class="col-md-2">' . $totalMark[0] . '/75</td>

                          </tr>
                          <tr class="danger">
                            <td class="col-md-10">Project Presentation</td>
                            <td class="col-md-2">' . $totalMark[1] . '/100</td>
                          </tr>
                          <tr class="info">
                            <td class="col-md-10">Techno Managerial Events</td>
                            <td class="col-md-2">' . $totalMark[2] . '/75</td>
                          </tr>
                          <tr class="success">
                            <td class="col-md-10">Sports and Games</td>
                            <td class="col-md-2">' . $totalMark[3] . '/100</td>
                          </tr>
                          <tr class="danger">
                            <td class="col-md-10">Membership</td>
                            <td class="col-md-2">' . $totalMark[4] . '/50</td>
                          </tr>
                          <tr class="info">
                            <td class="col-md-10">Leadership / Organization Events</td>
                            <td class="col-md-2 ">' . $totalMark[5] . '/100</td>
                          </tr>
                          <tr class="success">
                            <td class="col-md-10">VAC / Online Courses</td>
                            <td class="col-md-2">' . $totalMark[6] . '/100</td>
                          </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-two table-responsive col-md-6">
                    <table class="table">
                        <tbody>
                          <tr class="danger">
                            <td class="col-md-10">Project to Paper / Patent Copyright</td>
                            <td class="col-md-2">' . $totalMark[7] . '/100</td>
                          </tr>
                          <tr class="info">
                            <td class="col-md-10">GATE / CAT Govt Exams</td>
                            <td class="col-md-2">' . $totalMark[8] . '/75</td>
                          </tr>
                          <tr class="success">
                            <td class="col-md-10">Placement and Internship</td>
                            <td class="col-md-2">' . $totalMark[9] . '/50</td>
                          </tr>
                          <tr class="danger">
                            <td class="col-md-10">Entrepreneurship</td>
                            <td class="col-md-2">' . $totalMark[10] . '/100</td>
                          </tr>
                          <tr class="info">
                            <td class="col-md-10">Social Activities</td>
                            <td class="col-md-2 ">' . $totalMark[11] . '/50</td>
                          </tr>
                          <tr class="success">
                            <td class="col-md-10">Others (Culturals, Essay etc..)</td>
                            <td class="col-md-2 ">' . $totalMark[12] . '/25</td>
                          </tr>
                          <tr class="danger">
                            <td class="col-md-10">Total</td>
                            <td class="col-md-2 ">' . array_sum($totalMark) . '/100</td>
                          </tr>
                        </tbody>
                    </table>
                </div>';
        
        unset($_SESSION["rollNumber"]);
        unset($_SESSION["reportSem"]);
    }

?>