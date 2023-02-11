<?php

    // database-connection :: start
    require('PHP/DATABASE/databaseConnection.php');
    // database-connection :: end
    
?>

<?php

        $staffEmail = $_SESSION['staffEmail'];
        $section = $_SESSION['section'];
        $semester = $_SESSION['semester'];
        $department = $_SESSION['department'];
       
        // fetching the particular class-students
        if($_SESSION['designation'] == 5) {
            $sql = "SELECT * FROM Student ORDER BY rollNumber";
        }
        else if($_SESSION['designation'] == 4) {
            $sql = "SELECT * FROM Student WHERE department = '" . $department . "' ORDER BY rollNumber";
        }
        else if($_SESSION['designation'] == 1) {
            $sql = " SELECT * FROM Student WHERE section = '$section' AND currentSemester = '$semester' AND department = '$department' ORDER BY rollNumber;";
        }
        $result = mysqli_query($link,$sql);
        if(mysqli_num_rows($result) > 0) {
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
        }
        else {
            echo '<div class="no-record-container">
                    <img src="IMAGES/noData.jpg" alt="No Record"/>
                </div>';
            echo "<div class='no-student'><i>No record available.</i></div>";
        }
?>