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
                        <th>EMAIL</th>
                        <th>DEPARTMENT</th>
                        <th>SEMESTER</th>
                        <th>SECTION</th>
                        <th>BATCH</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody class="table-body">';
                    $count = 1;
                    foreach($result as $student) {
                        if($count%2 == 0) {
                            echo '<tr class="even-row">
                                <td> ' . $count . '</td>
                                <td>' . $student['rollNumber'] . '</td>
                                <td>' . ucwords($student['studentName']) . '</td>
                                <td>' . $student['studentEmail'] . '</td>
                                <td>' . $student['department'] . '</td>
                                <td>' . $student['currentSemester'] . '</td>
                                <td>' . $student['section'] . '</td>
                                <td>' . $student['studentBatch'] . '</td>
                               <td><button onclick=deleteButton("' . $student['rollNumber'] . '") class="delete-button1"><i class="fa-solid fa-trash-can"></i></button><button onclick=editButton("' . $student['rollNumber'] . '") class="edit-button1"><i class="fa-solid fa-pen"></i></button></td>
                              </tr>';
                        }
                        else {
                            echo '<tr class="odd-row">
                                <td> ' . $count . '</td>
                                <td>' . $student['rollNumber'] . '</td>
                                <td>' . ucwords($student['studentName']) . '</td>
                                <td>' . $student['studentEmail'] . '</td>
                                <td>' . $student['department'] . '</td>
                                <td>' . $student['currentSemester'] . '</td>
                                <td>' . $student['section'] . '</td>
                                <td>' . $student['studentBatch'] . '</td>
                                <td><button onclick=deleteButton("' . $student['rollNumber'] . '") class="delete-button"><i class="fa-solid fa-trash-can"></i></button><button onclick=editButton("' . $student['rollNumber'] . '") class="edit-button"><i class="fa-solid fa-pen"></i></button></td>
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