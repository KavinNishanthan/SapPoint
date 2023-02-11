<?php

    // database-connection :: start
    require('PHP/DATABASE/databaseConnection.php');
    // database-connection :: end
?>

<?php
    if(isset($_SESSION["eventID"])) {
        $event_id = $_SESSION["eventID"];
        $sql = "SELECT * FROM   Events WHERE eventId = '$event_id';";
        $result = mysqli_query($link,$sql);
        if(mysqli_num_rows($result) > 0) {
            foreach($result as $event) {
                $coordinator_name = explode(",",$event["coordinatorName"]);
                $coordinator_number = explode(",",$event["coordinatorNumber"]);
                $date = date('Y-m-d');
                $no_days = date_diff(date_create($date),date_create($event["dateOfEvent"]))->format("%r%a");
                echo '<section class="event-image-container">
                        <img src="data:image/jpeg;base64,' . base64_encode($event["eventImage"]) . '" alt="Event" />
                        <div class="image-bar"></div>
                    </section>
                    
                    <section class="event-detail-container">
                        <div class="registeration-detail-container">
                            <div class="deadline">
                                <div class="calender-container">
                                    <i class="fa-regular fa-calendar-days"></i>
                                </div>
                                <div class="deadline-container">
                                    <div class="header">Registeration Deadline</div>
                                    <div class="detail">' . date("d-m-Y", strtotime($event["registrationDeadLine"]))  . '</div>
                                </div>
                            </div>
                
                            <div class="deadline">
                                <div class="calender-container">
                                    <i class="fa-solid fa-gamepad"></i>
                                </div>
                                <div class="deadline-container">
                                    <div class="header">Category</div>
                                    <div class="detail">';
                                    if($event["eventCategory"] == 1) {
                                        echo "Inside KEC";
                                    }
                                    else {
                                        echo "Outside KEC";
                                    }
                                    echo '</div>
                                </div>
                            </div>
                
                            <div class="deadline">
                                <div class="calender-container">
                                    <i class="fa-solid fa-indian-rupee-sign"></i>
                                </div>
                                <div class="deadline-container">
                                    <div class="header">Registeration Fee</div>
                                    <div class="detail">';
                                    if($event['entryFee'] == 0) {
                                        echo "Free";
                                    }
                                    else {
                                        echo $event['entryFee'];
                                    }
                                    echo '</div>
                                </div>
                            </div>
                        </div>
                
                        <div class="registeration-button-container">
                            <a href="' . $event["eventLink"] . '" target="_blank" class="register-button">REGISTER</a>
                            <div class="watchlist-container">
                                <i class="fa-solid fa-bookmark"></i>
                            </div>
                            <div class="watchlist-container">
                                <i class="fa-regular fa-calendar-days"></i>
                            </div>
                        </div>
                
                    </section>
                    
                    <section class="detail-container">
                        <div class="events-container">
                            <div class="events-image-container">
                                <img src="data:image/jpeg;base64,' . base64_encode($event["eventImage"]) . '" alt="Event" />
                            </div>
                            
                            <div class="event-container">
                                <div class="event-name">
                                    <h3>' . ucwords($event["eventName"]) . '</h3>
                                </div>
                                <div class="organiser-name">
                                    <h4>' . ucwords($event["eventOrganizer"]) . '</h4>
                                </div>
                                <div class="institute-name">
                                    <h5>' . ucwords($event["institute"]) . '</h5>
                                </div>
                                <div class="time-status">
                                    <div class="event-type">' . ucwords($event["eventType"]) . '</div>
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
                
                        <div class="description-container">
                            <div class="description">' . $event["eventDescription"] . '</div>
                            </div>
                    </section>
                    
                    <section class="footer">
                        <div class="deadline">
                            <div class="calender-container">
                                <i class="fa-regular fa-calendar-days"></i>
                            </div>
                            <div class="deadline-container">
                                <div class="header">Event Date</div>
                                <div class="detail">' . date("d-m-Y", strtotime($event["dateOfEvent"])) . '</div>
                            </div>
                        </div>
            
                        <div class="deadline">
                            <div class="calender-container">
                                <i class="fa-solid fa-user-check"></i>
                            </div>
                            <div class="deadline-container">
                                <div class="header">Eligibility</div>
                                <div class="detail">' . $event["eligibility"] . '</div>
                            </div>
                        </div>
                        
                        <div class="deadline">
                            <div class="calender-container">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="deadline-container">
                                <div class="header">' . ucwords($coordinator_name[0]) . '</div>
                                <div class="detail">' . $coordinator_number[0] . '</div>
                            </div>
                        </div>
            
                        <div class="deadline">
                            <div class="calender-container">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="deadline-container">
                                <div class="header">' . ucwords($coordinator_name[1]) . '</div>
                                <div class="detail">' . $coordinator_number[1] . '</div>
                            </div>
                        </div>
                    </section>';
            }
        }
        unset($_SESSION["eventID"]);
    }
?>

