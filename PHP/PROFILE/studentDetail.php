<?php

    // database-connection :: start
    require('PHP/DATABASE/databaseConnection.php');
    // database-connection :: end
    
?>

<?php
        
        // fetching the particular class-students
        if($_SESSION['designation'] == 5) {
            $sql = "SELECT * FROM Student ORDER BY rollNumber";
        }
        else if($_SESSION['designation'] == 4) {
	    $department = $_SESSION['department'];
            $sql = "SELECT * FROM Student WHERE department = '" . $department . "' ORDER BY rollNumber";
        }
	else {
	   $department = $_SESSION['department'];
	   $section = $_SESSION['section'];
	   $semester = $_SESSION['semester'];
	   $sql = "SELECT * FROM Student WHERE department = '$department' AND section = '$section' AND currentSemester = '$semester' ORDER BY rollNumber";
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
			<th>MENTOR</th>
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
			    <td>' . $student['mentor'] . '</td>
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
			    <td>' . $student['mentor'] . '</td>
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
?>