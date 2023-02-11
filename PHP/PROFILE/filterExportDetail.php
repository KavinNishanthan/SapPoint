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
	    $category = $_POST['category'];
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
                        <th>';
			$s = "SELECT Title FROM Activity_Points WHERE sapCategory = '" . $category . "';";
			$tit = mysqli_fetch_array(mysqli_query($link,$s));
			print_r(strtoupper($tit['Title']));
			echo '</th>
                      </tr>
                    </thead>
                    <tbody class="table-body">';
                    $count = 1;
                    foreach($result as $student) {
			$rollNumber = $student['rollNumber'];
			$num_sql = "SELECT sapId FROM SAP_2020Batch WHERE studentRollNumber = '" . $rollNumber . "' AND semester = '" . $semester . "' AND sapCategory = '" . $category . "'";
			$num = mysqli_query($link,$num_sql);
                        if($count%2 == 0) {
                            echo '<tr class="even-row">
                                <td> ' . $count . '</td>
                                <td>' . $rollNumber . '</td>
                                <td>' . ucwords($student['studentName']) . '</td>
				<td>' . mysqli_num_rows($num) . '</td>
                               </tr>';
                        }
                        else {
                            echo '<tr class="odd-row">
                                <td> ' . $count . '</td>
                                <td>' . $student['rollNumber'] . '</td>
                                <td>' . ucwords($student['studentName']) . '</td>
				<td>' . mysqli_num_rows($num) . '</td>
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