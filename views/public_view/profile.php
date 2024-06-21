<?php
require_once '../CHiM/views/includes/header.php';
?>
<?php
require_once dirname(__DIR__,2) . '/views/includes/footer.php';
?>

<body>
    <div id="pr-frame">
        <div id="pr-child-info">
            <div id="pr-first-row">
                <div id="pr-child-photo-container">
                    <img id="pr-child-image" src=""/>
                    <input type="file" id="pr-photo" onchange="changeChildImage()"></input>
                </div>
                <div id="pr-child-info">
                    <form action="#" metdod="post" id="pr-child-data-form">
                        <ul id="pr-2col-table">
                            <li>
                                <label for="Name">Full name:</label>
                                <input requred type="text" 
                                        pattern="^[a-z0-9A-Z._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$"
                                        class="pr-child-info-input" 
                                        name="name" 
                                        placeholder="Name" />
                            </li>
                            <li>
                                <label for="date-of-birtd">Date of birtd:</label>
                                <input requred type="date" 
                                        class="pr-child-info-input" 
                                        name="date-of-birtd" 
                                        placeholder="Date of birth" />
                            </li>
                            <li>
                                <label for="gender">Gender:</label>
                                <input type="radio" id="male" name="gender" value="male">
                                <label for="male">Boy</label>
                                <input type="radio" id="female" name="gender" value="female">
                                <label for="female">Girl</label>
                            </li>
                            <li>
                                <label for="height">Height:</label>
                                <input requred type="text" 
                                        class="pr-child-info-input" 
                                        name="height" 
                                        placeholder="Height" />
                            </li>
                            <li>
                                <label for="hobby">Favorite hobby:</label>
                                <input requred type="text" 
                                        pattern="^[a-z0-9A-Z._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$"
                                        class="pr-child-info-input" 
                                        name="hobby" 
                                        placeholder="Hobby" />
                            </li>
                            <li>
                                <label for="food">Favorite food:</label>
                                <input requred type="text" 
                                        pattern="^[a-z0-9A-Z._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$"
                                        class="pr-child-info-input" 
                                        name="food" 
                                        placeholder="Food" />
                            </li>
                            <button type="#" id="pr-medical-history-button" onclick="return false;">Medical history</button>
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
                                                        pattern="^[a-z0-9A-Z._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$"
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
                                                        pattern="^[a-z0-9A-Z._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$"
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
                                                        pattern="^[a-z0-9A-Z._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$"
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
                                                            pattern="^[a-z0-9A-Z._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$"
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
                                                        pattern="^[a-z0-9A-Z._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$"
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
                                                        pattern="^[a-z0-9A-Z._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$"
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
                                                        pattern="^[a-z0-9A-Z._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$"
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
                    </form>

                    <div id="pr-2col-table-info">
                        <span>Name: <span class="pr-answer">Ilie</span></span>
                        <span>Age: <span class="pr-answer">3</span></span>
                        <span>Date of birth: <span class="pr-answer">01.11.2020</span></span>
                        <span>Zodiac sign: <span class="pr-answer">Libra</span></span>
                        <span>Favorite food: <span class="pr-answer">Apples</span></span>
                        <span>Favorite game: <span class="pr-answer">Hide and seek</span></span>
                    </div>
                    <span id="pr-last-info-item">Greatest fear: <span class="pr-answer">Heights</span></span>
                    <button type="#" id="pr-add-more-info-button" onclick="return false;">Add more info</button>

                </div>
            </div>
            <div id="pr-timeline">
                <div id="pr-line"></div>
                <div id="pr-memories">
                    <!-- Examples: -->
                    <div class="pr-memory">
                        <div id="pr-old-style">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="pr-memory-content">
                            <img src="https://cdn.mos.cms.futurecdn.net/2ydo2sRBZWBcZx54A87MVK.jpg"/>
                            <span>Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text</span>
                        </div>
                    </div>
                    <div class="pr-memory">
                        <div id="pr-old-style">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="pr-memory-content">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRG58ui_kgwS6vNxOR39igfNvkFNlRKqdTq0qnHpCFJ0g&s"/>
                            <span>Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text</span>
                        </div>
                    </div>
                    <div class="pr-memory">
                        <div id="pr-old-style">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="pr-memory-content">
                            <img src="https://welldoing.org/storage/app/uploads/public/589/369/f0b/589369f0b5b61839200792.jpg"/>
                            <span>Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text</span>
                        </div>
                    </div>
                    <div class="pr-memory">
                        <div id="pr-old-style">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="pr-memory-content">
                            <img src="https://media.npr.org/assets/img/2014/05/22/rebeccawoolf_custom-c4cccfacd8d93166f0b5050a6f42821401944d0a.jpg"/>
                            <span>Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text</span>
                        </div>
                    </div>
                    <div class="pr-memory">
                        <div id="pr-old-style">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="pr-memory-content">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRG58ui_kgwS6vNxOR39igfNvkFNlRKqdTq0qnHpCFJ0g&s"/>
                            <span>Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text</span>
                        </div>
                    </div>
                    <div class="pr-memory">
                        <div id="pr-old-style">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="pr-memory-content">
                            <img src="https://welldoing.org/storage/app/uploads/public/589/369/f0b/589369f0b5b61839200792.jpg"/>
                            <span>Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text</span>
                        </div>
                    </div>
                    <div class="pr-memory">
                        <div id="pr-old-style">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="pr-memory-content">
                            <img src="https://cdn.mos.cms.futurecdn.net/2ydo2sRBZWBcZx54A87MVK.jpg"/>
                            <span>Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text</span>
                        </div>
                    </div>
                    <div class="pr-memory">
                        <div id="pr-old-style">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="pr-memory-content">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRG58ui_kgwS6vNxOR39igfNvkFNlRKqdTq0qnHpCFJ0g&s"/>
                            <span>Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text</span>
                        </div>
                    </div>
                    <div class="pr-memory">
                        <div id="pr-old-style">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="pr-memory-content">
                            <img src="https://media.npr.org/assets/img/2014/05/22/rebeccawoolf_custom-c4cccfacd8d93166f0b5050a6f42821401944d0a.jpg"/>
                            <span>Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text</span>
                        </div>
                    </div>
                    <div class="pr-memory">
                        <div id="pr-old-style">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="pr-memory-content">
                            <img src="https://cdn.mos.cms.futurecdn.net/2ydo2sRBZWBcZx54A87MVK.jpg"/>
                            <span>Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text</span>
                        </div>
                    </div>
                    <div class="pr-memory">
                        <div id="pr-old-style">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="pr-memory-content">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRG58ui_kgwS6vNxOR39igfNvkFNlRKqdTq0qnHpCFJ0g&s"/>
                            <span>Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text</span>
                        </div>
                    </div>
                    <div class="pr-memory">
                        <div id="pr-old-style">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="pr-memory-content">
                            <img src="https://cdn.mos.cms.futurecdn.net/2ydo2sRBZWBcZx54A87MVK.jpg"/>
                            <span>Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text</span>
                        </div>
                    </div>
                    <div class="pr-memory">
                        <div id="pr-old-style">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="pr-memory-content">
                            <img src="https://welldoing.org/storage/app/uploads/public/589/369/f0b/589369f0b5b61839200792.jpg"/>
                            <span>Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text</span>
                        </div>
                    </div>
                    <div class="pr-memory">
                        <div id="pr-old-style">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="pr-memory-content">
                            <img src="https://cdn.mos.cms.futurecdn.net/2ydo2sRBZWBcZx54A87MVK.jpg"/>
                            <span>Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text</span>
                        </div>
                    </div>
                    <div class="pr-memory">
                        <div id="pr-old-style">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="pr-memory-content">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRG58ui_kgwS6vNxOR39igfNvkFNlRKqdTq0qnHpCFJ0g&s"/>
                            <span>Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text</span>
                        </div>
                    </div>
                    <div class="pr-memory">
                        <div id="pr-old-style">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="pr-memory-content">
                            <img src="https://cdn.mos.cms.futurecdn.net/2ydo2sRBZWBcZx54A87MVK.jpg"/>
                            <span>Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text</span>
                        </div>
                    </div>
                    <div class="pr-memory">
                        <div id="pr-old-style">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="pr-memory-content">
                            <img src="https://welldoing.org/storage/app/uploads/public/589/369/f0b/589369f0b5b61839200792.jpg"/>
                            <span>Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text Some Text</span>
                        </div>
                    </div>
                </div>
                <!-- <div id="pr-arrow"></div> -->
            </div>
            <div id="pr-child-buttons">
                <div id="pr-add-memory">
                    <div id="pr-add-memory-form">
                        <div id="pr-sent-animation"></div>
                        <p>Create memory:</p>
                        <div id="pr-add-memory-form-container">
                            <div id="pr-add-memory-photo">
                                <input type="file">
                            </div>
                            <textarea name="description" id="pr-add-memory-description" maxlengtd="340" placeholder="What's on your mind?"></textarea>
                        </div>
                        <div id="pr-save-button-container">
                            <button type="#" id="pr-add-memory-save-button" onclick="return false;">SAVE</button>
                            <div id="pr-save-button-extension">!</div>
                        </div>
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
            <a href=""><div class="pr-child-container">
                <img src="../CHiM/views/public_view/page-images/user1_profile.jpg">
                <span>Child 1</span>
            </div>
            </a>
            <a href=""><div class="pr-child-container">
                <img src="../CHiM/views/public_view/page-images/user1_profile.jpg">
                <span>Child 2</span>
            </div>
            </a>
            <a href=""><div class="pr-child-container">
                <img src="../CHiM/views/public_view/page-images/user1_profile.jpg">
                <span>Child 3</span>
            </div>
            </a>
            <a href=""><div class="pr-child-container">
                <img src="../CHiM/views/public_view/page-images/user1_profile.jpg">
                <span>Child 4</span>
            </div>
            </a>
            <a href=""><div class="pr-child-container">
                <img src="../CHiM/views/public_view/page-images/user1_profile.jpg">
                <span>Child 5</span>
            </div>
            </a>
            <a href=""><div class="pr-child-container">
                <img src="../CHiM/views/public_view/page-images/user1_profile.jpg">
                <span>Child 6</span>
            </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                    <img src="../CHiM/views/public_view/page-images/user1_profile.jpg">
                    <span>Child 7</span>
                </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                    <img src="../CHiM/views/public_view/page-images/user1_profile.jpg">
                    <span>Child 8</span>
                </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                    <img src="../CHiM/views/public_view/page-images/user1_profile.jpg">
                    <span>Child 9</span>
                </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                    <img src="../CHiM/views/public_view/page-images/user1_profile.jpg">
                    <span>Child 10</span>
                </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                    <img src="../CHiM/views/public_view/page-images/user1_profile.jpg">
                    <span>Child 11</span>
                </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                    <img src="../CHiM/views/public_view/page-images/user1_profile.jpg">
                    <span>Child 12</span>
                </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                    <img src="../CHiM/views/public_view/page-images/user1_profile.jpg">
                    <span>Child 13</span>
                </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                    <img src="../CHiM/views/public_view/page-images/user1_profile.jpg">
                    <span>Child 14</span>
                </div>
            </a>
            <button id="pr-p-container">+</button>
        </div>
    </div>
    <script src="../CHiM/views/public_view/js/profile.js"></script>
</body>