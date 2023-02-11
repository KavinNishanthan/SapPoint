<?php
    // database-connection :: start
    require('PHP/DATABASE/databaseConnection.php');
    // database-connection :: end
?>

<?php

    $sql = "SELECT * FROM Events;";
    $result = mysqli_query($link,$sql);
    if(mysqli_num_rows($result) > 0) {
        foreach($result as $event) {
            $date = date('Y-m-d');
            $no_days = date_diff(date_create($date),date_create($event["dateOfEvent"]))->format("%r%a");
            
            echo '<div class="card-container">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body">
                                    <div class="circular-header">
                                        <div class="event-image-container">
                                            <img src="data:image/jpeg;base64,' . base64_encode($event["eventImage"]) . '" alt="Event" />
                                        </div>
                                        <div class="event-detail-container">
                                            <h4>' . ucwords($event["eventName"]) . '</h4>
                                            <h5>' . ucwords($event["eventOrganizer"]) . '</h5>
                                            <h6>' . ucwords($event["institute"]) . '</h6>
                                            <div class="clock">
                                        <span class="time">';
                                        if($no_days > 0) {
                                            if($no_days == 1) {
                                                echo '<i class="fa-regular fa-clock"></i> ' . $no_days . ' day left';
                                            }
                                            else {
                                                echo '<i class="fa-regular fa-clock"></i> ' . $no_days . ' days left';
                                            }
                                        }
                                        else if($no_days == 0) {
                                            echo '<i class="fa-regular fa-clock"></i> Live';
                                        }
                                        else {
                                            echo '<span class="expire"><i class="fa-regular fa-clock"></i> Expired</span>';
                                        }
                                        echo '</span>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body">
                                    <a href="' . $event["eventLink"] . '" target="_blank">
                                        <div class="description-container">' . $event["eventDescription"] . '</div>
                                    </a>
                                    <div class="button-container">
                                        <button onclick=deleteEvent("' . $event["eventId"] . '") class="deletebtn">DELETE</button>
                                        <button onclick=editEvent("' . $event["eventId"] . '") class="editbtn">EDIT</button>
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

