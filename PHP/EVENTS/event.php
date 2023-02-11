<?php

    // database-connection :: start
    require('PHP/DATABASE/databaseConnection.php');
    // database-connection :: end
?>

<?php

    $sql = "SELECT * FROM Events ORDER BY dateOfEvent DESC;";
    $result = mysqli_query($link,$sql);
    if(mysqli_num_rows($result) > 0) {
        foreach($result as $event) {
            $date = date('Y-m-d');
            $no_days = date_diff(date_create($date),date_create($event["dateOfEvent"]))->format("%r%a");
            if($event['entryFee'] == 0) {
                echo '<div class="event-list">
                        <div class="free"></div>
                        <div class="event-image-container">
                            <img src="data:image/jpeg;base64,' . base64_encode($event["eventImage"]) . '" alt="Event" />
                        </div>
                        <div class="event-detail-container">
                            <div class="event-name">' . ucwords($event["eventName"]) . '</div>
                            <div class="organizer">' . ucwords($event["eventOrganizer"]) . '</div>
                            <div class="mode-category">';
                                if($event["eventCategory"] == 1) {
                                    echo "Inside";
                                }
                                else {
                                    echo "Outside";
                                }
                            echo '</div>
                            <div class="payment-category">free</div>
                            <div class="department">' . $event["department"] . '</div>
                            <div class="time-status">
                                <div class="deadline">Deadline : <span class="time-deadline">' . date("d-m-Y", strtotime($event["registrationDeadLine"])) . '</span></div>
                                <div>
                                    <span class="time"> ';
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
                            <div class="event-type-container">
                                <div class="event-type">' . ucwords($event["eventType"]) . '</div>
                                <div class="eligibility-type">Eligibility : ' . ucwords($event["eligibility"]) . '</div>
				<div class="view-more"> <a href="eventsPage.php?eventId=' . $event["eventId"] . '" >View more</a></div>
                            </div>
                        </div>
                    </div>';
            }
            else {
                echo '<div class="event-list">
                        <div class="paid"></div>
                        <div class="event-image-container">
                            <img src="data:image/jpeg;base64,' . base64_encode($event["eventImage"]) . '" alt="Event" />
                        </div>
                        <div class="event-detail-container">
                            <div class="event-name">' . ucwords($event["eventName"]) . '</div>
                            <div class="organizer">' . ucwords($event["eventOrganizer"]) . '</div>
                            <div class="mode-category">';
                                if($event["eventCategory"] == 1) {
                                    echo "Inside";
                                }
                                else {
                                    echo "Outside";
                                }
                            echo '</div>
                            <div class="payment-category">paid</div>
                            <div class="department">' . $event["department"] . '</div>
                            <div class="time-status">
                                <div class="deadline">Deadline : <span class="time-deadline">' . date("d-m-Y", strtotime($event["registrationDeadLine"])) . '</span></div>
                                <div>
                                    <span class="time"> ';
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
                            <div class="event-type-container">
                                <div class="event-type">' . ucwords($event["eventType"]) . '</div>
                                <div class="eligibility-type">Eligibility : ' . ucwords($event["eligibility"]) . '</div>
                               <div class="view-more"> <a href="eventsPage.php?eventId=' . $event["eventId"] . '" >View more</a></div>
                            </div>
                        </div>
                    </div>';
            }
        }
    }
    else {
        echo '<div class="no-event"><i>No events.</i></div>';
    }
?>


