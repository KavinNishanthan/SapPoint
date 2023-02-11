<?php

    // database-connection :: start
    require('PHP/DATABASE/databaseConnection.php');
    // database-connection :: end
    
?>

<?php
	 $category = array("Paper Presentation"," Project Presentation"," Techno Managerial Events"," Sports and Games"," Membership","Leadership / Organization Events","VAC / Online Courses","Project to paper / Patent Copyright","GATE / CAT / Govt Exams","Placement and Internship","Entreneurship","Social Activities","Others(Culturals,Essays,etc)");   
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
		$count = 1;
		foreach($result as $student) {
			$rollNumber = $student["rollNumber"];
			$semester = $student["currentSemester"];
			$sql = "SELECT sapCategory FROM SAP_2020Batch WHERE studentRollNumber = '" . $rollNumber . "' AND stateOfProcess = '1';";
			$total_rows = mysqli_query($link,$sql);
			if(mysqli_num_rows($total_rows) > 0) {
				echo '<div class="student-detail-container">
						<div class="student-detail-header">
							<div class="s_no">' . $count . '</div>
							<div class="rollnumber-container">Semester : ' . $semester . '</div>
							<div class="rollnumber-container">' . $rollNumber . '</div>
							<div class="name-container">' . strtoupper($student["studentName"]) . '</div>
						</div>';
						
						for($i=1;$i<14;$i++) {
							$sql = "SELECT sapDocument,documentTitle FROM SAP_2020Batch WHERE sapCategory = '$i' AND studentRollNumber = '" . $rollNumber . "' AND semester = '" . $semester . "';";
							$res = mysqli_query($link,$sql);
							if(mysqli_num_rows($res) > 0) {
								echo '<div class="student-document-container">
									<div class="student-category-header">' . strtoupper($category[$i-1]) . '</div>
							                <div class="student-document-details-container">';
										$count1 = 1;
										foreach($res as $r) {
											echo '<div class="student-document-details">
											<div class="student-document-header">
												<div class="s_no1">' . $count1 . '</div>
												<div class="document-title">' . $r["documentTitle"] . '</div>
											</div>
											<div class="document-image-container">
												<embed src="data:application/pdf;base64,' . $r['sapDocument'] . '" class="sap-document"/>

											</div>
										</div>';
										$count1 += 1;	
										}
									echo '</div>
								</div>';
							}
						}
												
								
					echo '</div>';
				$count += 1;
			}
		}
		
        }
        else {
            echo '<div class="no-record-container">
                    <img src="IMAGES/noData.jpg" alt="No Record"/>
                </div>';
            echo "<div class='no-student'><i>No record available.</i></div>";
        }
?>
