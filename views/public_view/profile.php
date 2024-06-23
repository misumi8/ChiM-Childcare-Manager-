<?php
    require_once '../CHiM/views/includes/header.php';
    require_once dirname(__DIR__,2) . '/views/includes/footer.php';
    require_once './controllers/childInfo.php';
    require_once dirname(__DIR__,2) . '/views/includes/footer.php';
    if (!isset($_SESSION['user_id'])) {
        echo '<script>alert("You are not logged in. Please log in and try again :)");'
           . 'window.location.href = "/CHiM/login";</script>';
    }
?>

<span id="pr-child-id"><?php echo $_SESSION['child_id'];?></span>
<div id="pr-frame">
    <div id="pr-child-info">
        <div id="pr-first-row">
            <div id="pr-child-photo-container">
                <?php
                    echo "<img id='pr-child-image' style='opacity:" . $photoExist . "' src='data:image/jpeg;base64," . $childPic . "'/>";
                ?>
                <input type="file" id="pr-photo" onchange="changeChildImage(<?php echo $_SESSION['child_id']; ?>)">
            </div>
            <div id="pr-child-info">
                <form metdod="post" id="pr-child-data-form"> <!-- action="./controllers/updateChildInfo.php"-->
                    <ul id="pr-2col-table">
                        <li>
                            <label for="Name">Name:</label>
                            <input requred type="text"
                                    id="pr-name-input" 
                                    class="pr-child-info-input" 
                                    name="name" 
                                    placeholder="Name" 
                                    value="<?php echo $childInfo['fullname']; ?>"/>
                        </li>
                        <li>
                            <label for="date-of-birtd">Date of birth:</label>
                            <input requred type="date" 
                                    id="pr-dob-input" 
                                    class="pr-child-info-input" 
                                    name="date-of-birth" 
                                    placeholder="Date of birth"
                                    value="<?php echo $childInfo['birthday']; ?>" />
                        </li>
                        <li>
                            <label for="gender">Gender:</label>
                            <input type="radio" id="male" name="gender-type" value="Male" <?php echo $childInfo['gender'] == "Male" ? 'checked' : '';?>/>
                            <label for="male">Boy</label>
                            <input type="radio" id="female" name="gender-type" value="Female" <?php echo $childInfo['gender'] == "Female" ? 'checked' : '';?>/> 
                            <label for="female">Girl</label>
                        </li>
                        <li>
                            <label for="height">Height:</label>
                            <input requred type="text" 
                                    id="pr-height-input"
                                    class="pr-child-info-input" 
                                    name="height" 
                                    placeholder="Height"
                                    value="<?php echo $childInfo['height']; ?>" />
                        </li>
                        <li>
                            <label for="hobby">Favorite hobby:</label>
                            <input requred type="text" 
                                    id="pr-hobby-input"
                                    class="pr-child-info-input" 
                                    name="hobby" 
                                    placeholder="Hobby"
                                    value="<?php echo $childInfo['fav_hobby']; ?>" />
                        </li>
                        <li>
                            <label for="food">Favorite food:</label>
                            <input requred type="text" 
                                    id="pr-food-input"
                                    class="pr-child-info-input" 
                                    name="food" 
                                    placeholder="Food" 
                                    value="<?php echo $childInfo['fav_food']; ?>"/>
                        </li>
                        <button type="submit" class="pr-profile-info-button" >Save</button>
                        <button type="#" id="pr-medical-history-button" onclick="return false;"></button>
                </form>
                <div id="pr-medical-history">
                            <div id="pr-medical-table">
                                <table>
                                    <thead>
                                        <tr>
                                            <td scope="col">Doctor</td>
                                            <td scope="col">Diagnosis</td>
                                            <td scope="col">Treatment</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($medicalRecords as $record) { ?>
                                        <tr class="row">
                                            <td><textarea class="pr-table-cell" readonly><?php echo $record['doctor_name'];?></textarea></td>
                                            <td>
                                                <textarea class="pr-table-cell" readonly><?php echo $record['diagnosis'];?></textarea>
                                                <input requred type="date" 
                                                    class="pr-medical-record-date" 
                                                    name="medical-record-date" 
                                                    placeholder="Date of record"
                                                    value="<?php echo $record['record_date'];?>"
                                                    disabled/>  
                                            </td>
                                            <td>
                                                <textarea class="pr-table-cell" readonly><?php echo $record['treatment'];?></textarea>
                                            </td>                                            
                                        </tr>
                                        <?php } ?>
                                        <tr class="row pr-new-medical-record">
                                            <td>
                                                <textarea class="pr-table-cell pr-new-doc-name" maxlength="50" placeholder="Doctor name"></textarea>
                                            </td>
                                            <td>
                                                <textarea class="pr-table-cell pr-new-diagnosis" maxlength="150" placeholder="Diagnosis"></textarea>
                                                <input requred type="date" 
                                                    class="pr-medical-record-date pr-new-med-rec-date" 
                                                    name="medical-record-date" 
                                                    placeholder="Date of record"
                                                   />  
                                            </td>
                                            <td>
                                                <textarea class="pr-table-cell pr-new-treatment" maxlength="300" placeholder="Treatment"></textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div id="pr-buttons-medical-history">
                                    <button type="#" class="pr-button-medical-record" onclick="return false;"><span>Add medical record</span></button>
                                    <button type="#" class="pr-button-medical-record pr-medical-big-text pr-save-new-med-record" onclick="return false;"><span>Save</span></button>
                                </div> 
                            </div>
                        </div>
                    </ul>
                <div id="pr-2col-table-info">
                    <span>Name: <span class="pr-answer">
                        <?php 
                            echo $childInfo['fullname'];
                        ?>
                    </span></span>
                    <span>Date of birth: <span class="pr-answer">
                        <?php 
                            echo $childDOB;
                        ?>
                    </span></span>    
                    <span>Age: <span class="pr-answer">
                        <?php 
                            echo $childAge . ($childAge > 1 ? " years, " : " year, ") . $childAgeMonths . ($childAgeMonths > 1 ? " months" : " month");
                        ?>
                    </span></span>                    
                    <span>Height: <span class="pr-answer">
                        <?php 
                            echo $childInfo['height'] . " cm.";
                        ?>
                    </span></span>                        
                    <span>Favorite food: <span class="pr-answer">
                        <?php 
                            echo $childInfo['fav_food'];
                        ?>
                    </span></span>
                    <span>Gender: <span class="pr-answer">
                        <?php 
                            echo $childInfo['gender'];
                            // if(strcasecmp($childInfo['gender'], "Male") == 0) echo ' ♂'; // strcasecmp - str comparison, no case consideration
                            // else echo ' ♀';
                        ?>
                    </span></span>
                </div>
                <span id="pr-last-info-item">Hobby: 
                    <span class="pr-answer">
                        <?php 
                            echo $childInfo['fav_hobby'];
                        ?>
                    </span>
                </span>
                <button type="#" id="pr-add-more-info-button" onclick="return false;">Add more info</button>
            </div>
        </div>
        <div id="pr-timeline">
            <div id="pr-line"></div>
            <div id="pr-memories">
                <?php
                    foreach ($childMemories as $memory) {
                ?>
                    <div class="<?php echo $memory['important'] != 0 ? "pr-important-memory" : "pr-not-important-memory" ?> pr-memory">
                        <div id="pr-old-style">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="pr-memory-content">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($memory['content']);?>"/>
                            <span>
                                <?php
                                    echo $memory['media_description'];
                                ?>
                            </span>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <div id="pr-child-buttons">
            <div id="pr-add-memory">
                <div id="pr-add-memory-form">
                    <div id="pr-sent-animation"></div>
                    <p>Create memory:</p>
                    <!-- <div> id="pr-add-memory-form-container" -->
                    <form method="post" id="pr-memory-form" action="#"> <!-- action="./controllers/addNewMemory.php" -->
                        <div id="pr-add-memory-form-container">
                            <div id="pr-add-memory-photo">
                                <input type="file" name="photo" id="pr-add-memory-input">
                            </div>
                            <textarea name="description" id="pr-add-memory-description" maxlengtd="340" placeholder="What's on your mind?"></textarea>
                            <button type="button"></button>
                        </div>
                        <div id="pr-save-button-container">
                            <button type="submit" id="pr-add-memory-save-button">SAVE</button> <!-- onclick="return false;" -->
                            <div id="pr-save-button-extension">!</div>
                        </div>
                    </form>
                    <!-- </div> -->
                </div>
                <button type="#" id="pr-add-memory-button" onclick="return false;">Add memory</button>
            </div>
            <div id="pr-calendar-sh-fh">
                <button type="#" id="pr-see-calendar" onclick="return false;">Calendar</button>
                <div id="pr-schedules">
                    <div id="pr-schedule-delimeter">
                        <div id="pr-bottom-border1"></div>
                        <button type="#" id="pr-open-feeding-schedule" class="pr-schedule-type-buttons">Feeding schedule</button>
                        <div id="pr-bottom-border2"></div>
                        <button type="#" id="pr-open-sleeping-schedule" class="pr-schedule-type-buttons">Sleeping schedule</button>
                        <div id="pr-bottom-border3"></div>
                    </div>
                    <div id="pr-feeding-schedule" class="pr-schedule">
                        <div class="pr-schedule-4">
                            <div id="pr-sunday" class="pr-weekday">
                                <div class="pr-weekday-title">
                                    <span class="pr-weekday-span">Sunday</span>
                                    <button type="#" class="pr-add-new-record-button"></button>
                                </div>
                                <div class="pr-schedule-records">
                                    <?php 
                                    foreach ($feedingRecordsSunday as $record) { ?>
                                        <div class="pr-schedule-record">
                                            <span><?php echo substr($record['record_time'], 0, 5);?></span>
                                            <span><?php echo $record['rec_description'];?></span>
                                            <button type="button" class="pr-record-delete-button" onclick="deleteFeedingRecord('sunday', <?php echo $record['id'];?>)"></button>
                                        </div>
                                    <?php 
                                    }?>
                                </div>
                                <form class="pr-new-record" method="post" action="#"> <!-- action="./controllers/records/feedingRecordSunday.php" -->
                                    <input type="time" class="pr-new-record-time" name="record-time">
                                    <input type="text" class="pr-new-record-text" name="record-text" placeholder="&#127860;">
                                    <button type="submit" class="pr-submit-new-record"></button>
                                    <button type="button" class="pr-hide-schedule-record-input" onclick="removeNewFeedingRecordInput('sunday')"></button>
                                </form>
                            </div>
                            <div id="pr-monday" class="pr-weekday">
                                <div class="pr-weekday-title">
                                    <span class="pr-weekday-span">Monday</span>
                                    <button type="#" class="pr-add-new-record-button"></button>
                                </div>
                                <div class="pr-schedule-records">
                                    <?php 
                                    foreach ($feedingRecordsMonday as $record) { ?>
                                        <div class="pr-schedule-record">
                                            <span><?php echo substr($record['record_time'], 0, 5);?></span>
                                            <span><?php echo $record['rec_description'];?></span>
                                            <button type="button" class="pr-record-delete-button" onclick="deleteFeedingRecord('monday', <?php echo $record['id'];?>)"></button>
                                        </div>
                                    <?php 
                                    }?>
                                </div>
                                <form class="pr-new-record" method="post" action="#">
                                    <input type="time" class="pr-new-record-time" name="record-time">
                                    <input type="text" class="pr-new-record-text" name="record-text" placeholder="&#127860;">
                                    <button type="submit" class="pr-submit-new-record"></button>
                                    <button type="button" class="pr-hide-schedule-record-input" onclick="removeNewFeedingRecordInput('monday')"></button>
                                </form>
                            </div>
                            <div id="pr-tuesday" class="pr-weekday">
                                <div class="pr-weekday-title">
                                    <span class="pr-weekday-span">Tuesday</span>
                                    <button type="#" class="pr-add-new-record-button"></button>
                                </div>
                                <div class="pr-schedule-records">
                                    <?php 
                                    foreach ($feedingRecordsTuesday as $record) { ?>
                                        <div class="pr-schedule-record">
                                            <span><?php echo substr($record['record_time'], 0, 5);?></span>
                                            <span><?php echo $record['rec_description'];?></span>
                                            <button type="button" class="pr-record-delete-button" onclick="deleteFeedingRecord('tuesday', <?php echo $record['id'];?>)"></button>
                                        </div>
                                    <?php 
                                    }?>
                                </div>
                                <form class="pr-new-record" method="post" action="#">
                                    <input type="time" class="pr-new-record-time" name="record-time">
                                    <input type="text" class="pr-new-record-text" name="record-text" placeholder="&#127860;">
                                    <button type="submit" class="pr-submit-new-record"></button>
                                    <button type="button" class="pr-hide-schedule-record-input" onclick="removeNewFeedingRecordInput('tuesday')"></button>
                                </form>
                            </div>
                            <div id="pr-wednesday" class="pr-weekday">
                                <div class="pr-weekday-title">
                                    <span class="pr-weekday-span">Wednesday</span>
                                    <button type="#" class="pr-add-new-record-button"></button>
                                </div>
                                <div class="pr-schedule-records">
                                    <?php 
                                    foreach ($feedingRecordsWednesday as $record) { ?>
                                        <div class="pr-schedule-record">
                                            <span><?php echo substr($record['record_time'], 0, 5);?></span>
                                            <span><?php echo $record['rec_description'];?></span>
                                            <button type="button" class="pr-record-delete-button" onclick="deleteFeedingRecord('wednesday', <?php echo $record['id'];?>)"></button>
                                        </div>
                                    <?php 
                                    }?>
                                </div>
                                <form class="pr-new-record" method="post" action="#">
                                    <input type="time" class="pr-new-record-time" name="record-time">
                                    <input type="text" class="pr-new-record-text" name="record-text" placeholder="&#127860;">
                                    <button type="submit" class="pr-submit-new-record"></button>
                                    <button type="button" class="pr-hide-schedule-record-input" onclick="removeNewFeedingRecordInput('wednesday')"></button>
                                </form>
                            </div>      
                        </div>  
                        <div class="pr-schedule-3">         
                            <div id="pr-thursday" class="pr-weekday">
                                <div class="pr-weekday-title">
                                    <span class="pr-weekday-span">Thursday</span>
                                    <button type="#" class="pr-add-new-record-button"></button>
                                </div>
                                <div class="pr-schedule-records">
                                    <?php 
                                    foreach ($feedingRecordsThursday as $record) { ?>
                                        <div class="pr-schedule-record">
                                            <span><?php echo substr($record['record_time'], 0, 5);?></span>
                                            <span><?php echo $record['rec_description'];?></span>
                                            <button type="button" class="pr-record-delete-button" onclick="deleteFeedingRecord('thursday', <?php echo $record['id'];?>)"></button>
                                        </div>
                                    <?php 
                                    }?>
                                </div>
                                <form class="pr-new-record" method="post" action="#">
                                    <input type="time" class="pr-new-record-time" name="record-time">
                                    <input type="text" class="pr-new-record-text" name="record-text" placeholder="&#127860;">
                                    <button type="submit" class="pr-submit-new-record"></button>
                                    <button type="button" class="pr-hide-schedule-record-input" onclick="removeNewFeedingRecordInput('thursday')"></button>
                                </form>
                            </div>
                            <div id="pr-friday" class="pr-weekday">
                                <div class="pr-weekday-title">
                                    <span class="pr-weekday-span">Friday</span>
                                    <button type="#" class="pr-add-new-record-button"></button>
                                </div>
                                <div class="pr-schedule-records">
                                    <?php 
                                    foreach ($feedingRecordsFriday as $record) { ?>
                                        <div class="pr-schedule-record">
                                            <span><?php echo substr($record['record_time'], 0, 5);?></span>
                                            <span><?php echo $record['rec_description'];?></span>
                                            <button type="button" class="pr-record-delete-button" onclick="deleteFeedingRecord('friday', <?php echo $record['id'];?>)"></button>
                                        </div>
                                    <?php 
                                    }?>
                                </div>
                                <form class="pr-new-record" method="post" action="#">
                                    <input type="time" class="pr-new-record-time" name="record-time">
                                    <input type="text" class="pr-new-record-text" name="record-text" placeholder="&#127860;">
                                    <button type="submit" class="pr-submit-new-record"></button>
                                    <button type="button" class="pr-hide-schedule-record-input" onclick="removeNewFeedingRecordInput('friday')"></button>
                                </form>
                            </div>
                            <div id="pr-saturday" class="pr-weekday">
                                <div class="pr-weekday-title">
                                    <span class="pr-weekday-span">Saturday</span>
                                    <button type="#" class="pr-add-new-record-button"></button>
                                </div>
                                <div class="pr-schedule-records">
                                    <?php 
                                    foreach ($feedingRecordsSaturday as $record) { ?>
                                        <div class="pr-schedule-record">
                                            <span><?php echo substr($record['record_time'], 0, 5);?></span>
                                            <span><?php echo $record['rec_description'];?></span>
                                            <button type="button" class="pr-record-delete-button" onclick="deleteFeedingRecord('saturday', <?php echo $record['id'];?>)"></button>
                                        </div>
                                    <?php 
                                    }?>
                                </div>
                                <form class="pr-new-record" method="post" action="#">
                                    <input type="time" class="pr-new-record-time" name="record-time">
                                    <input type="text" class="pr-new-record-text" name="record-text" placeholder="&#127860;">
                                    <button type="submit" class="pr-submit-new-record"></button>
                                    <button type="button" class="pr-hide-schedule-record-input" onclick="removeNewFeedingRecordInput('saturday')"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="pr-sleeping-schedule" class="pr-schedule">
                        <div class="pr-schedule-4">
                            <div id="pr-sunday" class="pr-weekday">
                                <div class="pr-weekday-title">
                                    <span class="pr-weekday-span">Sunday</span>
                                    <button type="#" class="pr-add-new-record-button"></button>
                                </div>
                                <div class="pr-schedule-records">
                                    <?php 
                                    foreach ($sleepingRecordsSunday as $record) { ?>
                                        <div class="pr-schedule-record">
                                            <span><?php echo substr($record['start_time'], 0, 5);?></span>
                                            <span>-</span>
                                            <span><?php echo substr($record['end_time'], 0, 5);?></span>
                                            <span><?php echo $record['rec_description'];?></span>
                                            <button type="button" class="pr-record-delete-button" onclick="deleteSleepingRecord('sunday', <?php echo $record['id'];?>)"></button>
                                        </div>
                                    <?php 
                                    }?>
                                </div>
                                <form class="pr-new-record" method="post" action="#"> <!-- action="./controllers/records/feedingRecordSunday.php" -->
                                    <input type="time" class="pr-new-record-time" name="start-time"><span>-</span>
                                    <input type="time" class="pr-new-record-time" name="end-time">
                                    <input type="text" class="pr-new-record-text" name="record-text" placeholder="...">
                                    <button type="submit" class="pr-submit-new-record"></button>
                                    <button type="button" class="pr-hide-schedule-record-input" onclick="removeNewSleepingRecordInput('sunday')"></button>
                                </form>
                            </div>
                            <div id="pr-monday" class="pr-weekday">
                                <div class="pr-weekday-title">
                                    <span class="pr-weekday-span">Monday</span>
                                    <button type="#" class="pr-add-new-record-button"></button>
                                </div>
                                <div class="pr-schedule-records">
                                    <?php 
                                    foreach ($sleepingRecordsMonday as $record) { ?>
                                        <div class="pr-schedule-record">
                                            <span><?php echo substr($record['start_time'], 0, 5);?></span>
                                            <span>-</span>
                                            <span><?php echo substr($record['end_time'], 0, 5);?></span>
                                            <span><?php echo $record['rec_description'];?></span>
                                            <button type="button" class="pr-record-delete-button" onclick="deleteSleepingRecord('monday', <?php echo $record['id'];?>)"></button>
                                        </div>
                                    <?php 
                                    }?>
                                </div>
                                <form class="pr-new-record" method="post" action="#">
                                    <input type="time" class="pr-new-record-time" name="start-time"><span>-</span>
                                    <input type="time" class="pr-new-record-time" name="end-time">
                                    <input type="text" class="pr-new-record-text" name="record-text" placeholder="...">
                                    <button type="submit" class="pr-submit-new-record"></button>
                                    <button type="button" class="pr-hide-schedule-record-input" onclick="removeNewSleepingRecordInput('monday')"></button>
                                </form>
                            </div>
                            <div id="pr-tuesday" class="pr-weekday">
                                <div class="pr-weekday-title">
                                    <span class="pr-weekday-span">Tuesday</span>
                                    <button type="#" class="pr-add-new-record-button"></button>
                                </div>
                                <div class="pr-schedule-records">
                                    <?php 
                                    foreach ($sleepingRecordsTuesday as $record) { ?>
                                        <div class="pr-schedule-record">
                                            <span><?php echo substr($record['start_time'], 0, 5);?></span>
                                            <span>-</span>
                                            <span><?php echo substr($record['end_time'], 0, 5);?></span>
                                            <span><?php echo $record['rec_description'];?></span>
                                            <button type="button" class="pr-record-delete-button" onclick="deleteSleepingRecord('tuesday', <?php echo $record['id'];?>)"></button>
                                        </div>
                                    <?php 
                                    }?>
                                </div>
                                <form class="pr-new-record" method="post" action="#">
                                    <input type="time" class="pr-new-record-time" name="start-time"><span>-</span>
                                    <input type="time" class="pr-new-record-time" name="end-time">
                                    <input type="text" class="pr-new-record-text" name="record-text" placeholder="...">
                                    <button type="submit" class="pr-submit-new-record"></button>
                                    <button type="button" class="pr-hide-schedule-record-input" onclick="removeNewSleepingRecordInput('tuesday')"></button>
                                </form>
                            </div>
                            <div id="pr-wednesday" class="pr-weekday">
                                <div class="pr-weekday-title">
                                    <span class="pr-weekday-span">Wednesday</span>
                                    <button type="#" class="pr-add-new-record-button"></button>
                                </div>
                                <div class="pr-schedule-records">
                                    <?php 
                                    foreach ($sleepingRecordsWednesday as $record) { ?>
                                        <div class="pr-schedule-record">
                                            <span><?php echo substr($record['start_time'], 0, 5);?></span>
                                            <span>-</span>
                                            <span><?php echo substr($record['end_time'], 0, 5);?></span>
                                            <span><?php echo $record['rec_description'];?></span>
                                            <button type="button" class="pr-record-delete-button" onclick="deleteSleepingRecord('wednesday', <?php echo $record['id'];?>)"></button>
                                        </div>
                                    <?php 
                                    }?>
                                </div>
                                <form class="pr-new-record" method="post" action="#">
                                    <input type="time" class="pr-new-record-time" name="start-time"><span>-</span>
                                    <input type="time" class="pr-new-record-time" name="end-time">
                                    <input type="text" class="pr-new-record-text" name="record-text" placeholder="...">
                                    <button type="submit" class="pr-submit-new-record"></button>
                                    <button type="button" class="pr-hide-schedule-record-input" onclick="removeNewSleepingRecordInput('wednesday')"></button>
                                </form>
                            </div>      
                        </div>  
                        <div class="pr-schedule-3">         
                            <div id="pr-thursday" class="pr-weekday">
                                <div class="pr-weekday-title">
                                    <span class="pr-weekday-span">Thursday</span>
                                    <button type="#" class="pr-add-new-record-button"></button>
                                </div>
                                <div class="pr-schedule-records">
                                    <?php 
                                    foreach ($sleepingRecordsThursday as $record) { ?>
                                        <div class="pr-schedule-record">
                                            <span><?php echo substr($record['start_time'], 0, 5);?></span>
                                            <span>-</span>
                                            <span><?php echo substr($record['end_time'], 0, 5);?></span>
                                            <span><?php echo $record['rec_description'];?></span>
                                            <button type="button" class="pr-record-delete-button" onclick="deleteSleepingRecord('thursday', <?php echo $record['id'];?>)"></button>
                                        </div>
                                    <?php 
                                    }?>
                                </div>
                                <form class="pr-new-record" method="post" action="#">
                                    <input type="time" class="pr-new-record-time" name="start-time"><span>-</span>
                                    <input type="time" class="pr-new-record-time" name="end-time">
                                    <input type="text" class="pr-new-record-text" name="record-text" placeholder="...">
                                    <button type="submit" class="pr-submit-new-record"></button>
                                    <button type="button" class="pr-hide-schedule-record-input" onclick="removeNewSleepingRecordInput('thursday')"></button>
                                </form>
                            </div>
                            <div id="pr-friday" class="pr-weekday">
                                <div class="pr-weekday-title">
                                    <span class="pr-weekday-span">Friday</span>
                                    <button type="#" class="pr-add-new-record-button"></button>
                                </div>
                                <div class="pr-schedule-records">
                                    <?php 
                                    foreach ($sleepingRecordsFriday as $record) { ?>
                                        <div class="pr-schedule-record">
                                            <span><?php echo substr($record['start_time'], 0, 5);?></span>
                                            <span>-</span>
                                            <span><?php echo substr($record['end_time'], 0, 5);?></span>
                                            <span><?php echo $record['rec_description'];?></span>
                                            <button type="button" class="pr-record-delete-button" onclick="deleteSleepingRecord('friday', <?php echo $record['id'];?>)"></button>
                                        </div>
                                    <?php 
                                    }?>
                                </div>
                                <form class="pr-new-record" method="post" action="#">
                                    <input type="time" class="pr-new-record-time" name="start-time"><span>-</span>
                                    <input type="time" class="pr-new-record-time" name="end-time">
                                    <input type="text" class="pr-new-record-text" name="record-text" placeholder="...">
                                    <button type="submit" class="pr-submit-new-record"></button>
                                    <button type="button" class="pr-hide-schedule-record-input" onclick="removeNewSleepingRecordInput('friday')"></button>
                                </form>
                            </div>
                            <div id="pr-saturday" class="pr-weekday">
                                <div class="pr-weekday-title">
                                    <span class="pr-weekday-span">Saturday</span>
                                    <button type="#" class="pr-add-new-record-button"></button>
                                </div>
                                <div class="pr-schedule-records">
                                    <?php 
                                    foreach ($sleepingRecordsSaturday as $record) { ?>
                                        <div class="pr-schedule-record">
                                            <span><?php echo substr($record['start_time'], 0, 5);?></span>
                                            <span>-</span>
                                            <span><?php echo substr($record['end_time'], 0, 5);?></span>
                                            <span><?php echo $record['rec_description'];?></span>
                                            <button type="button" class="pr-record-delete-button" onclick="deleteSleepingRecord('saturday', <?php echo $record['id'];?>)"></button>
                                        </div>
                                    <?php 
                                    }?>
                                </div>
                                <form class="pr-new-record" method="post" action="#">
                                    <input type="time" class="pr-new-record-time" name="start-time"><span>-</span>
                                    <input type="time" class="pr-new-record-time" name="end-time">
                                    <input type="text" class="pr-new-record-text" name="record-text" placeholder="...">
                                    <button type="submit" class="pr-submit-new-record"></button>
                                    <button type="button" class="pr-hide-schedule-record-input" onclick="removeNewSleepingRecordInput('saturday')"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="pr-close-2col-form">
            <img src="../CHiM/views/public_view/page-images/close_icon.png"/>
        </div>
    </div>
    <!-- <div id="pr-child-panel-opener"></div> -->
    <div id="pr-child-panel">
        <?php foreach ($userChildrenList as $child) { ?>
            <a onclick="setSessionChildId(<?php echo $_SESSION['user_id']; ?>, <?php echo $child['id'];?>)">
                <div class="pr-child-container">
                    <img id="pr-child-img-container<?php echo $child['id'];?>" src="data:image/jpeg;base64,<?php echo $child['photo'] != null ? base64_encode($child['photo']) : base64_encode(file_get_contents('../CHiM/views/public_view/page-images/no-user-icon.png'));?>">
                    <span id="pr-child-span<?php echo $child['id'];?>"><?php echo $child['fullname'];?></span>   
                </div>
            </a>
        <?php } ?>
        <button id="pr-p-container">+</button>
    </div>
</div>

<script src="../CHiM/views/public_view/js/profile.js"></script>
<script src="../CHiM/models/profileModel.js"></script>