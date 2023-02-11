<?php

    session_start();
    // database-connection :: start
    require('../DATABASE/databaseConnection.php');
    // database-connection :: end
?>


<?php

    $subCategory = [
        [],
        ['submitted', 'inside', 'outside', 'premier'],
        ['submitted', 'inside', 'outside', 'premier'],
        ['inside', 'outside', 'state', 'national/international'],
        [
            'inside',
            'zone-or-outside',
            'state-or-interzone',
            'national/international'
        ],
        ['ncc/nss', 'professionalsociety', 'clubs'],
        [
            'secretary',
            'joint-secretary',
            'ec-member',
            'class-representative'
        ],
        [
            'non-credit',
            'one-credit',
            'two-credit',
            'three-credit'
        ],
        [
            'sci-submitted',
            'sci-published',
            'wos-submitted',
            'wos-published',
            'others',
            'patent-applied',
            'patent-published',
            'patent-obtained',
            'copyright-applied',
            'copyright-published'
        ],
        [
            'appeared',
            "qualified",
            'ranking',
            'cleared'
        ],
        [
            'written-test',
            'placed',
            'pwithi',
            'pwithouti'
        ],
        ['workshop', 'start-up', 'product'],
        [
            'blood-donation',
            'camp-1',
            'camp-3'
        ],
        ['inside', 'outside']
    ];

    $subCategoryTitle = [
        [],
        ['Submitted', 'Inside', 'Outside', 'Premier'],
        ['Submitted', 'Inside', 'Outside', 'Premier'],
        ['Inside', 'Outside', 'State', 'National/International'],
        [
            'Inside',
            'Zone / Outside',
            'State / Interzone',
            'National / International'
        ],
        ['NCC / NSS', 'Professional Society', 'Clubs'],
        [
            'Chairman / Secretary / Treasurer etc ',
            'Joint Secretary / Vice Chairman etc',
            'Executive Member',
            'Class Representative / Placement or Cell Coordinator / IV or IPT Coordinator'
        ],
        [
            'Non Credit',
            'One Credit',
            'Two Credit',
            'Three Credit'
        ],
        [
            'SCI Submitted',
            'SCI Published',
            'WOS Submitted',
            'WOS Sublished',
            'Others',
            'Patent Applied',
            'Patent Published',
            'Patent Obtained',
            'Copyright Applied',
            'Copyright Published'
        ],
        [
            'Appeared',
            "Qualified",
            'Ranking',
            'Cleared'
        ],
        [
            'Written Test',
            'Placed',
            'Placed with Internship',
            'Placed without Internship'
        ],
        ['Workshop', 'Start up', 'Product'],
        [
            'Blood donation',
            '1-2 Weeks Camp',
            'More than 3 Weeks Camp'
        ],
        ['Inside', 'Outside']
    ];

    if(isset($_POST['sid'])) {
        
        $sapId = $_POST['sid'];
        $studentBatch = $_SESSION['studentBatch'];
        
        $sql = "SELECT * FROM SAP_" . $studentBatch . "Batch WHERE sapId = '$sapId';";
        $result = mysqli_query($link,$sql);
        if(mysqli_num_rows($result) > 0) {
            $sap = mysqli_fetch_array($result); 
            echo '<form class="form-horizontal" action="PHP/SAP_POINTS/updateDocument.php" method="post" enctype="multipart/form-data">
                    
                    <input type="hidden" name="sapId" value="' . $sapId . '" class="form-control">
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <select class="form-control" name="category" required>
                                <option></option>
                                <option value="1"';
                                    if($sap["sapCategory"] == "1") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Paper Presentation</option>
                                <option value="2"';
                                    if($sap["sapCategory"] == "2") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Project Presentation</option>
                                <option value="3"';
                                    if($sap["sapCategory"] == "3") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Techno Managerial Events</option>
                                <option value="4"';
                                    if($sap["sapCategory"] == "4") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Sports and Games</option>
                                <option value="5"';
                                    if($sap["sapCategory"] == "5") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Membership</option>
                                <option value="6"';
                                    if($sap["sapCategory"] == "6") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Leadership / Organization Events</option>
                                <option value="7"';
                                    if($sap["sapCategory"] == "7") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>VAC / Online Courses</option>
                                <option value="8"';
                                    if($sap["sapCategory"] == "8") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Project to paper / Patent Copyright</option>
                                <option value="9"';
                                    if($sap["sapCategory"] == "9") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>GATE / CAT / Govt Exams</option>
                                <option value="10"';
                                    if($sap["sapCategory"] == "10") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Placement and Internship</option>
                                <option value="11"';
                                    if($sap["sapCategory"] == "11") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Entrepreneurship</option>
                                <option value="12"';
                                    if($sap["sapCategory"] == "12") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Social Activities</option>
                                <option value="13"';
                                    if($sap["sapCategory"] == "13") {
                                        echo "selected = 'selected'";
                                    }
                                echo '>Others(Cultural, Essay etc..)</option>
                            </select>
                            <label for="category">Category</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <select class="form-control" name="subCategory" required>';
                                $length = count($subCategory[$sap["sapCategory"]]);
                                for($i=0;$i<$length;$i++) {
                                    if($sap["conductionCategory"] == $subCategory[$sap["sapCategory"]][$i]) {
                                        echo "<option value='" . $subCategory[$sap["sapCategory"]][$i] . "' selected='selected'>" . $subCategoryTitle[$sap["sapCategory"]][$i] . "</option>";
                                    }
                                    else {
                                        echo "<option value='" . $subCategory[$sap["sapCategory"]][$i] . "'>" . $subCategoryTitle[$sap["sapCategory"]][$i] . "</option>";
                                    }
                                }
                            echo '</select>
                            <label for="subCategory">Sub Category</label>
                        </div>
                    </div>';
                    
                    if ($sap["conductionCategory"] != "submitted" && $sap["sapCategory"] != "5" && $sap["sapCategory"] != "6" && $sap["sapCategory"] != "7" && $sap["sapCategory"] != "8" && $sap["sapCategory"] != "9" && $sap["sapCategory"] != "10" && $sap["sapCategory"] != "11" && $sap["sapCategory"] != "12") {
                            echo '<div class="form-group">
                                    <div class="col-sm-10 col-md-8 input-fields prize-won">
                                        <select class="form-control" name="prizeWon">
                                            <option></option>
                                            <option value="0"';
                                                if($sap["prizeWon"] == "0") {
                                                    echo "selected = 'selected'";
                                                }
                                            echo '>Participated</option>
                                            <option value="1"';
                                                if($sap["prizeWon"] == "1") {
                                                    echo "selected = 'selected'";
                                                }
                                            echo '>Prize</option>
                                        </select>
                                        <label for="prizeWon">Prize</label>
                                    </div>
                                </div>';
                    }
                    
                    if($sap["sapCategory"] == "1" || $sap["sapCategory"] == "2" || $sap["sapCategory"] == "3" || $sap["sapCategory"] == "13") {
                        echo '<div class="form-group">
                            <div class="col-sm-10 col-md-8 input-fields conductivity-mode">
                                <select class="form-control" name="conductivityMode" >
                                    <option></option>
                                    <option value="0"';
                                        if($sap["conductivityMode"] == "0") {
                                            echo "selected = 'selected'";
                                        }
                                    echo '>Offline</option>
                                    <option value="1"';
                                        if($sap["conductivityMode"] == "1") {
                                            echo "selected = 'selected'";
                                        }
                                    echo '>Online</option>
                                </select>
                                <label for="conductivityMode">Conductivity Mode</label>
                            </div>
                        </div>';
                    }
                    
                    echo '<div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="text" name="documentTitle" value="' . ucwords($sap['documentTitle']) . '" class="form-control" maxlength="50" required>
                            <label for="documentTitle">Document Title</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="text" name="organizer" value="' . ucwords($sap['organiser']) . '" class="form-control" maxlength="50" required>
                            <label for="organizer">Organizer</label>
                        </div>
                    </div>
            
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <textarea type="text" name="description" class="form-control" maxlength="250" rows="3" required>' . $sap['description'] . '</textarea>
                            <label for="description">Description</label>
                        </div>
                    </div>
            
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="number" name="expectedMark"  value="' . $sap['expectedMark'] . '" class="form-control" maxlength="5" required>
                            <label for="expectedMark">Expected Mark</label>
                        </div>
                    </div>
            
                    <div class="form-group">
                        <div class="col-sm-10 col-md-8 input-fields">
                            <input type="file" name="sapDocument" id="sapDocument" class="form-control">
                            <label for="sapDocument">Proof Document</label>
                        </div>
                    </div>
                    
                    <div class="submit-button-container">
                        <button type="reset" class="btn reset-button">CANCEL</button>
                        <button type="submit" name="save" class="btn upload-button">SAVE</button>
                    </div>
                    
                </form>';
        }
    }
?>