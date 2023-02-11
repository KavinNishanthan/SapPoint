<?php

    session_start();
    
    // database-connection :: start
    require('../DATABASE/databaseConnection.php');
    // database-connection :: end
?>

<?php

     $department = '{"CIVIL":"CIVIL ENGINEERING","MECH":"MECHANICAL ENGINEERING","MTA":"MECHATRONICS ENGINEERING","AU":"AUTOMOBILE ENGINEERING","CE":"CHEMICAL ENGINEERING","FT":"FOOD TECHNOLOGY","EEE":"ELECTRICAL AND ELECTRONICS ENGINEERING","EIE":"ELECTRONICS AND INSTRUMENTATION ENGINEERING","ECE":"ELECTRONICS AND COMMUNICATION ENGINEERING","CSE":"COMPUTER SCIENCE AND ENGINEERING","IT":"INFORMATION TECHNOLOGY","CSD":"COMPUTER SCIENCE AND DESIGN","AIML":"ARTIFICIAL INTELLIGENCE AND MACHINE LEARNING","AIDS":"ARTIFICIAL INTELLIGENCE AND DATA SCIENCE","CSD":"COMPUTER SCIENCE AND DESIGN SYSTEM"}';
    
     $depobj = json_decode($department,true);

    if(isset($_POST['semester'])) {
        
        $semester = $_POST['semester'];
        if($semester != "SEMESTER") {
            $rollNumber = $_SESSION['rollNumber'];
            $sql = "SELECT * FROM Student WHERE rollNumber = '$rollNumber';";
            $result = mysqli_query($link,$sql);
            if(mysqli_num_rows($result) > 0) {
                foreach($result as $student) {
                    // table-header :: start
                    echo "<div class='header'>
                        <div class='row'>
                            <h4>KONGU ENGINEERING COLLEGE,PERUNUDURAI,ERODE-638060</h4>
                        </div>
                        <div class='row'>
                            <h3>DEPARTMENT OF " . $depobj[$student['department']] . "</h3>
                        </div>
                        </div>
                        
                        <table class='table-responsive table-bordered'>
                            <div class='row'>
                                <h3 colspan='12' class='cstudent-index'>STUDENT ACTIVITY POINTS INDEX</h3>
                            </div>
                            <tbody>
                                <tr>
                                    <td colspan='5' class='index-column-input'>
                                        <p>Student Name</p>
                                    </td>
                                    <td colspan='2' class='colon'>
                                        <p>:</p>
                                    </td>
                                    <td colspan='6' class='input-details'>" . ucwords($student['studentName']) . "</td>
                                </tr>
                                <tr>
                                    <td colspan='5' class='index-column-input'>
                                        <p>Roll Number</p>
                                    </td>
                                    <td colspan='2' class='colon'>
                                        <p>:</p>
                                    </td>
                                    <td colspan='6' class='input-details'>" . $rollNumber . "</td>
                                </tr>
                                <tr>
                                    <td colspan='5' class='index-column-input'>
                                        <p>Year</p>
                                    </td>
                                    <td colspan='2' class='colon'>
                                        <p>:</p>
                                    </td>
                                    <td colspan='6' class='input-details'>" . ceil($semester/2) . "</td>
                                </tr>
                                <tr>
                                    <td colspan='5' class='index-column-input'>
                                        <p>Section</p>
                                    </td>
                                    <td colspan='2' class='colon'>
                                        <p>:</p>
                                    </td>
                                    <td colspan='6' class='input-details'>" . $student['section'] . "</td>
                                </tr>
                                <tr>
                                    <td colspan='5' class='index-column-input'>
                                        <p>Semester</p>
                                    </td>
                                    <td colspan='2' class='colon'>
                                        <p>:</p>
                                    </td>
                                    <td colspan='6' class='input-details'>" . $semester . "</td>
                                </tr>
                                <tr>
                                    <td colspan='5' class='index-column-input'>
                                        <p>Academic Year</p>
                                    </td>
                                    <td colspan='2' class='colon'>
                                        <p>:</p>
                                    </td>
                                    <td colspan='6' class='input-details'>" . ($_SESSION['studentBatch'] + (ceil($semester/2))-1) . "-" . ($_SESSION['studentBatch'] + ceil($semester/2)) . "</td>
                                </tr>
                                <tr>
                                    <td colspan='5' class='index-column-input'>
                                        <p>Mentor Name</p>
                                    </td>
                                    <td colspan='2' class='colon'>
                                        <p>:</p>
                                    </td>
                                    <td colspan='6 class='input-details'></td>
                                </tr>
                            </tbody>
                        </table>";
                        
                        // table-header :: end
                }
                
                // reference-table :: start
                echo "<table class='table-responsive table-bordered' id='reference-details'>
                     <div class='row'>
                         <h3 colspan='12' class='col-sm-12 student-refrences'>REFRENCES</h3>
                     </div>
                     <tbody>
                         <tr>
                             <td class='refrence-details'>
                                 <p>Activity points earned in a semester</p>
                             </td>
                             <td class='refrence-details'>
                                 <p>BE/BTech and Msc</p>
                             </td>
                             <td class='refrence-details'>
                             <p>80 or More</p>
                         </td>
                         <td class='refrence-details'>
                             <p>50-79</p>
                         </td>
                         <td class='refrence-details'>
                             <p>20-49</p>
                         </td>
                         <td class='refrence-details'>
                         <p>Below 20</p>
                         </td>
                         </tr>
                         <tr>
                             <td colspan='2' class='refrence-details'>
                                 <p>Marks earned per course in the semester</p>
                             </td>
                             <td class='refrence-details'>
                             <p>3</p>
                         </td>
                         <td class='refrence-details'>
                             <p>2</p>
                         </td>
                         <td class='refrence-details'>
                             <p>1</p>
                         </td>
                         <td class='refrence-details'>
                             <p>0</p>
                         </td>
                             </tr>
                     </tbody>
                 </table>";
                 
            }
            // reference-table :: end
    
            $totalMark = 0;$paper = array(0,0,0,0,0,0,0);$cpaper = array(0,0,0,0,0,0,0);$project = array(0,0,0,0,0,0,0);$cproject = array(0,0,0,0,0,0,0);$techno = array(0,0,0,0,0,0,0,0);$ctechno = array(0,0,0,0,0,0,0,0);$sports = array(0,0,0,0,0,0,0,0);$csports = array(0,0,0,0,0,0,0,0);$membership = array(0,0,0);$cmembership = array(0,0,0);$leadership = array(0,0,0,0);$cleadership = array(0,0,0,0);$vac = array(0,0,0,0);$cvac = array(0,0,0,0);$ptop = array(0,0,0,0,0,0,0,0,0,0);$cptop = array(0,0,0,0,0,0,0,0,0,0);$govt = array(0,0,0,0);$cgovt = array(0,0,0,0);$placement = array(0,0,0,0);$cplacement = array(0,0,0,0);$entrepreneurship = array(0,0,0);$centrepreneurship = array(0,0,0);$social = array(0,0,0,0);$csocial = array(0,0,0);$others = array(0,0,0,0);$cothers = array(0,0,0,0);
            $sql = " SELECT * FROM SAP_" . $_SESSION['studentBatch'] ."Batch WHERE  studentRollNumber = '$rollNumber' AND stateOfProcess = '1' AND semester = '$semester';";
            $result = mysqli_query($link,$sql);
            if(mysqli_num_rows($result) > 0) {
                    foreach($result as $student) {
                        if($student['sapCategory'] == 1) {
                            if($student['conductionCategory'] == 'submitted') {
                                $paper[0] += $student['allocatedMark'];
                                $cpaper[0] += 1;
                            }
                            else if($student['conductionCategory'] == 'inside') {
                                if($student['prizeWon'] == '0') {
                                    $paper[1] +=  $student['allocatedMark'];
                                    $cpaper[1] += 1;
                                }
                                else if($student['prizeWon'] == '1') {
                                    $paper[4] +=  $student['allocatedMark'];
                                    $cpaper[4] += 1;
                                }
                            }
                            else if($student['conductionCategory'] == 'outside') {
                                if($student['prizeWon'] == '0') {
                                    $paper[2] +=  $student['allocatedMark'];
                                    $cpaper[2] += 1;
                                }
                                else if($student['prizeWon'] == '1') {
                                    $paper[5] +=  $student['allocatedMark'];
                                    $cpaper[5] += 1;
                                }
                            }
                            else if($student['conductionCategory'] == 'premier') {
                                if($student['prizeWon'] == '0') {
                                    $paper[3] +=  $student['allocatedMark'];
                                    $cpaper[3] += 1;
                                }
                                else if($student['prizeWon'] == '1') {
                                    $paper[6] +=  $student['allocatedMark'];
                                    $cpaper[6] += 1;
                                }
                            }
                        }
                        else if($student['sapCategory'] == 2) {
                            if($student['conductionCategory'] == 'submitted') {
                                $project[0] += $student['allocatedMark'];
                                $cproject[0] += 1;
                            }
                            else if($student['conductionCategory'] == 'inside') {
                                if($student['prizeWon'] == '0') {
                                    $project[1] += $student['allocatedMark'];
                                    $cproject[1] += 1;
                                }
                                else if($student['prizeWon'] == '1') {
                                    $project[4] += $student['allocatedMark'];
                                    $cproject[4] += 1;
                                }
                            }
                            else if($student['conductionCategory'] == 'outside') {
                                if($student['prizeWon'] == '0') {
                                    $project[2] += $student['allocatedMark'];
                                    $cproject[2] += 1;
                                }
                                else if($student['prizeWon'] == '1') {
                                    $project[5] += $student['allocatedMark'];
                                    $cproject[5] += 1;
                                }
                            }
                            else if($student['conductionCategory'] == 'premier') {
                                if($student['prizeWon'] == '0') {
                                    $project[3] += $student['allocatedMark'];
                                    $cproject[3] += 1;
                                }
                                else if($student['prizeWon'] == '1') {
                                    $project[6] += $student['allocatedMark'];
                                    $cproject[6] += 1;
                                }
                            }
                        }
                        else if($student['sapCategory'] == 3) {
                            if($student['conductionCategory'] == 'inside') {
                                if($student['prizeWon'] == '0') {
                                    $techno[0] += $student['allocatedMark'];
                                    $ctechno[0] += 1;
                                }
                                else if($student['prizeWon'] == '1') {
                                    $techno[4] += $student['allocatedMark'];
                                    $ctechno[4] += 1;
                                }
                            }
                            else if($student['conductionCategory'] == 'outside') {
                                if($student['prizeWon'] == '0') {
                                    $techno[1] += $student['allocatedMark'];
                                    $ctechno[1] += 1;
                                }
                                else if($student['prizeWon'] == '1') {
                                    $techno[5] += $student['allocatedMark'];
                                    $ctechno[5] += 1;
                                }
                            }
                            else if($student['conductionCategory'] == 'state') {
                                if($student['prizeWon'] == '0') {
                                    $techno[2] += $student['allocatedMark'];
                                    $ctechno[2] += 1;
                                }
                                else if($student['prizeWon'] == '1') {
                                    $techno[6] += $student['allocatedMark'];
                                    $ctechno[6] += 1;
                                }
                            }
                            else if($student['conductionCategory'] == 'national/international') {
                                if($student['prizeWon'] == '0') {
                                    $techno[3] += $student['allocatedMark'];
                                    $ctechno[3] += 1;
                                }
                                else if($student['prizeWon'] == '1') {
                                    $techno[7] += $student['allocatedMark'];
                                    $ctechno[7] += 1;
                                }
                            }
                            
                        }
                        else if($student['sapCategory'] == 4) {
                            if($student['conductionCategory'] == 'inside') {
                                if($student['prizeWon'] == '0') {
                                    $sports[0] += $student['allocatedMark'];
                                    $csports[0] += 1;
                                }
                                else if($student['prizeWon'] == '1') {
                                    $sports[4] += $student['allocatedMark'];
                                    $csports[4] += 1;
                                }
                            }
                            else if($student['conductionCategory'] == 'zone-or-outside') {
                                if($student['prizeWon'] == '0') {
                                    $sports[1] += $student['allocatedMark'];
                                    $csports[1] += 1;
                                }
                                else if($student['prizeWon'] == '1') {
                                    $sports[5] += $student['allocatedMark'];
                                    $csports[5] += 1;
                                }
                            }
                            else if($student['conductionCategory'] == 'state-or-interzone') {
                                if($student['prizeWon'] == '0') {
                                    $sports[2] += $student['allocatedMark'];
                                    $csports[2] += 1;
                                }
                                else if($student['prizeWon'] == '1') {
                                    $sports[6] += $student['allocatedMark'];
                                    $csports[6] += 1;
                                }
                            }
                            else if($student['conductionCategory'] == 'national/international') {
                                if($student['prizeWon'] == '0') {
                                    $sports[3] += $student['allocatedMark'];
                                    $csports[3] += 1;
                                }
                                else if($student['prizeWon'] == '1') {
                                    $sports[7] += $student['allocatedMark'];
                                    $csports[7] += 1;
                                }
                            }
                        }
                        else if($student['sapCategory'] == 5) {
                            if($student['conductionCategory'] == 'ncc/nss') {
                                $membership[0] += $student['allocatedMark'];
                                $cmembership[0] += 1;
                            }
                            else if($student['conductionCategory'] == 'professionalsociety') {
                                $membership[1] += $student['allocatedMark'];
                                $cmembership[1] += 1;
                            }
                            else if($student['conductionCategory'] == 'clubs') {
                                $membership[2] += $student['allocatedMark'];
                                $cmembership[2] += 1;
                            }
                        }
                        else if($student['sapCategory'] == 6) {
                            if($student['conductionCategory'] == 'secretary') {
                                $leadership[0] += $student['allocatedMark'];
                                $cleadership[0] += 1;
                            }
                            else if($student['conductionCategory'] == 'joint-secretary') {
                                $leadership[1] += $student['allocatedMark'];
                                $cleadership[1] += 1;
                            }
                            else if($student['conductionCategory'] == 'ec-member') {
                                $leadership[2] += $student['allocatedMark'];
                                $cleadership[2] += 1;
                            }
                            else if($student['conductionCategory'] == 'class-representative') {
                                $leadership[3] += $student['allocatedMark'];
                                $cleadership[3] += 1;
                            }
                        }
                        else if($student['sapCategory'] == 7) {
                            if($student['conductionCategory'] == 'non-credit') {
                                $vac[0] += $student['allocatedMark'];
                                $cvac[0] += 1;
                            }
                            else if($student['conductionCategory'] == 'one-credit') {
                                $vac[1] += $student['allocatedMark'];
                                $cvac[1] += 1;
                            }
                            else if($student['conductionCategory'] == 'two-credit') {
                                $vac[2] += $student['allocatedMark'];
                                $cvac[2] += 1;
                            }
                            else if($student['conductionCategory'] == 'three-credit') {
                                $vac[3] += $student['allocatedMark'];
                                $cvac[3] += 1;
                            }
                        }
                        else if($student['sapCategory'] == 8) {
                            if($student['conductionCategory'] == 'sci-submitted') {
                                $ptop[0] += $student['allocatedMark'];
                                $cptop[0] += 1;
                            }
                            else if($student['conductionCategory'] == 'sci-published') {
                                $ptop[1] += $student['allocatedMark'];
                                $cptop[1] += 1;
                            }
                            else if($student['conductionCategory'] == 'wos-submitted') {
                                $ptop[2] += $student['allocatedMark'];
                                $cptop[2] += 1;
                            }
                            else if($student['conductionCategory'] == 'wos-published') {
                                $ptop[3] += $student['allocatedMark'];
                                $cptop[3] += 1;
                            }
                            else if($student['conductionCategory'] == 'others') {
                                $ptop[4] += $student['allocatedMark'];
                                $cptop[4] += 1;
                            }
                            else if($student['conductionCategory'] == 'patent-applied') {
                                $ptop[5] += $student['allocatedMark'];
                                $cptop[5] += 1;
                            }
                            else if($student['conductionCategory'] == 'patent-published') {
                                $ptop[6] += $student['allocatedMark'];
                                $cptop[6] += 1;
                            }
                            else if($student['conductionCategory'] == 'patent-obtained') {
                                $ptop[7] += $student['allocatedMark'];
                                $cptop[7] += 1;
                            }
                            else if($student['conductionCategory'] == 'copyright-applied') {
                                $ptop[8] += $student['allocatedMark'];
                                $cptop[8] += 1;
                            }
                            else if($student['conductionCategory'] == 'copyright-published') {
                                $ptop[9] += $student['allocatedMark'];
                                $cptop[9] += 1;
                            }
                        }
                        else if($student['sapCategory'] == 9) {
                            if($student['conductionCategory'] == 'appeared') {
                                $govt[0] += $student['allocatedMark'];
                                $cgovt[0] += 1;
                            }
                            else if($student['conductionCategory'] == 'qualified') {
                                $govt[1] += $student['allocatedMark'];
                                $cgovt[1] += 1;
                            }
                            else if($student['conductionCategory'] == 'ranking') {
                                $govt[2] += $student['allocatedMark'];
                                $cgovt[2] += 1;
                            }
                            else if($student['conductionCategory'] == 'cleared') {
                                $govt[3] += $student['allocatedMark'];
                                $cgovt[3] += 1;
                            }
                        }
                        else if($student['sapCategory'] == 10) {
                            if($student['conductionCategory'] == 'written-test') {
                                $placement[0] += $student['allocatedMark'];
                                $cplacement[0] += 1;
                            }
                            else if($student['conductionCategory'] == 'placed') {
                                $placement[1] += $student['allocatedMark'];
                                $cplacement[1] += 1;
                            }
                            else if($student['conductionCategory'] == 'pwithi') {
                                $placement[2] += $student['allocatedMark'];
                                $cplacement[2] += 1;
                            }
                            else if($student['conductionCategory'] == 'pwithouti') {
                                $placement[3] += $student['allocatedMark'];
                                $cplacement[3] += 1;
                            }
                        }
                        else if($student['sapCategory'] == 11) {
                            if($student['conductionCategory'] == 'workshop') {
                                $entrepreneurship[0] += $student['allocatedMark'];
                                $centrepreneurship[0] += 1;
                            }
                            else if($student['conductionCategory'] == 'start-up') {
                                $entrepreneurship[1] += $student['allocatedMark'];
                                $centrepreneurship[1] += 1;
                            }
                            else if($student['conductionCategory'] == 'product') {
                                $entrepreneurship[2] += $student['allocatedMark'];
                                $centrepreneurship[2] += 1;
                            }
                        }
                        else if($student['sapCategory'] == 12) {
                            if($student['conductionCategory'] == 'blood-donation') {
                                $social[0] += $student['allocatedMark'];
                                $csocial[0] += 1;
                            }
                            else if($student['conductionCategory'] == 'camp-1') {
                                $social[0] += $student['allocatedMark'];
                                $csocial[0] += 1;
                            }
                            else if($student['conductionCategory'] == 'camp-3') {
                                $social[0] += $student['allocatedMark'];
                                $csocial[0] += 1;
                            }
                        }
                        else if($student['sapCategory'] == 13) {
                            if($student['conductionCategory'] == 'inside') {
                                if($student['prizeWon'] == '0') {
                                    $others[0] += $student['allocatedMark'];
                                    $cothers[0] += 1;
                                }
                                else if($student['prizeWon'] == '1') {
                                    $others[2] += $student['allocatedMark'];
                                    $cothers[2] += 1;
                                }
                            }
                            else if($student['conductionCategory'] == 'outside') {
                                if($student['prizeWon'] == '0') {
                                    $others[1] += $student['allocatedMark'];
                                    $cothers[1] += 1;
                                }
                                else if($student['prizeWon'] == '1') {
                                    $others[3] += $student['allocatedMark'];
                                    $cothers[3] += 1;
                                }
                            }
                        }
                    }
                    
                if(array_sum($paper) > 75) {
                    $totalMark += 75;
                }   
                else {
                    $totalMark += array_sum($paper);
                }
                
                if(array_sum($project) > 100) {
                    $totalMark += 100;
                }   
                else {
                    $totalMark += array_sum($project);
                }
                
                if(array_sum($techno) > 75) {
                    $totalMark += 75;
                }   
                else {
                    $totalMark += array_sum($techno);
                }
                
                if(array_sum($sports) > 100) {
                    $totalMark += 100;
                }   
                else {
                    $totalMark += array_sum($sports);
                }
                
                if(array_sum($membership) > 50) {
                    $totalMark += 50;
                }   
                else {
                    $totalMark += array_sum($membership);
                }
                
                if(array_sum($leadership) > 100) {
                    $totalMark += 100;
                }   
                else {
                    $totalMark += array_sum($leadership);
                }
                
                if(array_sum($vac) > 100) {
                    $totalMark += 100;
                }   
                else {
                    $totalMark += array_sum($vac);
                }
                
                if(array_sum($ptop) > 100) {
                    $totalMark += 100;
                }   
                else {
                    $totalMark += array_sum($ptop);
                }
                
                if(array_sum($govt) > 100) {
                    $totalMark += 100;
                }   
                else {
                    $totalMark += array_sum($govt);
                }
                
                if(array_sum($placement) > 50) {
                    $totalMark += 50;
                }   
                else {
                    $totalMark += array_sum($placement);
                }
                
                if(array_sum($entrepreneurship) > 100) {
                    $totalMark += 100;
                }   
                else {
                    $totalMark += array_sum($entrepreneurship);
                }
                
                if(array_sum($social) > 50) {
                    $totalMark += 50;
                }   
                else {
                    $totalMark += array_sum($social);
                }
                
                if(array_sum($others) > 25) {
                    $totalMark += 25;
                }   
                else {
                    $totalMark += array_sum($others);
                }
                
            }
            
            $_SESSION['totalMark'] = $totalMark;
                // evaluation-table :: start
                echo "<table class='table-responsive table-bordered'>
                        <tbody>
                            <tr>
                                <td rowspan='2' class='evaluation-details'>
                                    <p>Evaluation</p>
                                </td>
                                <td colspan='6' class='evaluation-details'>
                                    <p>Evaluation done by</p>
                                </td>
                            </tr>
                            <tr id='evaluation-details'>
                                <td class='evaluation-details'>
                                    <p>Students</p>
                                </td>
                                <td class='evaluation-details'>
                                    <p>Class Advisor</p>
                                </td>
    
                            </tr>
                            <tr>
                                <td class='evaluation-details'>
                                    <p>Did All the proofs are verified?</p>
                                </td>
                                <td class='evaluation-details'>";
                                if($totalMark > 0) {
                                    echo "Yes";
                                }
                                echo "</td>
                                <td class='evaluation-details'>";
                                if($totalMark > 0) {
                                    echo "Yes";
                                }
                                echo "</td>
                            </tr>
                            <tr>
                                <td class='evaluation-details'>
                                    <p>Maximum Points Earned</p>
                                </td>
                                <td class='evaluation-details'>" . $totalMark . "</td>
                                <td class='evaluation-details'>" . $totalMark . "</td>
                            </tr>
                            <tr>
                                <td class='evaluation-details'>
                                    <p>Others Marks for Internal(Max.5)</p>
                                </td>
                                <td class='evaluation-details'>";
                            
                             if($totalMark >= 80) {
                                echo "3";
                            }
                            else if($totalMark >= 50 && $totalMark <=79) {
                                echo "2";
                            }
                            else if($totalMark >= 20 && $totalMark <=49) {
                                echo "1";
                            }
                            else if($totalMark < 20) {
                                echo "0";
                            }
                            
                            echo "</td>
                                <td class='evaluation-details'>";
                            
                             if($totalMark >= 80) {
                                echo "3";
                            }
                            else if($totalMark >= 50 && $totalMark <=79) {
                                echo "2";
                            }
                            else if($totalMark >= 20 && $totalMark <=49) {
                                echo "1";
                            }
                            else if($totalMark < 20) {
                                echo "0";
                            }
                            
                            echo "</td>
                            </tr>
                            <tr>
                                <td class='evaluation-details'>
                                    <p>Siganture with date</p>
                                </td>
                                <td class='evaluation-details'>
                                </td>
                                <td></td>
    
                                <td rowspan='4' class='evaluation-details'>
    
                                    <div class='row'>
                                        <p class='col-sm-6 col-md-6'>Signature of class advisor with date</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>";
                    // evaluation-table :: end
                    
                    
                    
                    // paper-presentation-table :: start
                    echo '<table class="table-responsive table-bordered">
                        <tbody>
                            <tr>
                                <td rowspan="2" class="table-details">
                                    <p>Activity</p>
                                </td>
                                <td rowspan="2" class="table-details">
                                    <p>Submitted</p>
                                </td>
                                <td colspan="3" class="table-details">
                                    <p>Presented</p>
                                </td>
                                <td colspan="3" class="table-details">
                                    <p>Prize</p>
                                </td>
                                <td rowspan="2" class="table-details">
                                    <p>Max Points</p>
                                </td>
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Inside</p>
                                </td>
                                <td class="table-details">
                                    <p>Oustside</p>
                                </td>
                                <td class="table-details">
                                    <p>Premier</p>
                                </td>
                                <td class="table-details">
                                    <p>Inside</p>
                                </td>
                                <td class="table-details">
                                    <p>Oustside</p>
                                </td>
                                <td class="table-details">
                                    <p>Premier</p>
                                </td>
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>1.Paper Presentation</p>
                                </td>
                                <td class="table-details">
                                    <p>2</p>
                                </td>
                                <td class="table-details">
                                    <p>5</p>
                                </td>
                                <td class="table-details">
                                    <p>10</p>
                                </td>
                                <td class="table-details">
                                    <p>20</p>
                                </td>
                                <td class="table-details">
                                    <p>20</p>
                                </td>
                                <td class="table-details">
                                    <p>
                                        30
                                    </p>
                                </td>
                                <td class="table-details">
                                    <p>50</p>
                                </td>
    
                                <td class="table-details">
                                    <p>75</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Count</p>
                                </td>
                                <td class="table-details">';
                                if($cpaper[0] > 0) {
                                    echo $cpaper[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cpaper[1] > 0) {
                                    echo $cpaper[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cpaper[2] > 0) {
                                    echo $cpaper[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cpaper[3] > 0) {
                                    echo $cpaper[3];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cpaper[4] > 0) {
                                    echo $cpaper[4];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cpaper[5] > 0) {
                                    echo $cpaper[5];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cpaper[6] > 0) {
                                    echo $cpaper[6];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($cpaper) > 0) {
                                    echo array_sum($cpaper);
                                }
                                echo'</td>
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Student Marks(count x marks)</p>
                                </td>
                                <td class="table-details">';
                                if($paper[0] > 0) {
                                    echo $paper[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($paper[1] > 0) {
                                    echo $paper[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($paper[2] > 0) {
                                    echo $paper[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($paper[3] > 0) {
                                    echo $paper[3];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($paper[4] > 0) {
                                    echo $paper[4];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($paper[5] > 0) {
                                    echo $paper[5];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($paper[6] > 0) {
                                    echo $paper[6];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($paper) > 0) {
                                    echo array_sum($paper);
                                }
                                echo'</td>
                            </tr>
    
                        </tbody>
                    </table>';
                    // paper-presentation-table :: end
                    
                    // project-presentation-table :: start
                    echo '<table class="table-responsive table-bordered">
                        <tbody>
                            <tr>
                                <td rowspan="2" class="table-details">
                                    <p>Activity</p>
                                </td>
                                <td rowspan="2" class="table-details">
                                    <p>Submitted</p>
                                </td>
                                <td colspan="3" class="table-details">
                                    <p>Presented</p>
                                </td>
                                <td colspan="3" class="table-details">
                                    <p>Prize</p>
                                </td>
                                <td rowspan="2" class="table-details">
                                    <p>Max Points</p>
                                </td>
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Inside</p>
                                </td>
                                <td class="table-details">
                                    <p>Oustside</p>
                                </td>
                                <td class="table-details">
                                    <p>Premier</p>
                                </td>
                                <td class="table-details">
                                    <p>Inside</p>
                                </td>
                                <td class="table-details">
                                    <p>Oustside</p>
                                </td>
                                <td class="table-details">
                                    <p>Premier</p>
                                </td>
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>2.Project Presentation</p>
                                </td>
                                <td class="table-details">
                                    <p>5</p>
                                </td>
                                <td class="table-details">
                                    <p>10</p>
                                </td>
                                <td class="table-details">
                                    <p>15</p>
                                </td>
                                <td class="table-details">
                                    <p>20</p>
                                </td>
                                <td class="table-details">
                                    <p>20</p>
                                </td>
                                <td class="table-details">
                                    <p>
                                        30
                                    </p>
                                </td>
                                <td class="table-details">
                                    <p>50</p>
                                </td>
    
                                <td class="table-details">
                                    <p>100</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Count</p>
                                </td>
                                <td class="table-details">';
                                if($cproject[0] > 0) {
                                    echo $cproject[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cproject[1] > 0) {
                                    echo $cproject[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cproject[2] > 0) {
                                    echo $cproject[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cproject[3] > 0) {
                                    echo $cproject[3];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cproject[4] > 0) {
                                    echo $cproject[4];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cproject[5] > 0) {
                                    echo $cproject[5];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cproject[6] > 0) {
                                    echo $cproject[6];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($cproject) > 0) {
                                    echo array_sum($cproject);
                                }
                                echo'</td>
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Student Marks(count x marks)</p>
                                </td>
                                <td class="table-details">';
                                if($project[0] > 0) {
                                    echo $project[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($project[1] > 0) {
                                    echo $project[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($project[2] > 0) {
                                    echo $project[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($project[3] > 0) {
                                    echo $project[3];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($project[4] > 0) {
                                    echo $project[4];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($project[5] > 0) {
                                    echo $project[5];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($project[6] > 0) {
                                    echo $project[6];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($project) > 0) {
                                    echo array_sum($project);
                                }
                                echo'</td>
                            </tr>
    
                        </tbody>
                    </table>';
                    // project-presentation-table :: end
                    
                    // techno-managerial-event :: start
                    echo '<table class="table-responsive table-bordered">
                        <tbody>
                            <tr>
                                <td rowspan="2" class="table-details">
                                    <p>Activity</p>
                                </td>
    
                                <td colspan="4" class="table-details">
                                    <p>Participated</p>
                                </td>
                                <td colspan="4" class="table-details">
                                    <p>Prize</p>
                                </td>
                                <td rowspan="2" class="table-details">
                                    <p>Max Points</p>
                                </td>
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Inside</p>
                                </td>
                                <td class="table-details">
                                    <p>Oustside</p>
                                </td>
                                <td class="table-details">
                                    <p>State</p>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>National</p>
                                        <p>/International</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <p>Inside</p>
                                </td>
                                <td class="table-details">
                                    <p>Oustside</p>
                                </td>
                                <td class="table-details">
                                    <p>State</p>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>National</p>
                                        <p>/International</p>
    
                                    </div>
                                </td>
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>3.Techno Managerial Events*</p>
                                </td>
                                <td class="table-details">
                                    <p>2</p>
                                </td>
                                <td class="table-details">
                                    <p>5</p>
                                </td>
                                <td class="table-details">
                                    <p>10</p>
                                </td>
                                <td class="table-details">
                                    <p>20</p>
                                </td>
                                <td class="table-details">
                                    <p>10</p>
                                </td>
                                <td class="table-details">
                                    <p>
                                        20
                                    </p>
                                </td>
                                <td class="table-details">
                                    <p>30</p>
                                </td>
    
                                <td class="table-details">
                                    <p>50</p>
                                </td>
                                <td class="table-details">
                                    <p>75</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Count</p>
                                </td>
                                <td class="table-details">';
                                if($ctechno[0] > 0) {
                                    echo $ctechno[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($ctechno[1] > 0) {
                                    echo $ctechno[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($ctechno[2] > 0) {
                                    echo $ctechno[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($ctechno[3] > 0) {
                                    echo $ctechno[3];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($ctechno[4] > 0) {
                                    echo $ctechno[4];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($ctechno[5] > 0) {
                                    echo $ctechno[5];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($ctechno[6] > 0) {
                                    echo $ctechno[6];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($ctechno[7] > 0) {
                                    echo $ctechno[7];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($ctechno) > 0) {
                                    echo array_sum($ctechno);
                                }
                                echo'</td>
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Student Marks(count x marks)</p>
                                </td>
                                <td class="table-details">';
                                if($techno[0] > 0) {
                                    echo $techno[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($techno[1] > 0) {
                                    echo $techno[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($techno[2] > 0) {
                                    echo $techno[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($techno[3] > 0) {
                                    echo $techno[3];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($techno[4] > 0) {
                                    echo $techno[4];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($techno[5] > 0) {
                                    echo $techno[5];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($techno[6] > 0) {
                                    echo $techno[6];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($techno[7] > 0) {
                                    echo $techno[7];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($techno) > 0) {
                                    echo array_sum($techno);
                                }
                                echo'</td>
    
                            </tr>
    
                        </tbody>
                    </table>';
                    // techno-managerial-event :: end
                    
                    // sports and games :: start
                    echo '<table class="table-responsive table-bordered">
                        <tbody>
                            <tr>
                                <td rowspan="2" class="table-details">
                                    <p>Activity</p>
                                </td>
    
                                <td colspan="4" class="table-details">
                                    <p>Participated</p>
                                </td>
                                <td colspan="4" class="table-details">
                                    <p>Prize</p>
                                </td>
                                <td rowspan="2" class="table-details">
                                    <p>Max Points</p>
                                </td>
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Inside</p>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Zone</p>
                                        <p>/Outside</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>State</p>
                                        <p>/Inner Zone</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>National</p>
                                        <p>/International</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <p>Inside</p>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Zone</p>
                                        <p>/Outside</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>State</p>
                                        <p>/Inner Zone</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>National</p>
                                        <p>/International</p>
    
                                    </div>
                                </td>
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>4.Sports and Games</p>
                                </td>
                                <td class="table-details">
                                    <p>2</p>
                                </td>
                                <td class="table-details">
                                    <p>10</p>
                                </td>
                                <td class="table-details">
                                    <p>20</p>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>50</p>
                                        <p>/100</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <p>5</p>
                                </td>
                                <td class="table-details">
                                    <p>
                                        20
                                    </p>
                                </td>
                                <td class="table-details">
                                    <p>40</p>
                                </td>
    
                                <td class="table-details">
                                    <p>100</p>
                                </td>
                                <td class="table-details">
                                    <p>100</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Count</p>
                                </td>
                                <td class="table-details">';
                                if($csports[0] > 0) {
                                    echo $csports[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($csports[1] > 0) {
                                    echo $csports[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($csports[2] > 0) {
                                    echo $csports[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($csports[3] > 0) {
                                    echo $csports[3];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($csports[4] > 0) {
                                    echo $csports[4];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($csports[5] > 0) {
                                    echo $csports[5];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($csports[6] > 0) {
                                    echo $csports[6];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($csports[7] > 0) {
                                    echo $csports[7];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($csports) > 0) {
                                    echo array_sum($csports);
                                }
                                echo'</td>
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Student Marks(count x marks)</p>
                                </td>
                                <td class="table-details">';
                                if($sports[0] > 0) {
                                    echo $sports[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($sports[1] > 0) {
                                    echo $sports[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($sports[2] > 0) {
                                    echo $sports[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($sports[3] > 0) {
                                    echo $sports[3];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($sports[4] > 0) {
                                    echo $sports[4];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($sports[5] > 0) {
                                    echo $sports[5];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($sports[6] > 0) {
                                    echo $sports[6];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($sports[7] > 0) {
                                    echo $sports[7];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($sports) > 0) {
                                    echo array_sum($sports);
                                }
                                echo'</td>
    
                            </tr>
    
                        </tbody>
                    </table>';
                    // sports and games :: end
                    
                    // membership :: start
                    echo '<table class="table-responsive table-bordered">
                        <tbody>
                            <tr>
                                <td class="table-details">
                                    <p>Activity</p>
                                </td>
    
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>NCC</p>
                                        <p>/NSS</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <p>Professional Society</p>
                                </td>
                                <td class="table-details">
                                    <p>Clubs</p>
                                </td>
                                <td class="table-details">
                                    <p>Max Points</p>
                                </td>
    
                            </tr>
    
                            <tr>
                                <td class="table-details">
                                    <p>5.Membership</p>
                                </td>
                                <td class="table-details">
                                    <p>20</p>
                                </td>
                                <td class="table-details">
                                    <p>5</p>
                                </td>
                                <td class="table-details">
                                    <p>2</p>
                                </td>
    
                                <td class="table-details">
                                    <p>50</p>
                                </td>
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Count</p>
                                </td>
                                <td class="table-details">';
                                if($cmembership[0] > 0) {
                                    echo $cmembership[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cmembership[1] > 0) {
                                    echo $cmembership[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cmembership[2] > 0) {
                                    echo $cmembership[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($cmembership) > 0) {
                                    echo array_sum($cmembership);
                                }
                                echo'</td>
    
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Student Marks(count x marks)</p>
                                </td>
                                <td class="table-details">';
                                if($membership[0] > 0) {
                                    echo $membership[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($membership[1] > 0) {
                                    echo $membership[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($membership[2] > 0) {
                                    echo $membership[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($membership) > 0) {
                                    echo array_sum($membership);
                                }
                                echo'</td>
    
    
                            </tr>
                        </tbody>
                    </table>';
                    // membership :: end
                    
                    // leadership-organizing-events :: start
                    echo '<table class="table-responsive table-bordered">
                        <tbody>
                            <tr>
                                <td class="table-details">
                                    <p>Activity</p>
                                </td>
    
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Chairman/</p>
                                        <p>Secretary/</p>
                                        <p>Treasurer etc.</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Join Secretary/</p>
                                        <p>Voice Chairman/</p>
                                        <p>etc.</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <p>EC Member</p>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Class Representative/</p>
                                        <p>Placement/</p>
                                        <p>Coordinator/Cell</p>
                                        <p>Coordinator</p>
                                        <p>IV or IPT</p>
                                        <p>Coordinator</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <p>Max Points</p>
                                </td>
    
                            </tr>
    
                            <tr>
                                <td class="table-details">
                                    <p>6.Leadership/</p>
                                    <p>Organization Events</p>
                                </td>
                                <td class="table-details">
                                    <p>30</p>
                                </td>
                                <td class="table-details">
                                    <p>20</p>
                                </td>
                                <td class="table-details">
                                    <p>10</p>
                                </td>
    
                                <td class="table-details">
                                    <p>10</p>
                                </td>
                                <td class="table-details">
                                    <p>100</p>
                                </td>
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Count</p>
                                </td>
                                <td class="table-details">';
                                if($cleadership[0] > 0) {
                                    echo $cleadership[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cleadership[1] > 0) {
                                    echo $cleadership[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cleadership[2] > 0) {
                                    echo $cleadership[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cleadership[3] > 0) {
                                    echo $cleadership[3];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($cleadership) > 0) {
                                    echo array_sum($cleadership);
                                }
                                echo'</td>
    
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Student Marks(count x marks)</p>
                                </td>
                                <td class="table-details">';
                                if($leadership[0] > 0) {
                                    echo $leadership[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($leadership[1] > 0) {
                                    echo $leadership[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($leadership[2] > 0) {
                                    echo $leadership[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($leadership[3] > 0) {
                                    echo $leadership[3];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($leadership) > 0) {
                                    echo array_sum($leadership);
                                }
                                echo'</td>
    
    
                            </tr>
    
                        </tbody>
                    </table>';
                    // leadership-organizing-events :: end
                    
                    // vac-online-courses :: start
                    echo '<table class="table-responsive table-bordered">
                        <tbody>
                            <tr>
                                <td rowspan="2" class="table-details">
                                    <p>Activity</p>
                                </td>
                                <td rowspan="2" class="table-details">
                                    <div class="header-titile">
                                        <p>Value Added</p>
                                        <p>Course</p>
                                        <p>(Noncredit</p>
                                        <p>courses)</p>
    
                                    </div>
                                </td>
                                <td colspan="3" class="table-details">
                                    <div class="header-titile">
                                        <p>Physical(INdustry Collaboration)/</p>
                                        <p>Online corses like </p>
                                        <p>NPTEL,etc.</p>
    
    
                                    </div>
                                </td>
                                <td rowspan="2" class="table-details">
                                    <p>Max Points</p>
                                </td>
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>One Credit</p>
                                        <p>Courses</p>
                                    </div>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Two Credit</p>
                                        <p>Courses</p>
                                    </div>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>More than Two</p>
                                        <p>Credit Courses</p>
                                    </div>
                                </td>
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>7.VAC/Online Courses</p>
                                </td>
                                <td class="table-details">
                                    <p>5</p>
                                </td>
                                <td class="table-details">
                                    <p>10</p>
                                </td>
    
                                <td class="table-details">
                                    <p>20</p>
                                </td>
    
                                <td class="table-details">
                                    <p>
                                        30
                                    </p>
                                </td>
    
                                <td class="table-details">
                                    <p>100</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Count</p>
                                </td>
                                <td class="table-details">';
                                if($cvac[0] > 0) {
                                    echo $cvac[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cvac[1] > 0) {
                                    echo $cvac[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cvac[2] > 0) {
                                    echo $cvac[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cvac[3] > 0) {
                                    echo $cvac[3];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($cvac) > 0) {
                                    echo array_sum($cvac);
                                }
                                echo'</td>
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Student Marks(count x marks)</p>
                                </td>
                                <td class="table-details">';
                                if($vac[0] > 0) {
                                    echo $vac[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($vac[1] > 0) {
                                    echo $vac[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($vac[2] > 0) {
                                    echo $vac[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($vac[3] > 0) {
                                    echo $vac[3];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($vac) > 0) {
                                    echo array_sum($vac);
                                }
                                echo'</td>
    
                            </tr>
    
                        </tbody>
                    </table>';
                    // vac-online-courses :: end
                    
                    // project-to-patent :: start
                    echo '<table class="table-responsive table-bordered">
                        <tbody>
                            <tr>
                                <td rowspan="2" class="table-details">
                                    <p>Activity</p>
                                </td>
                                <td colspan="2" class="table-details">
                                    <p>SCI Indexed</p>
                                </td>
                                <td colspan="2" class="table-details">
                                    <div class="header-titile">
                                        <p>WOS/Scopes/</p>
                                        <p>Journal/</p>
                                        <p>Conference</p>
    
    
                                    </div>
                                </td>
                                <td rowspan="2" class="table-details">
                                    <div class="header-titile">
                                        <p>Other/</p>
                                        <p>Journal/</p>
                                        <p>Conference</p>
                                    </div>
                                </td>
                                <td colspan="3" class="table-details">
                                    <p>Patent</p>
                                </td>
                                <td colspan="2" class="table-details">
                                    <p>Copyright</p>
                                </td>
                                <td colspan="2" class="table-details">
                                    <p>Max points</p>
                                </td>
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Submit</p>
                                        <p>ted</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Publis</p>
                                        <p>hed</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Submit</p>
                                        <p>ted</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Publis</p>
                                        <p>hed</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Appli</p>
                                        <p>ed</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Publis</p>
                                        <p>hed</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Obtain</p>
                                        <p>ed</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Appli</p>
                                        <p>ed</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Publis</p>
                                        <p>hed</p>
    
                                    </div>
                                </td>
    
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>8.Project to</p>
                                        <p>Paper/</p>
                                        <p>Patent Copyright</p>
                                    </div>
                                </td>
                                <td class="table-details">
                                    <p>10</p>
                                </td>
                                <td class="table-details">
                                    <p>50</p>
                                </td>
    
                                <td class="table-details">
                                    <p>10</p>
                                </td>
    
                                <td class="table-details">
                                    <p>
                                        30
                                    </p>
                                </td>
    
                                <td class="table-details">
                                    <p>5</p>
                                </td>
                                <td class="table-details">
                                    <p>10</p>
                                </td>
                                <td class="table-details">
                                    <p>20</p>
                                </td>
                                <td class="table-details">
                                    <p>100</p>
                                </td>
                                <td class="table-details">
                                    <p>5</p>
                                </td>
                                <td class="table-details">
                                    <p>10</p>
                                </td>
                                <td class="table-details">
                                    <p>100</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Count</p>
                                </td>
                                <td class="table-details">';
                                if($cptop[0] > 0) {
                                    echo $cptop[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cptop[1] > 0) {
                                    echo $cptop[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cptop[2] > 0) {
                                    echo $cptop[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cptop[3] > 0) {
                                    echo $cptop[3];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cptop[4] > 0) {
                                    echo $cptop[4];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cptop[5] > 0) {
                                    echo $cptop[5];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cptop[6] > 0) {
                                    echo $cptop[6];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cptop[7] > 0) {
                                    echo $cptop[7];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cptop[8] > 0) {
                                    echo $cptop[8];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cptop[9] > 0) {
                                    echo $cptop[9];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($cptop) > 0) {
                                    echo array_sum($cptop);
                                }
                                echo'</td>
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Student Marks(count x marks)</p>
                                </td>
                                <td class="table-details">';
                                if($ptop[0] > 0) {
                                    echo $ptop[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($ptop[1] > 0) {
                                    echo $ptop[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($ptop[2] > 0) {
                                    echo $ptop[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($ptop[3] > 0) {
                                    echo $ptop[3];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($ptop[4] > 0) {
                                    echo $ptop[4];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($ptop[5] > 0) {
                                    echo $ptop[5];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($ptop[6] > 0) {
                                    echo $ptop[6];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($ptop[7] > 0) {
                                    echo $ptop[7];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($ptop[8] > 0) {
                                    echo $ptop[8];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($ptop[9] > 0) {
                                    echo $ptop[9];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($ptop) > 0) {
                                    echo array_sum($ptop);
                                }
                                echo'</td>
    
                            </tr>
    
                        </tbody>
                    </table>
                    <table class="table-responsive table-bordered">
                        <tbody>
                            <tr>
                                <td class="table-details">
                                    <p>Activity</p>
                                </td>
    
                                <td class="table-details">
                                    <p>Appeared</p>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Qualified in</p>
                                        <p>/GATE/CAT</p>
                                        <p>etc.</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Good National</p>
                                        <p>ranking in</p>
                                        <p>GATE/CAT etc.</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Cleared Govt</p>
                                        <p>Exams</p>
    
                                    </div>
                                </td>
    
                                <td class="table-details">
                                    <p>Max Points</p>
                                </td>
    
                            </tr>
    
                            <tr>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>9.GATE/CAT</p>
                                        <p>Govt Exams</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <p>5</p>
                                </td>
                                <td class="table-details">
                                    <p>30</p>
                                </td>
                                <td class="table-details">
                                    <p>100</p>
                                </td>
    
                                <td class="table-details">
                                    <p>100</p>
                                </td>
                                <td class="table-details">
                                    <p>100</p>
                                </td>
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Count</p>
                                </td>
                                <td class="table-details">';
                                if($cgovt[0] > 0) {
                                    echo $cgovt[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cgovt[1] > 0) {
                                    echo $cgovt[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cgovt[2] > 0) {
                                    echo $cgovt[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cgovt[3] > 0) {
                                    echo $cgovt[3];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($cgovt) > 0) {
                                    echo array_sum($cgovt);
                                }
                                echo'</td>
    
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Student Marks(count x marks)</p>
                                </td>
                                <td class="table-details">';
                                if($govt[0] > 0) {
                                    echo $govt[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($govt[1] > 0) {
                                    echo $govt[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($govt[2] > 0) {
                                    echo $govt[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($govt[3] > 0) {
                                    echo $govt[3];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($govt) > 0) {
                                    echo array_sum($govt);
                                }
                                echo'</td>
    
                            </tr>
    
                        </tbody>
                    </table>';
                    // project-to-patent :: end
                    
                    // placement-internship :: start
                    echo '<table class="table-responsive table-bordered">
                        <tbody>
                            <tr>
                                <td class="table-details">
                                    <p>Activity</p>
                                </td>
    
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Written Test</p>
                                        <p>cleared</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <p>Placed</p>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Placed with</p>
                                        <p>Internship</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Internship</p>
                                        <p>without</p>
                                        <p>Placement</p>
                                    </div>
                                </td>
    
                                <td class="table-details">
                                    <p>Max Points</p>
                                </td>
    
                            </tr>
    
                            <tr>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>10.Placement</p>
                                        <p>and Internship</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <p>5(max:20)</p>
                                </td>
                                <td class="table-details">
                                    <p>40</p>
                                </td>
                                <td class="table-details">
                                    <p>50</p>
                                </td>
    
                                <td class="table-details">
                                    <p>20</p>
                                </td>
                                <td class="table-details">
                                    <p>50</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Count</p>
                                </td>
                                <td class="table-details">';
                                if($cplacement[0] > 0) {
                                    echo $cplacement[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cplacement[1] > 0) {
                                    echo $cplacement[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cplacement[2] > 0) {
                                    echo $cplacement[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cplacement[3] > 0) {
                                    echo $cplacement[3];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($cplacement) > 0) {
                                    echo array_sum($cplacement);
                                }
                                echo'</td>
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Student Marks(count x marks)</p>
                                </td>
                                <td class="table-details">';
                                if($placement[0] > 0) {
                                    echo $placement[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($placement[1] > 0) {
                                    echo $placement[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($placement[2] > 0) {
                                    echo $placement[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($placement[3] > 0) {
                                    echo $placement[3];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($placement) > 0) {
                                    echo array_sum($placement);
                                }
                                echo'</td>
                            </tr>
                        </tbody>
                    </table>';
                    // placement-internship :: end
                    
                    // entrepreneurship :: start
                    echo '<table class="table-responsive table-bordered">
                        <tbody>
                            <tr>
                                <td class="table-details">
                                    <p>Activity</p>
                                </td>
    
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Workshop</p>
                                        <p>attended</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Registered</p>
                                        <p>for start-up</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Released</p>
                                        <p>product</p>
    
                                    </div>
                                </td>
    
                                <td class="table-details">
                                    <p>Max Points</p>
                                </td>
    
                            </tr>
    
                            <tr>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>11.Entrepreneurship</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <p>10</p>
                                </td>
                                <td class="table-details">
                                    <p>50</p>
                                </td>
                                <td class="table-details">
                                    <p>100</p>
                                </td>
    
                                <td class="table-details">
                                    <p>100</p>
                                </td>
    
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Count</p>
                                </td>
                                <td class="table-details">';
                                if($centrepreneurship[0] > 0) {
                                    echo $centrepreneurship[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($centrepreneurship[1] > 0) {
                                    echo $centrepreneurship[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($centrepreneurship[2] > 0) {
                                    echo $centrepreneurship[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($centrepreneurship) > 0) {
                                    echo array_sum($centrepreneurship);
                                }
                                echo'</td>
    
    
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Student Marks(count x marks)</p>
                                </td>
                                <td class="table-details">';
                                if($entrepreneurship[0] > 0) {
                                    echo $entrepreneurship[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($entrepreneurship[1] > 0) {
                                    echo $entrepreneurship[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($entrepreneurship[2] > 0) {
                                    echo $entrepreneurship[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($entrepreneurship) > 0) {
                                    echo array_sum($entrepreneurship);
                                }
                                echo'</td>
    
    
    
                            </tr>
    
                        </tbody>
                    </table>';
                    // entrepreneurship :: end
                    
                    // social-activities :: start
                    echo '<table class="table-responsive table-bordered">
                        <tbody>
                            <tr>
                                <td rowspan="2" class="table-details">
                                    <p>Activity</p>
                                </td>
    
                                <td colspan="4" class="table-details">
                                    <p>Community services</p>
                                </td>
    
    
                            </tr>
    
                            <tr>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>Activities such as</p>
                                        <p>Blood donation</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>1 to 2 weeks</p>
                                        <p>(NSS/NCC Camp</p>
                                        <p>etc.)</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>More than</p>
                                        <p>2 weeks</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <p>Max Points</p>
                                </td>
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>12.Social</p>
                                        <p>Activities</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <p>5/Activity</p>
                                </td>
                                <td class="table-details">
                                    <p>30</p>
                                </td>
                                <td class="table-details">
                                    <p>50</p>
                                </td>
    
                                <td class="table-details">
                                    <p>50</p>
                                </td>
    
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Count</p>
                                </td>
                                <td class="table-details">';
                                if($csocial[0] > 0) {
                                    echo $csocial[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($csocial[1] > 0) {
                                    echo $csocial[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($csocial[2] > 0) {
                                    echo $csocial[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($csocial) > 0) {
                                    echo array_sum($csocial);
                                }
                                echo'</td>
    
    
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Student Marks(count x marks)</p>
                                </td>
                                <td class="table-details">';
                                if($social[0] > 0) {
                                    echo $social[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($social[1] > 0) {
                                    echo $social[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($social[2] > 0) {
                                    echo $social[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($social) > 0) {
                                    echo array_sum($social);
                                }
                                echo'</td>
    
    
    
                            </tr>
                        </tbody>
                    </table>';
                    //social-activities :: end
                    
                    // others :: start
                    echo '<table class="table-responsive table-bordered">
                        <tbody>
                            <tr>
                                <td rowspan="2" class="table-details">
                                    <p>Activity</p>
                                </td>
    
                                <td colspan="2" class="table-details">
                                    <p>Participated</p>
                                </td>
                                <td colspan="2" class="table-details">
                                    <p>Prize</p>
                                </td>
                                <td rowspan="2" class="table-details">
                                    <p>Max Points</p>
                                </td>
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Inside</p>
                                </td>
    
                                <td class="table-details">
                                    <p>Outside</p>
                                </td>
    
                                <td class="table-details">
                                    <p>Inside</p>
                                </td>
                                <td class="table-details">
                                    <p>Outside</p>
                                </td>
    
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <div class="header-titile">
                                        <p>13.Others(</p>
                                        <p>cultural,Essay</p>
                                        <p>etc.)</p>
    
                                    </div>
                                </td>
                                <td class="table-details">
                                    <p>2</p>
                                </td>
                                <td class="table-details">
                                    <p>5</p>
                                </td>
                                <td class="table-details">
                                    <p>10</p>
                                </td>
                                <td class="table-details">
                                    <p>20</p>
                                </td>
                                <td class="table-details">
                                    <p>
                                        25
                                    </p>
                                </td>
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Count</p>
                                </td>
                                <td class="table-details">';
                                if($cothers[0] > 0) {
                                    echo $cothers[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cothers[1] > 0) {
                                    echo $cothers[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cothers[2] > 0) {
                                    echo $cothers[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($cothers[3] > 0) {
                                    echo $cothers[3];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($cothers) > 0) {
                                    echo array_sum($cothers);
                                }
                                echo'</td>
    
    
                            </tr>
                            <tr>
                                <td class="table-details">
                                    <p>Student Marks(count x marks)</p>
                                </td>
                                <td class="table-details">';
                                if($others[0] > 0) {
                                    echo $others[0];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($others[1] > 0) {
                                    echo $others[1];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($others[2] > 0) {
                                    echo $others[2];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if($others[3] > 0) {
                                    echo $others[3];
                                }
                                echo'</td>
                                <td class="table-details">';
                                if(array_sum($others) > 0) {
                                    echo array_sum($others);
                                }
                                echo'</td>
    
    
                            </tr>
    
                        </tbody>
                    </table>';
                    // others :: end
                    
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
        }   
        else {
            $_SESSION['errorMessage'] = "Choose valid semester!...";
        }
    }
?>

 