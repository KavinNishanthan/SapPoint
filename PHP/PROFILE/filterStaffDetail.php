<?php

    session_start();
    // database-connection :: start
    require('../DATABASE/databaseConnection.php');
    // database-connection :: end
    
?>

<?php
        if(isset($_POST['id'])) {
            $staffId = $_SESSION['staffId'];
            $section = $_POST['section'];
            $semester = $_POST['semester'];
            $designation = $_POST['designation'];
            if($_SESSION['designation'] == 5) {
                $department = $_POST['department'];
                if($department != "DEPARTMENT" && $department != "ALL" && $section != "SECTION" && $section != "ALL" && $semester != "SEMESTER" && $semester != "ALL" && $designation != "DESIGNATION" && $designation != "ALL") {
                    $sql = "SELECT * FROM Staff WHERE department = '$department' AND section = '$section' AND currentSemester = '$semester' AND designation = '$designation' AND NOT staffId = '$staffId' ORDER BY staffId";
                }
                else if($department != "DEPARTMENT" && $department != "ALL" && $designation != "DESIGNATION" && $designation != "ALL" && $section != "SECTION" && $section != "ALL") {
                   $sql = "SELECT * FROM Staff WHERE department = '$department' AND section = '$section' AND designation = '$designation' AND NOT staffId = '$staffId' ORDER BY staffId";
               }
               else if($department != "DEPARTMENT" && $department != "ALL" && $designation != "DESIGNATION" && $designation != "ALL" && $semester != "SEMESTER" && $semester != "ALL") {
                   $sql = "SELECT * FROM Staff WHERE department = '$department' AND currentSemester = '$semester' AND designation = '$designation' AND NOT staffId = '$staffId' ORDER BY staffId";
               }
               else if($section != "SECTION" && $section != "ALL" && $semester != "SEMESTER" && $semester != "ALL" && $designation != "DESIGNATION" && $designation != "ALL") {
                   $sql = "SELECT * FROM Staff WHERE section = '$section' AND currentSemester = '$semester' AND designation = '$designation' AND NOT staffId = '$staffId' ORDER BY staffId";
               }
               else if($department != "DEPARTMENT" && $department != "ALL" && $semester != "SEMESTER" && $semester != "ALL") {
                    $sql = "SELECT * FROM Staff WHERE department = '$department' AND currentSemester = '$semester' AND NOT staffId = '$staffId' ORDER BY staffId";
                }
                else if($section != "SECTION" && $section != "ALL" && $semester != "SEMESTER" && $semester != "ALL") {
                    $sql = "SELECT * FROM Staff WHERE department = '$department' AND currentSemester = '$semester' AND NOT staffId = '$staffId' ORDER BY staffId";
                }
                else if($section != "SECTION" && $section != "ALL" && $designation != "DESIGNATION" && $designation != "ALL") {
                    $sql = "SELECT * FROM Staff WHERE section = '$section' AND designation = '$designation' AND NOT staffId = '$staffId' ORDER BY staffId";
                }
                else if($semester != "SEMESTER" && $semester != "ALL" && $designation != "DESIGNATION" && $designation != "ALL") {
                    $sql = "SELECT * FROM Staff WHERE currentSemester = '$semester' AND designation = '$designation' AND NOT staffId = '$staffId' ORDER BY staffId";
                }
                else if($department != "DEPARTMENT" && $department != "ALL") {
                    $sql = "SELECT * FROM Staff WHERE department = '$department' AND NOT staffId = '$staffId' ORDER BY staffId";
                }
                else if($section != "SECTION" && $section != "ALL") {
                    $sql = "SELECT * FROM Staff WHERE section = '$section' AND NOT staffId = '$staffId' ORDER BY staffId";
                }
                else if($semester != "SEMESTER" && $semester != "ALL") {
                    $sql = "SELECT * FROM Staff WHERE currentSemester = '$semester' AND NOT staffId = '$staffId' ORDER BY staffId";
                }
                else if($designation != "DESIGNATION" && $designation != "ALL") {
                    $sql = "SELECT * FROM Staff WHERE designation = '$designation' AND NOT staffId = '$staffId' ORDER BY staffId";
                }
                else {
                    $sql = "SELECT * FROM Staff NOT staffId = '$staffId' ORDER BY staffId";
                }
            }
            else if($_SESSION['designation'] == 4) {
                $department = $_SESSION['department'];
                if($section != "SECTION" && $section != "ALL" && $semester != "SEMESTER" && $semester != "ALL" && $designation != "DESIGNATION" && $designation != "ALL") {
                    $sql = "SELECT * FROM Staff WHERE department = '$department' AND section = '$section' AND currentSemester = '$semester' AND designation = '$designation' AND NOT staffId = '$staffId' ORDER BY staffId";
                }
                else if($section != "SECTION" && $section != "ALL" && $designation != "DESIGNATION" && $designation != "ALL") {
                    $sql = "SELECT * FROM Staff WHERE department = '$department' AND section = '$section' AND designation = '$designation' AND NOT staffId = '$staffId' ORDER BY staffId";
                }
                else if($semester != "SEMESTER" && $semester != "ALL" && $designation != "DESIGNATION" && $designation != "ALL") {
                    $sql = "SELECT * FROM Staff WHERE department = '$department' AND currentSemester = '$semester' AND designation = '$designation' AND NOT staffId = '$staffId' ORDER BY staffId";
                }
                else if($section != "SECTION" && $section != "ALL" && $semester != "SEMESTER" && $semester != "ALL") {
                     $sql = "SELECT * FROM Staff WHERE department = '$department' AND section = '$section' AND currentSemester = '$semester' AND NOT staffId = '$staffId' ORDER BY staffId";
                }
                else if($designation != "DESIGNATION" && $designation != "ALL") {
                    $sql = "SELECT * FROM Staff WHERE department = '$department' AND designation = '$designation' AND NOT staffId = '$staffId' ORDER BY staffId";
                }
                else if($section != "SECTION" && $section != "ALL") {
                    $sql = "SELECT * FROM Staff WHERE department = '$department' AND section = '$section' AND NOT staffId = '$staffId' ORDER BY staffId";
                }
                else if($semester != "SEMESTER" && $semester != "ALL") {
                    $sql = "SELECT * FROM Staff WHERE department = '$department' AND currentSemester = '$semester' AND NOT staffId = '$staffId' ORDER BY staffId";
                }
                else {
                    $sql = "SELECT * FROM Staff WHERE department = '$department' AND NOT staffId = '$staffId' ORDER BY staffId";
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
                        <th>DESIGNATION</th>
                        <th>DEPARTMENT</th>
                        <th>SEMESTER</th>
                        <th>SECTION</th>
                        <th>BATCH</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody class="table-body">';
                    $count = 1;
                    foreach($result as $staff) {
                        if($count%2 == 0) {
                            echo '<tr class="even-row">
                                <td> ' . $count . '</td>
                                <td>' . $staff['staffId'] . '</td>
                                <td>' . ucwords($staff['staffName']) . '</td>
                                <td>' . $staff['staffEmail'] . '</td>
                                <td>'; 
                                if($staff['designation'] == 1) {
                                    echo "Class Advisor";
                                }
                                else if($staff['designation'] == 2) {
                                    echo "Teaching Staff";
                                }
                                else if($staff['designation'] == 3) {
                                    echo "Non Teaching Staff";
                                }
                                else if($staff['designation'] == 4) {
                                    echo "Head of the Department";
                                }
                            echo '</td>
                            <td>' . $staff['department'] . '</td>
                            <td>';
                                if($staff['currentSemester'] == "") {
                                    echo "--";
                                }
                                else {
                                    echo $staff['currentSemester'];
                                }
                            echo '</td>
                            <td>';
                                if($staff['section'] == "") {
                                    echo "--";
                                }
                                else {
                                    echo $staff['section'];
                                }
                            echo '</td>
                            <td>';
                                if($staff['studentBatch'] == "") {
                                    echo "--";
                                }
                                else {
                                    echo $staff['studentBatch'];
                                }
                            echo '</td>
                               <td><button onclick=deleteButton("' . $staff['staffId'] . '") class="delete-button1"><i class="fa-solid fa-trash-can"></i></button><button onclick=editButton("' . $staff['staffId'] . '") class="edit-button1"><i class="fa-solid fa-pen"></i></button></td>
                              </tr>';
                        }
                        else {
                            echo '<tr class="odd-row">
                                <td> ' . $count . '</td>
                                <td>' . $staff['staffId'] . '</td>
                                <td>' . ucwords($staff['staffName']) . '</td>
                                <td>' . $staff['staffEmail'] . '</td>
                                <td>'; 
                                if($staff['designation'] == 1) {
                                    echo "Class Advisor";
                                }
                                else if($staff['designation'] == 2) {
                                    echo "Teaching Staff";
                                }
                                else if($staff['designation'] == 3) {
                                    echo "Non Teaching Staff";
                                }
                                else if($staff['designation'] == 4) {
                                    echo "Head of the Department";
                                }
                            echo '</td>
                            <td>' . $staff['department'] . '</td>
                            <td>';
                                if($staff['currentSemester'] == "") {
                                    echo "--";
                                }
                                else {
                                    echo $staff['currentSemester'];
                                }
                            echo '</td>
                            <td>';
                                if($staff['section'] == "") {
                                    echo "--";
                                }
                                else {
                                    echo $staff['section'];
                                }
                            echo '</td>
                            <td>';
                                if($staff['studentBatch'] == "") {
                                    echo "--";
                                }
                                else {
                                    echo $staff['studentBatch'];
                                }
                            echo '</td>
                                <td><button onclick=deleteButton("' . $staff['staffId'] . '") class="delete-button"><i class="fa-solid fa-trash-can"></i></button><button onclick=editButton("' . $staff['staffId'] . '") class="edit-button"><i class="fa-solid fa-pen"></i></button></td>
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