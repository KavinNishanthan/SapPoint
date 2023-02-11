<?php

    // database-connection :: start
    require('PHP/DATABASE/databaseConnection.php');
    // database-connection :: end
?>

<?php
    if(isset($_SESSION['rollNumber'])) {
        $rollNumber = $_SESSION['rollNumber'];
        // fetching the particular class-students
        $sql = " SELECT * FROM Student WHERE  rollNumber = '$rollNumber';";
        $result = mysqli_query($link,$sql);
        if(mysqli_num_rows($result)) {
                                
            // display the student list
            $student = mysqli_fetch_array($result,MYSQLI_ASSOC);
            
            echo "<div class='points-container'>
                    <div class='maximum-points'>Maximum Points : 80</div>
                    <div class='need-points'>Need Points : " . $_SESSION['needPoints'] . "</div>
                    </div>";
            echo "<div class='student-details-content'>
		<table>
    			<tr class='line'>
    				<td>Name</td>
    				<td>:</td>
    				<td class='student-detail'>" . ucwords($student['studentName']) . "</td>
  			</tr>
			<tr class='line'>
    				<td>Rollno</td>
    				<td>:</td>
    				<td class='student-detail'> " . $student['rollNumber'] . "</td>
  			</tr>
			<tr class='line'>
    				<td>Year</td>
    				<td>:</td>
    				<td class='student-detail'> " . ceil($student['currentSemester']/2) . "</td>
  			</tr>
			<tr class='line'>
    				<td>Section</td>
    				<td>:</td>
    				<td class='student-detail'> " . $student['section'] . "</td>
  			</tr>
			<tr class='line'>
    				<td>Department</td>
    				<td>:</td>
    				<td class='student-detail'> " . $student['department'] . "</td>
  			</tr>
			<tr class='line'>
    				<td>Semester</td>
    				<td>:</td>
    				<td class='student-detail'> " . $student['currentSemester'] . "</td>
  			</tr>
  		</table>
		</div>
		<button class='btn detail-button' onclick = 'getDetail()'>GET DETAILS</button>";
          }
    }
?>