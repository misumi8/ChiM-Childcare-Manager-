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
    const memoryList = document.querySelectorAll('.pr-memory');
    const saveButtonExtension = document.getElementById("pr-save-button-extension");
    const firstRow = document.getElementById("pr-first-row");
    const addChild = document.getElementById("pr-p-container");
    const calendar = document.getElementById("pr-schedules");
    const addMemoryInput = document.getElementById("pr-add-memory-input");
    const feedingScheduleButton = document.getElementById("pr-open-feeding-schedule");
    const sleepingScheduleButton = document.getElementById("pr-open-sleeping-schedule");

    feedingScheduleButton.addEventListener("click", () => {
        const feedingSchedule = document.getElementById("pr-feeding-schedule");
        const sleepingSchedule = document.getElementById("pr-sleeping-schedule");
        feedingSchedule.style.display = "grid";
        feedingSchedule.style.backgroundColor = "#e4c5f3";
        feedingScheduleButton.style.backgroundColor = "#e4c5f3";
        sleepingScheduleButton.style.backgroundColor = "#e6cef0";
        sleepingSchedule.style.display = "none";
    });

    sleepingScheduleButton.addEventListener("click", () => {
        const feedingSchedule = document.getElementById("pr-feeding-schedule");
        const sleepingSchedule = document.getElementById("pr-sleeping-schedule");
        sleepingSchedule.style.display = "grid";
        sleepingSchedule.style.backgroundColor = "#e4c5f3";
        sleepingScheduleButton.style.backgroundColor = "#e4c5f3";
        feedingScheduleButton.style.backgroundColor = "#e6cef0";
        feedingSchedule.style.display = "none";
    });

    let newChildAdded = false;
    childDataForm.addEventListener("submit", function (event) {
        event.preventDefault();
        const nameInput = document.getElementById("pr-name-input");
        const dobInput = document.getElementById("pr-dob-input");
        //const genderMaleInput = document.getElementById("male");
        //const genderFemaleInput = document.getElementById("female");
        const heightInput = document.getElementById("pr-height-input");
        //const hobbyInput = document.getElementById("pr-hobby-input");
        //const favFoodInput = document.getElementById("pr-food-input");

        if(!/^[A-Za-zăîâțș ]+$/.test(nameInput.value) || nameInput.value.length > 18 || nameInput.value.length < 2) {
            nameInput.classList.toggle("pr-wrong-input");
            nameInput.style.backgroundColor = "rgb(229, 65, 65)";
            console.log(nameInput.placeholder);
            //nameInput.placeholder.style.backgroundColor = "white";
            setTimeout(function(){nameInput.style.backgroundColor = "rgb(229, 65, 65)"; nameInput.classList.toggle("pr-wrong-input");}, 1000);
            return;
        }
        else nameInput.style.backgroundColor = "white";
        //alert(dobInput.value);
        if(!/^\d{4}-\d{2}-\d{2}$/.test(dobInput.value) || new Date(dobInput.value) > new Date() || new Date(dobInput.value) < new Date('1920-01-01')){
            dobInput.classList.toggle("pr-wrong-input");
            dobInput.style.backgroundColor = "rgb(229, 65, 65)";

            setTimeout(function(){dobInput.style.backgroundColor = "rgb(229, 65, 65)"; dobInput.classList.toggle("pr-wrong-input");}, 1000);
            return;
        }
        else dobInput.style.backgroundColor = "white";   

        if(!/^[0-9]+$/.test(heightInput.value) || Number(heightInput.value) > 270 || Number(heightInput.value) < 22){
            heightInput.classList.toggle("pr-wrong-input");
            heightInput.style.backgroundColor = "rgb(229, 65, 65)";
            setTimeout(function(){heightInput.style.backgroundColor = "rgb(229, 65, 65)"; heightInput.classList.toggle("pr-wrong-input");}, 1000);
            return;
        }
        else heightInput.style.backgroundColor = "white";
        
        if(newChildAdded) newChildId = addNewChild();

        const form = new FormData(childDataForm);
        const isMale = document.getElementById("male").checked ? "Male" : "Female";
        updateChildInfo(form.get('name'), form.get('date-of-birth'), isMale, form.get('height'), form.get('hobby'), form.get('food'));

        if(newChildAdded) {
            newChildAdded = false;
            location.reload();
        }
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
            if(memory.querySelectorAll('span')[0].textContent.length > 61) {
                //alert(memory.querySelectorAll('span')[0].textContent.length);
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
    addChild.addEventListener("click", async function() {
        calendar.style.display = "none";
        closeButton.style.display = "flex";
        arrow.style.display = "none";
        addMoreInfo.style.display = "none";
        addMemoryButton.style.display = "none";
        seeCalendarButton.style.display = "none";
        childDataForm.style.display = "flex";
        medicalHistory.style.display = "none";
        medicalHistoryButton.style.display = "none";
    
        //alert(updateChildList());
        //document.getElementById('pr-child-panel').innerHTML = updateChildList();
        //alert(document.getElementById('pr-child-panel').innerHTML);

        const nameInput = document.getElementById("pr-name-input");
        const dobInput = document.getElementById("pr-dob-input");
        const heightInput = document.getElementById("pr-height-input");
        const hobbyInput = document.getElementById("pr-hobby-input");
        const favFoodInput = document.getElementById("pr-food-input");
        nameInput.value = "";
        dobInput.value = "";
        heightInput.value = "";
        hobbyInput.value = "";
        favFoodInput.value = "";
        newChildAdded = true;
        //const genderMaleInput = document.getElementById("male");
        //const genderFemaleInput = document.getElementById("female");
        
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
