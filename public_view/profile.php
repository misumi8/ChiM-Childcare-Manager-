<body>
    <script src="../public_view/js/profile.js"></script>
    <div id="pr-frame">
        <div id="pr-child-info">
            <div id="pr-first-row">
                <div id="pr-photo">
                    <img src="../public_view/page-images/pr-photo.jpg"/>
                </div>
                <div id="pr-child-info">
                    <form action="#" method="post" id="pr-child-data-form">
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
                                <label for="date-of-birth">Date of birth:</label>
                                <input requred type="date" 
                                        pattern="^[a-z0-9A-Z._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$"
                                        class="pr-child-info-input" 
                                        name="date-of-birth" 
                                        placeholder="Date of birth" />
                            </li>
                            <li class="pr-gender-input">
                                <label for="gender">Gender:</label>
                                <input type="radio" id="male" name="gender" value="male">
                                <label for="male">Boy</label>
                                <input type="radio" id="female" name="gender" value="female">
                                <label for="female">Girl</label>
                            </li>
                            <li>
                                <label for="height">Height:</label>
                                <input requred type="text" 
                                        pattern="^[a-z0-9A-Z._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$"
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
                <div id="pr-arrow"></div>
            </div>
            <div id="pr-child-buttons">
                <div id="pr-add-memory">
                    <button type="#" id="pr-add-memory-button" onclick="return false;">Add memory</button>
                </div>
                <div id="pr-calendar-sh-fh">
                    <button type="#" id="pr-see-calendar" onclick="return false;">Calendar</button>
                </div>
            </div>
            <div id="pr-close-2col-form">
                <img src="../public_view/page-images/close_icon.png"/>
            </div>
        </div>

        <div class="pr-child-panel">
            <a href=""><div class="pr-child-container">
                <img src="../public_view/page-images/user1_profile.jpg">
                <span>Child 1</span>
            </div>
            </a>
            <a href=""><div class="pr-child-container">
                <img src="../public_view/page-images/user1_profile.jpg">
                <span>Child 2</span>
            </div>
            </a>
            <a href=""><div class="pr-child-container">
                <img src="../public_view/page-images/user1_profile.jpg">
                <span>Child 3</span>
            </div>
            </a>
            <a href=""><div class="pr-child-container">
                <img src="../public_view/page-images/user1_profile.jpg">
                <span>Child 4</span>
            </div>
            </a>
            <a href=""><div class="pr-child-container">
                <img src="../public_view/page-images/user1_profile.jpg">
                <span>Child 5</span>
            </div>
            </a>
            <a href=""><div class="pr-child-container">
                <img src="../public_view/page-images/user1_profile.jpg">
                <span>Child 6</span>
            </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                <img src="../public_view/page-images/user1_profile.jpg">
                <span>Child 7</span>
            </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                <img src="../public_view/page-images/user1_profile.jpg">
                <span>Child 8</span>
            </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                <img src="../public_view/page-images/user1_profile.jpg">
                <span>Child 9</span>
            </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                <img src="../public_view/page-images/user1_profile.jpg">
                <span>Child 10</span>
            </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                <img src="../public_view/page-images/user1_profile.jpg">
                <span>Child 11</span>
            </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                <img src="../public_view/page-images/user1_profile.jpg">
                <span>Child 12</span>
            </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                <img src="../public_view/page-images/user1_profile.jpg">
                <span>Child 13</span>
            </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                <img src="../public_view/page-images/user1_profile.jpg">
                <span>Child 14</span>
            </div>
            </a>
            <div id="pr-p-container"><a href="">+</a></div>
        </div>
    </div>
</body>

<?php
require_once '../includes/header.php';
?>
<?php
require_once '../includes/footer.php';
?>