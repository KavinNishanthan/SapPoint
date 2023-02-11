<?php
    
    session_start();
    
    require('../DATABASE/databaseConnection.php');
    
?>

<?php
    
    if(isset($_POST['rollNumber'])) {
        $rollNumber = $_POST['rollNumber'];
	$semester = $_SESSION['semester'];
        $sql = " SELECT * FROM SAP_" . $_SESSION['studentBatch'] . "Batch WHERE  studentRollNumber = '$rollNumber' AND semester = '$semester';";
        $result = mysqli_query($link,$sql);
        $totalMark = array(0,0,0,0,0,0,0,0,0,0,0,0,0);
        if(mysqli_num_rows($result) > 0) {
            foreach($result as $student) {
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
            
            $acquiredPoints = array_sum($totalMark);
        }
        else {
            $acquiredPoints = 0;
        }
        
        if($acquiredPoints > 80) {
            $acquiredPoints = 80;
            $needPoints = 0;
        }
        else {
            $needPoints = 80 - $acquiredPoints;
        }
        
        $_SESSION['needPoints'] = $needPoints;
	echo '<div class="progressdiv" data-percent="' . $acquiredPoints . '">
                        <svg class="progress" width="178" id="progressBar" height="178" viewport="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <circle  r="80" cx="89" cy="89" fill="transparent" stroke-dasharray="502.4" stroke-dashoffset="0" ></circle>
                            <circle class="bar" r="80" cx="89" cy="89" fill="transparent" stroke-dasharray="502.4" stroke-dashoffset="0"></circle>
                        </svg>
                    </div>';
        
        
    }
?>