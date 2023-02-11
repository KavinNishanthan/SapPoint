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
		$index = '<table class="table table-striped">
                    <thead class="table-header">
                      <tr>
                        <th> S.NO</th>
                        <th>ROLL NUMBER</th>
                        <th>NAME</th>';
			$tit_sql = "SELECT DISTINCT Title FROM Activity_Points";
			$res_title = mysqli_query($link,$tit_sql);
			foreach($res_title as $t) {
				$index .= '<th>' . $t['Title'] . '</th>';
			}
			$index .= '</tr>
                    </thead>
                    <tbody class="table-body">';
                $count = 1;
		 $category = "SELECT DISTINCT sapCategory FROM Activity_Points";
		  $res_category = mysqli_query($link,$category);
                foreach($result as $student) {
		    $rollNumber = $student["rollNumber"];
                    if($count%2 == 0) {
                        $index .= '<tr class="even-row">
                            <td> ' . $count . '</td>
                            <td>' . $rollNumber . '</td>
                            <td>' . ucwords($student['studentName']) . '</td>';
			    foreach($res_category as $cat) {
				$num_count = "SELECT sapId FROM SAP_2020Batch WHERE studentRollNumber = '" . $rollNumber . "' AND sapCategory = '" . $cat['sapCategory'] . "' AND stateOfProcess = '1';";
				$index .= '<td>' . mysqli_num_rows(mysqli_query($link,$num_count)) . '</td>';
			   }
                           $index .= '</tr>';
                    }
                    else {
                        $index .= '<tr class="odd-row">
                            <td> ' . $count . '</td>
                            <td>' . $student['rollNumber'] . '</td>
                            <td>' . ucwords($student['studentName']) . '</td>';
			   foreach($res_category as $cat) {
				$num_count = "SELECT sapId FROM SAP_2020Batch WHERE studentRollNumber = '" . $rollNumber . "' AND sapCategory = '" . $cat['sapCategory'] . "' AND stateOfProcess = '1';";
				$index .= '<td>' . mysqli_num_rows(mysqli_query($link,$num_count)) . '</td>';
			   }
                           $index .= '</tr>';
                    }
                    $count += 1;
                }
		$index .= '</tbody>
                </table>';
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=report.xlsx");
		echo $index;
        }
        else {
            echo '<div class="no-record-container">
                    <img src="IMAGES/noData.jpg" alt="No Record"/>
                </div>';
            echo "<div class='no-student'><i>No record available.</i></div>";
        }
?>