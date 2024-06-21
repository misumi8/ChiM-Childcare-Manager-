<?php
require_once './views/includes/header.php';
require_once dirname(__DIR__,2) . '/views/includes/footer.php';
require_once './controllers/childInfo.php';
//echo "AAAAAAAAAAAAAAAAAAAAAAAAAAAAA" . $childInfo['id'];
//echo "IDIDIDIDIDIDIDIDIDIDID" . $_SESSION['child_id'];
//addChildMemory(1, 8, 0, 0, "awd", "awdj", "0");
?>

<body>
    <div id="pr-frame">
        <div id="pr-child-info">
            <div id="pr-first-row">
                <div id="pr-child-photo-container">
                    <?php
                        echo "<img id='pr-child-image' style='opacity:" . $photoExist . "' src='data:image/jpeg;base64," . $childPic . "'/>";
                    ?>
                    <input type="file" id="pr-photo" onchange="changeChildImage(<?php echo $_SESSION['child_id']; ?>)"></input>
                </div>
                <div id="pr-child-info">
                    <form metdod="post" id="pr-child-data-form"> <!-- action="./controllers/updateChildInfo.php"-->
                        <ul id="pr-2col-table">
                            <li>
                                <label for="Name">Full name:</label>
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
                                            <tr class="row">
                                                <td><textarea class="pr-table-cell">Chris</textarea></td>
                                                <td>
                                                    <textarea class="pr-table-cell">HTML tables</textarea>
                                                    <input requred type="date" 
                                                        class="pr-medical-record-date" 
                                                        name="medical-record-date" 
                                                        placeholder="Date of record"
                                                        value="11.01.2001"/>  
                                                </td>
                                                <td><textarea class="pr-table-cell">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                </textarea></td>                                            </tr>
                                            <tr class="row">
                                                <td><textarea class="pr-table-cell" >Dennis</textarea></td>
                                                <td>
                                                    <textarea class="pr-table-cell">Web accessibility</textarea>
                                                    <input requred type="date" 
                                                        class="pr-medical-record-date" 
                                                        name="medical-record-date" 
                                                        placeholder="Date of record"
                                                        value="11.01.2001"/>   
                                                </td>
                                                <td><textarea class="pr-table-cell">45</textarea></td>
                                            </tr>
                                            <tr class="row">
                                                <td><textarea class="pr-table-cell">Sarah</textarea></td>
                                                <td>
                                                    <textarea class="pr-table-cell">JavaScript frameworks</textarea>
                                                    <input requred type="date" 
                                                        class="pr-medical-record-date" 
                                                        name="medical-record-date" 
                                                        placeholder="Date of record"
                                                        value="11.01.2001"/>  
                                                </td>
                                                <td><textarea class="pr-table-cell">29</textarea></td>
                                            </tr>
                                            <tr class="row">
                                                <td><textarea class="pr-table-cell">Karen</textarea></td>
                                                <td>
                                                    <textarea class="pr-table-cell">Web performance</textarea>
                                                    <input requred type="date" 
                                                            class="pr-medical-record-date" 
                                                            name="medical-record-date" 
                                                            placeholder="Date of record"
                                                            value="11.01.2001"/>  
                                                </td>
                                                <td><textarea class="pr-table-cell">36</textarea></td>
                                            </tr>
                                            <tr class="row">
                                                <td><textarea class="pr-table-cell">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                </textarea></td>
                                                <td>
                                                    <textarea class="pr-table-cell">HTML tables</textarea>
                                                    <input requred type="date" 
                                                        class="pr-medical-record-date" 
                                                        name="medical-record-date" 
                                                        placeholder="Date of record"
                                                        value="11.01.2001"/>  
                                                </td>
                                                <td><textarea class="pr-table-cell">22</textarea></td>
                                            </tr>
                                            <tr class="row">
                                                <td><textarea class="pr-table-cell">Dennis</textarea></td>
                                                <td>
                                                    <textarea class="pr-table-cell">Web accessibility</textarea>
                                                    <input requred type="date" 
                                                        class="pr-medical-record-date" 
                                                        name="medical-record-date" 
                                                        placeholder="Date of record"
                                                        value="11.01.2001"/>  
                                                </td>
                                                <td><textarea class="pr-table-cell">45</textarea></td>
                                            </tr>
                                            <tr class="row">
                                                <td><textarea class="pr-table-cell">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                </textarea></td>
                                                <td>
                                                    <textarea class="pr-table-cell">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                    </textarea>
                                                    <input requred type="date" 
                                                        class="pr-medical-record-date" 
                                                        name="medical-record-date" 
                                                        placeholder="Date of record"
                                                        value="11.01.2001"/>  
                                                </td>
                                                <td><textarea class="pr-table-cell">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                </textarea></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div id="pr-buttons-medical-history">
                                        <button type="#" class="pr-button-medical-record" onclick="return false;"><span>Add medical record</span></button>
                                        <button type="#" class="pr-button-medical-record pr-medical-big-text" onclick="return false;"><span>Save</span></button>
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
                    <div id="pr-calendar-list">
                        <div class="pr-list-item">
                            <input type="date" disabled>
                            <span class="pr-item-context">Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text </span>
                        </div>
                        <div class="pr-list-item">
                            <input type="date" disabled>
                            <span class="pr-item-context">Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text </span>
                        </div>
                        <div class="pr-list-item">
                            <input type="date" disabled>
                            <span class="pr-item-context">Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text </span>
                        </div>
                        <div class="pr-list-item">
                            <input type="date" disabled>
                            <span class="pr-item-context">Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text </span>
                        </div>
                        <div class="pr-list-item">
                            <input type="date" disabled>
                            <span class="pr-item-context">Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text </span>
                        </div>
                        <div class="pr-list-item">
                            <input type="date" disabled>
                            <span class="pr-item-context">Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text </span>
                        </div>
                        <div class="pr-list-item">
                            <input type="date" disabled>
                            <span class="pr-item-context">Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text </span>
                        </div>
                        <div class="pr-list-item">
                            <input type="date" disabled>
                            <span class="pr-item-context">Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text </span>
                        </div>
                        <div class="pr-list-item">
                            <input type="date" disabled>
                            <span class="pr-item-context">Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text </span>
                        </div>
                        <div class="pr-list-item">
                            <input type="date" disabled>
                            <span class="pr-item-context">Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text </span>
                        </div>
                        <div class="pr-list-item">
                            <input type="date" disabled>
                            <span class="pr-item-context">Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text </span>
                        </div>
                        <div class="pr-list-item">
                            <input type="date" disabled>
                            <span class="pr-item-context">Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text </span>
                        </div>
                        <div class="pr-list-item">
                            <input type="date" disabled>
                            <span class="pr-item-context">Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text </span>
                        </div>
                        <div class="pr-list-item">
                            <input type="date" disabled>
                            <span class="pr-item-context">Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text Some text </span>
                        </div>
                        <div id="pr-calendar-buttons">
                            <button type="#" class="pr-button-medical-record pr-calendar-button" onclick="return false;"><span>New</span></button>
                            <button type="#" class="pr-button-medical-record pr-calendar-button" onclick="return false;"><span>Save</span></button>
                            <button type="#" class="pr-export-pdf" onclick="return false;"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="pr-close-2col-form">
                <img src="../CHiM/views/public_view/page-images/close_icon.png"/>
            </div>
        </div>

        <!-- <div id="pr-child-panel-opener"></div> -->
        <div class="pr-child-panel">
            <?php foreach ($userChildrenList as $child) { ?>
            <a onclick="setSessionChildId(<?php echo $_SESSION['user_id']; ?>, <?php echo $child['id'];?>)">
                <div class="pr-child-container">
                    <img id="pr-child-img-container<?php echo $child['id'];?>" src="data:image/jpeg;base64,<?php echo base64_encode($child['photo']);?>">
                    <span><?php echo $child['fullname'];?></span>   
                </div>
            </a>
            <?php } ?>
            <button id="pr-p-container">+</button>
        </div>
    </div>
    <script src="../CHiM/views/public_view/js/profile.js"></script>
    <script src="../CHiM/models/profileModel.js"></script>
</body>