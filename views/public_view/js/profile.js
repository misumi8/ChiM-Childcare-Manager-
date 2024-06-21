document.addEventListener("DOMContentLoaded", function() {
    const addMoreInfo = document.getElementById("pr-add-more-info-button");
    const childDataForm = document.getElementById("pr-child-data-form");
    const arrow = document.getElementById("pr-timeline");
    const closeButton = document.getElementById("pr-close-2col-form");
    const addMemoryButton = document.getElementById("pr-add-memory-button");
    const seeCalendarButton = document.getElementById("pr-see-calendar");
    const addMemoryForm = document.getElementById("pr-add-memory-form");
    const memoryForm = document.getElementById("pr-memory-form");
    const addMemorySaveButton = document.getElementById("pr-add-memory-save-button");
    const addMemoryPhotoSelection = document.getElementById("pr-add-memory-photo");
    const addMemoryDescription = document.getElementById("pr-add-memory-description");
    const arrowAnimation = document.getElementById("pr-sent-animation");
    const medicalHistoryButton = document.getElementById("pr-medical-history-button"); 
    const medicalHistory = document.getElementById("pr-medical-history");
    const tableCells = document.querySelectorAll(".pr-table-cell");
    const childrenPanel = document.getElementsByClassName("pr-child-panel");
    const memories = document.getElementById("pr-memories");
    const timeline = document.getElementById("pr-timeline");
    const line = document.getElementById("pr-line");
    const addNewChild = document.getElementById("pr-p-container");
    const memoryList = document.querySelectorAll('.pr-memory');
    const saveButtonExtension = document.getElementById("pr-save-button-extension");
    const firstRow = document.getElementById("pr-first-row");
    const addChild = document.getElementById("pr-p-container");
    const calendar = document.getElementById("pr-calendar-list");
    const addMemoryInput = document.getElementById("pr-add-memory-input");

    // addNewChild.addEventListener("click", function () {
    //     alert("Button Pressed");
    //     var xhr = new XMLHttpRequest();
    //     xhr.open('GET', '../public_view/php-scripts/addNewChild.php', true);
    //     xhr.send();    
    // }); 

    childDataForm.addEventListener("submit", function (event) {
        event.preventDefault();
        const nameInput = document.getElementById("pr-name-input");
        const dobInput = document.getElementById("pr-dob-input");
        //const genderMaleInput = document.getElementById("male");
        //const genderFemaleInput = document.getElementById("female");
        const heightInput = document.getElementById("pr-height-input");
        //const hobbyInput = document.getElementById("pr-hobby-input");
        //const favFoodInput = document.getElementById("pr-food-input");

        if(!/^[A-Za-zăîâțș]+$/.test(nameInput.value)){
            nameInput.style.backgroundColor = "#e54141";
            console.log(nameInput.placeholder);
            nameInput.placeholder.style.backgroundColor = "white";
            return;
        }
        else nameInput.style.backgroundColor = "";
        //alert(dobInput.value);
        if(!/^\d{4}-\d{2}-\d{2}$/.test(dobInput.value) || new Date(dobInput.value) > new Date() || new Date(dobInput.value) < new Date('1920-01-01')){
            dobInput.style.backgroundColor = "#e54141";
            return;
        }
        else dobInput.style.backgroundColor = "";   

        if(!/^[0-9]+$/.test(heightInput.value) || Number(heightInput.value) > 200){
            heightInput.style.backgroundColor = "#e54141";
            return;
        }
        else heightInput.style.backgroundColor = "";
        
        const form = new FormData(childDataForm);
        const isMale = document.getElementById("male").checked ? "Male" : "Female";
        updateChildInfo(form.get('name'), form.get('date-of-birth'), isMale, form.get('height'), form.get('hobby'), form.get('food'));
    });

    let important = false;
    saveButtonExtension.addEventListener("click", function(){
        if(!important){
            saveButtonExtension.style.color = "#751d9b";
            important = true;
        }
        else {
            saveButtonExtension.style.color = "white";
            important = false;
        }
    });
    
    let contentUploaded = true;
    memoryForm.addEventListener('submit', (event) => {
        event.preventDefault();
        if(addMemoryInput.files.length > 0) {
            contentUploaded = true;
            const form = new FormData(memoryForm);
            const photo = form.get('photo');
            //alert(photo);
            
            const description = form.get('description');
            addMemory(photo, description, important);
        }
        else contentUploaded = false;
        //else alert("content is required");
    });

    addMemorySaveButton.addEventListener("mousedown", function (event) {
        let saveButtonExtension = document.getElementById("pr-save-button-extension");
        saveButtonExtension.style.marginTop = "5%";
        saveButtonExtension.style.boxShadow = "0 2px 0px #801FAA";
    });

    addMemorySaveButton.addEventListener("mouseup", function () {
        let saveButtonExtension = document.getElementById("pr-save-button-extension");
        saveButtonExtension.style.marginTop = "0%";
        saveButtonExtension.style.boxShadow = "0 7px 0px #801FAA";
    });

    memoryList.forEach(memory => {
        memory.style.width = "21rem";
        memory.style.display = "auto";
        let oddClick = true;
        memory.addEventListener('mouseover', () => {
            if (memory.previousElementSibling) {
                let prevMemory = memory.previousElementSibling;
                while(prevMemory){
                    prevMemory.style.transform = "translateX(-1rem)";
                    prevMemory = prevMemory.previousElementSibling;

                }
                console.log("in");
            }
        })
        memory.addEventListener('mouseout', () => {
            if (memory.previousElementSibling) {
                let prevMemory = memory.previousElementSibling;
                while(prevMemory){
                    prevMemory.style.transform = "translateX(0rem)";
                    prevMemory = prevMemory.previousElementSibling;

                }
                console.log("out");
            }
        })

        memory.addEventListener('click', async () => {
            let memoryDescription = memory.querySelectorAll('span');
            if(oddClick){
                oddClick = false;
                console.log("odd click");
                memory.style.width = "42rem";
                memory.style.display = "absolute";
                memoryDescription.forEach(async memoryDescription => {
                    await new Promise(r => setTimeout(r, 380));
                    memoryDescription.style.opacity = "1";
                });
            }
            else {
                oddClick = true;
                console.log("even click");
                memoryDescription.forEach(memoryDescription => {
                    memoryDescription.style.opacity = "0";
                })
                //await new Promise(r => setTimeout(r, 10));
                memory.style.width = "21rem";
                memory.style.display = "auto";
                
            }
        })
    })

    let totalScrollMemories = 0;
    memories.addEventListener('wheel', function(event) {
        const fontSize = 16;

        if (event.deltaY !== 0) {
            memories.scrollLeft += event.deltaY;
            timeline.scrollLeft += event.deltaY;

            let currentBackgroundSize = parseFloat(getComputedStyle(line).backgroundSize) / fontSize;

            if (event.deltaY > 0 && ((totalScrollMemories + event.deltaY) / fontSize) < (((memories.scrollWidth + memories.clientWidth) / fontSize) - 150)) {
                line.style.backgroundSize = (currentBackgroundSize + 0.1) + "rem";
                totalScrollMemories += event.deltaY; 
            } 
            else if (event.deltaY < 0) {
                line.style.backgroundSize = (currentBackgroundSize - 0.1 > 0.3 ? currentBackgroundSize - 0.1 : 0.3) + "rem";
                if(totalScrollMemories + event.deltaY >= 0) totalScrollMemories += event.deltaY; 
            }
            
            console.log(totalScrollMemories + " | ((totalScrollMemories + event.deltaY) / fontSize): " + ((totalScrollMemories + event.deltaY) / fontSize) +" | memories.scrollWidth + memories.clientWidth: " + (memories.scrollWidth + memories.clientWidth) / fontSize);
            event.preventDefault(); // Contra vertical scroll of the page
        }
    }); 

    seeCalendarButton.addEventListener("click", function(){
        calendar.style.display = "block";
        firstRow.style.display = "none";
        arrow.style.display = "none";
        addMoreInfo.style.display = "none";
        addMemoryButton.style.display = "none";
        seeCalendarButton.style.display = "none";
        childrenPanel.style.position = "none";
        closeButton.style.display = "flex";
        calendar.style.display = "block";
    });

    // Close button
    closeButton.addEventListener("click", function() {
        calendar.style.display = "none";
        childDataForm.style.display = "none";
        addMemoryForm.style.display = "none";
        closeButton.style.display = "none";
        firstRow.style.display = "grid";
        arrow.style.display = "grid";
        addMoreInfo.style.display = "inline-block";
        addMemoryButton.style.display = "inline-block";
        seeCalendarButton.style.display = "inline-block";
        childrenPanel.style.position = "fixed";
        //location.reload(true);
    });

    // addChild button
    addChild.addEventListener("click", function() {
        calendar.style.display = "none";
        closeButton.style.display = "flex";
        arrow.style.display = "none";
        addMoreInfo.style.display = "none";
        addMemoryButton.style.display = "none";
        seeCalendarButton.style.display = "none";
        childDataForm.style.display = "flex";
        medicalHistory.style.display = "none";
        medicalHistoryButton.style.display = "none";
    });

    // addMoreInfo button
    addMoreInfo.addEventListener("click", function() {
        calendar.style.display = "none";
        medicalHistoryButton.style.display = "block";
        childDataForm.style.display = "flex";
        closeButton.style.display = "flex";
        arrow.style.display = "none";
        addMoreInfo.style.display = "none";
        addMemoryButton.style.display = "none";
        seeCalendarButton.style.display = "none";
    });

    // medical history button
    medicalHistoryButton.addEventListener("click", function() {
        calendar.style.display = "none";
        childDataForm.style.display = "flex";
        closeButton.style.display = "none";
        arrow.style.display = "none";
        medicalHistory.style.display = "block";
    });

    // addMemory button
    addMemoryButton.addEventListener("click", function() {
        calendar.style.display = "none";
        closeButton.style.display = "flex";
        arrow.style.display = "none";
        addMoreInfo.style.display = "none";
        addMemoryButton.style.display = "none";
        seeCalendarButton.style.display = "none";
        addMemoryForm.style.display = "grid";
    });
    
    // save button (in add-memory form)
    addMemorySaveButton.addEventListener("click", function() {
        setTimeout(function(){
            if(contentUploaded) arrowAnimation.style.backgroundImage = "url('../CHiM/views/public_view/page-images/arrow-animation.png')";
            else arrowAnimation.style.backgroundImage = "url('../CHiM/views/public_view/page-images/arrow-animation-no-content.png')";
            arrowAnimation.classList.toggle("linear-throw");
            setTimeout(function(){arrowAnimation.classList.toggle("linear-throw"); memoryForm.reset();}, 1500);
        }, 100);
    });

    if(medicalHistory.style.display != "none") {
        tableCells.forEach(function(tableCell) {
            // tableCell.style.height = "";
            // tableCell.style.height = tableCell.scrollHeight + "px";
            tableCell.addEventListener("input", function () {
                // tableCell.style.height = "";
                tableCell.style.height = tableCell.scrollHeight + "px";
            });
        });
    }
});
