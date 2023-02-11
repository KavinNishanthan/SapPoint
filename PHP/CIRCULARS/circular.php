<?php

    // database-connection :: start
    require('PHP/DATABASE/databaseConnection.php');
    // database-connection :: end
?>

<?php

    echo '<div class="slider-container">
            <div class="carousel owl-carousel">';
                        
                if(isset($_SESSION["studentEmail"])) {
                    
                    $department = $_SESSION['department'];
                    $semester = $_SESSION["semester"];
                    $year = ceil($semester/2);
                    
                    $sql = "SELECT * FROM Circulars WHERE userCategory = '0' AND userCategory = '2';";
                    $result = mysqli_query($link,$sql);
                    if(mysqli_num_rows($result) > 0) {
                        foreach($result as $student) {
                            if((strpos($student["department"],$department) !== false) && (strpos($student["yearCircular"],$year) !== false)) {
                                echo '<div class="card">
                                        <div class="imgBx">
                                            <h3>' . $student["circularNumber"] . '</h3>
                                            <h4>' . $student["circularTitle"] . '</h4>
                                            <div class="description-container">
                                                <p>' . $student["description"] . '</p>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <a href="' . $student["documentLink"] . '"><button type="button" class="btn view-button">VIEW</button></a>
                                        </div>
                                    </div>';
                            }
                        }
                    }
                }
                
                if(isset($_SESSION["staffEmail"])) {
                    $sql = "SELECT * FROM Circulars WHERE userCategory = '0' AND userCategory = '1';";
                    $result = mysqli_query($link,$sql);
                    if(mysqli_num_rows($result) > 0) {
                        foreach($result as $staff) {
                            echo $staff["circularNumber"] . "<br>";
                            echo $staff["circularNumber"] . "<br>";
                            echo $staff["circularTitle"] . "<br>";
                            echo $staff["circularNumber"] . "<br>";
                            echo $staff["description"] . "<br>";
                            echo '<div class="card">
                                    <div class="imgBx">
                                        <h3>' . $staff["circularNumber"] . '</h3>
                                        <h4>' . $staff["circularTitle"] . '</h4>
                                        <div class="description-container">
                                            <p>' . $staff["description"] . '</p>
                                        </div>
                                    </div>
                                    <div class="details">
                                        <a href="' . $staff["documentLink"] . '"><button type="button" class="btn view-button">VIEW</button></a>
                                    </div>
                                </div>';
                        }
                    }
                    else {
                        echo mysqli_error($link);
                    }
                }
    
    echo '</div>
    </div>';

?>

