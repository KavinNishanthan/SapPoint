<?php

    // database-connection :: start
    require('PHP/DATABASE/databaseConnection.php');
    // database-connection :: end
    
?>

<?php

        // fetching the particular class-students
        if($_SESSION['designation'] == 5) {
            $staffId = $_SESSION['staffId'];
            $sql = "SELECT * FROM Staff WHERE NOT designation = '5' ORDER BY staffId";
        }
        else if($_SESSION['designation'] == 4) {
            $department = $_SESSION['department'];
            $staffId = $_SESSION['staffId'];
            $sql = "SELECT * FROM Staff WHERE department = '$department' AND NOT designation = '4' ORDER BY staffId";
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
?>