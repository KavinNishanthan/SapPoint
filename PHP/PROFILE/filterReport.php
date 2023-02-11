<?php

    session_start();
    // database-connection :: start
    require('../DATABASE/databaseConnection.php');
    // database-connection :: end
    
?>

<?php
        if(isset($_POST['id'])) {
            $section = $_POST['section'];
            $semester = $_POST['semester'];
            if($_SESSION['designation'] == 5) {
                $department = $_POST['department'];
                if($department != "DEPARTMENT" && $department != "ALL" && $section != "SECTION" && $section != "ALL" && $semester != "SEMESTER" && $semester != "ALL") {
                    $sql = "SELECT * FROM Student WHERE department = '$department' AND section = '$section' AND currentSemester = '$semester' ORDER BY rollNumber";
                }
                else if($department != "DEPARTMENT" && $department != "ALL" && $section != "SECTION" && $section != "ALL") {
                   $sql = "SELECT * FROM Student WHERE department = '$department' AND section = '$section' ORDER BY rollNumber";
               }
               else if($department != "DEPARTMENT" && $department != "ALL" && $semester != "SEMESTER" && $semester != "ALL") {
                    $sql = "SELECT * FROM Student WHERE department = '$department' AND currentSemester = '$semester' ORDER BY rollNumber";
                }
                else if($section != "SECTION" && $section != "ALL" && $semester != "SEMESTER" && $semester != "ALL") {
                    $sql = "SELECT * FROM Student WHERE department = '$department' ORDER BY rollNumber";
                }
                else if($department != "DEPARTMENT" && $department != "ALL") {
                    $sql = "SELECT * FROM Student WHERE department = '$department' ORDER BY rollNumber";
                }
                else if($section != "SECTION" && $section != "ALL") {
                    $sql = "SELECT * FROM Student WHERE section = '$section' ORDER BY rollNumber";
                }
                else if($semester != "SEMESTER" && $semester != "ALL") {
                    $sql = "SELECT * FROM Student WHERE currentSemester = '$semester' ORDER BY rollNumber";
                }
                else {
                    $sql = "SELECT * FROM Student ORDER BY rollNumber";
                }
            }
            else if($_SESSION['designation'] == 4) {
                $department = $_SESSION['department'];
                if($section != "SECTION" && $section != "ALL" && $semester != "SEMESTER" && $semester != "ALL") {
                    $sql = "SELECT * FROM Student WHERE department = '$department' AND section = '$section' AND currentSemester = '$semester' ORDER BY rollNumber";
                }
                else if($section != "SECTION" && $section != "ALL") {
                    $sql = "SELECT * FROM Student WHERE department = '$department' AND section = '$section' ORDER BY rollNumber";
                }
                else if($semester != "SEMESTER" && $semester != "ALL") {
                    $sql = "SELECT * FROM Student WHERE department = '$department' AND currentSemester = '$semester' ORDER BY rollNumber";
                }
                else {
                    $sql = "SELECT * FROM Student WHERE department = '$department' ORDER BY rollNumber";
                }
            }
            $result = mysqli_query($link,$sql);
            if(mysqli_num_rows($result) > 0) {
                echo '<table class="table table-striped">
                    <thead class="table-header">
                      <tr>
                        <th> S.NO</th>
                        <th>ROLL NUMBER</th>
                        <th>NAME</th>
                        <th>DEPARTMENT</th>
                        <th>SEMESTER</th>
                        <th>SECTION</th>
                        <th>BATCH</th>
                        <th>POINTS</th>
                        <th>MARKS</th>
                      </tr>
                    </thead>
                    <tbody class="table-body">';
                    $count = 1;
                    foreach($result as $std) {
                    $totalMark = array(0,0,0,0,0,0,0,0,0,0,0,0,0);
                    $sql = " SELECT * FROM SAP_" . $std['studentBatch'] ."Batch WHERE  studentRollNumber = '" . $std['rollNumber'] . "' AND stateOfProcess = '1' AND semester = '" . $std['currentSemester'] . "';";
                    $res = mysqli_query($link,$sql);
                    if(mysqli_num_rows($res) > 0) {
                        foreach($res as $student) {
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
                    $tMark = array_sum($totalMark);
                    if($count%2 == 0) {
                        echo '<tr class="even-row">
                            <td> ' . $count . '</td>
                            <td>' . $std['rollNumber'] . '</td>
                            <td>' . ucwords($std['studentName']) . '</td>
                            <td>' . $std['department'] . '</td>
                            <td>' . $std['currentSemester'] . '</td>
                            <td>' . $std['section'] . '</td>
                            <td>' . $std['studentBatch'] . '</td>
                           <td>' . $tMark . '</td>
                           <td>';
                        if($tMark >= 100) {
                                echo "5";
                            }
                            else if($tMark >= 80 && $tMark <=99) {
                                echo "4";
                            }
                            else if($tMark >= 60 && $tMark <=79) {
                                echo "3";
                            }
                            else if($tMark >= 40 && $tMark <=59) {
                                echo "2";
                            }
                            else if($tMark >= 20 && $tMark <=39) {
                                echo "1";
                            }
                            else if($tMark < 20) {
                                echo "0";
                            }
                        echo '</td>
                          </tr>';
                    }
                    else {
                        echo '<tr class="odd-row">
                            <td> ' . $count . '</td>
                            <td>' . $std['rollNumber'] . '</td>
                            <td>' . ucwords($std['studentName']) . '</td>
                            <td>' . $std['department'] . '</td>
                            <td>' . $std['currentSemester'] . '</td>
                            <td>' . $std['section'] . '</td>
                            <td>' . $std['studentBatch'] . '</td>
                            <td>' . $tMark . '</td>
                            <td>';
                        if($tMark >= 100) {
                                echo "5";
                            }
                            else if($tMark >= 80 && $tMark <=99) {
                                echo "4";
                            }
                            else if($tMark >= 60 && $tMark <=79) {
                                echo "3";
                            }
                            else if($tMark >= 40 && $tMark <=59) {
                                echo "2";
                            }
                            else if($tMark >= 20 && $tMark <=39) {
                                echo "1";
                            }
                            else if($tMark < 20) {
                                echo "0";
                            }
                        echo '</td>
                          </tr>';
                    }
                    $count += 1;
                }
                echo '</tbody>
                  </table>';
            }
            else {
                echo '<div class="no-record-container">
                         <img src="IMAGES/noData.jpg" alt="No Record"/>
                    </div>';
                echo "<div class='no-student'><i>No record available.</i></div>";
            }
        }
        
?>