<?php
    // database-connection :: start
    require('PHP/DATABASE/databaseConnection.php');
    // database-connection :: end
?>

<?php

    $sql = "SELECT * FROM Circulars WHERE userCategory = '2' OR userCategory = '0';";
    $result = mysqli_query($link,$sql);
    if(mysqli_num_rows($result) > 0) {
        foreach($result as $circular) {
            echo '<div class="card-container">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body">
                                    <div class="circular-header">
                                        <h3>' . ucwords($circular["circularNumber"]) . '</h3>
                                        <h4>' . ucwords($circular["circularTitle"]) . '</h4>
                                        <div class="year-container">
                                            <h5>Year</h5>
                                            <div class="year">' . $circular["yearCircular"] . '</div>
                                        </div>
                                        <div class="department-container">
                                            <h5>Department</h5>
                                            <div class="department">' . $circular["department"] . '</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body">
                                    <a href="' . $circular["documentLink"] . '" target="_blank">
                                        <div class="description-container">' . $circular["circularDescription"] . '</div>
                                    </a>
                                    <div class="button-container">
                                        <button onclick=deleteCircular("' . $circular["circularNumber"] . '") class="deletebtn">DELETE</button>
                                        <button onclick=editCircular("' . $circular["circularNumber"] . '") class="editbtn">EDIT</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
    }
    else {
        echo "<div class='no-record'><i>No record found!</i></div>";
    }
    
?>

