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
    
    const feedingScheduleNewSundayRecordButton = document.querySelector('#pr-feeding-schedule #pr-sunday .pr-add-new-record-button');
    const feedingScheduleNewMondayRecordButton = document.querySelector('#pr-feeding-schedule #pr-monday .pr-add-new-record-button');
    const feedingScheduleNewTuesdayRecordButton = document.querySelector('#pr-feeding-schedule #pr-tuesday .pr-add-new-record-button');
    const feedingScheduleNewWednesdayRecordButton = document.querySelector('#pr-feeding-schedule #pr-wednesday .pr-add-new-record-button');
    const feedingScheduleNewThursdayRecordButton = document.querySelector('#pr-feeding-schedule #pr-thursday .pr-add-new-record-button');
    const feedingScheduleNewFridayRecordButton = document.querySelector('#pr-feeding-schedule #pr-friday .pr-add-new-record-button');
    const feedingScheduleNewSaturdayRecordButton = document.querySelector('#pr-feeding-schedule #pr-saturday .pr-add-new-record-button');
    
    const sleepingScheduleNewSundayRecordButton = document.querySelector('#pr-sleeping-schedule #pr-sunday .pr-add-new-record-button');
    const sleepingScheduleNewMondayRecordButton = document.querySelector('#pr-sleeping-schedule #pr-monday .pr-add-new-record-button');
    const sleepingScheduleNewTuesdayRecordButton = document.querySelector('#pr-sleeping-schedule #pr-tuesday .pr-add-new-record-button');
    const sleepingScheduleNewWednesdayRecordButton = document.querySelector('#pr-sleeping-schedule #pr-wednesday .pr-add-new-record-button');
    const sleepingScheduleNewThursdayRecordButton = document.querySelector('#pr-sleeping-schedule #pr-thursday .pr-add-new-record-button');
    const sleepingScheduleNewFridayRecordButton = document.querySelector('#pr-sleeping-schedule #pr-friday .pr-add-new-record-button');
    const sleepingScheduleNewSaturdayRecordButton = document.querySelector('#pr-sleeping-schedule #pr-saturday .pr-add-new-record-button');
    
    const sleepingScheduleNewSundayRecordInput = document.querySelector('#pr-sleeping-schedule #pr-sunday .pr-new-record');
    const sleepingScheduleNewSaturdayRecordInput = document.querySelector('#pr-sleeping-schedule #pr-saturday .pr-new-record');
    const sleepingScheduleNewFridayRecordInput = document.querySelector('#pr-sleeping-schedule #pr-friday .pr-new-record');
    const sleepingScheduleNewThursdayRecordInput = document.querySelector('#pr-sleeping-schedule #pr-thursday .pr-new-record');
    const sleepingScheduleNewWednesdayRecordInput = document.querySelector('#pr-sleeping-schedule #pr-wednesday .pr-new-record');
    const sleepingScheduleNewTuesdayRecordInput = document.querySelector('#pr-sleeping-schedule #pr-tuesday .pr-new-record');
    const sleepingScheduleNewMondayRecordInput = document.querySelector('#pr-sleeping-schedule #pr-monday .pr-new-record');
    
    const feedingScheduleNewSaturdayRecordInput = document.querySelector('#pr-feeding-schedule #pr-saturday .pr-new-record');
    const feedingScheduleNewFridayRecordInput = document.querySelector('#pr-feeding-schedule #pr-friday .pr-new-record');
    const feedingScheduleNewThursdayRecordInput = document.querySelector('#pr-feeding-schedule #pr-thursday .pr-new-record');
    const feedingScheduleNewWednesdayRecordInput = document.querySelector('#pr-feeding-schedule #pr-wednesday .pr-new-record');
    const feedingScheduleNewTuesdayRecordInput = document.querySelector('#pr-feeding-schedule #pr-tuesday .pr-new-record');
    const feedingScheduleNewMondayRecordInput = document.querySelector('#pr-feeding-schedule #pr-monday .pr-new-record');
    const feedingScheduleNewSundayRecordInput = document.querySelector('#pr-feeding-schedule #pr-sunday .pr-new-record');

    // FEEDING SCHEDULE 
    feedingScheduleNewSaturdayRecordButton.addEventListener("click", function() {
        feedingScheduleNewSaturdayRecordInput.style.display = "grid";
    });

    feedingScheduleNewFridayRecordButton.addEventListener("click", function() {
        feedingScheduleNewFridayRecordInput.style.display = "grid";
    });

    feedingScheduleNewThursdayRecordButton.addEventListener("click", function() {
        feedingScheduleNewThursdayRecordInput.style.display = "grid";
    });

    feedingScheduleNewWednesdayRecordButton.addEventListener("click", function() {
        feedingScheduleNewWednesdayRecordInput.style.display = "grid";
    });

    feedingScheduleNewTuesdayRecordButton.addEventListener("click", function() {
        feedingScheduleNewTuesdayRecordInput.style.display = "grid";
    });

    feedingScheduleNewMondayRecordButton.addEventListener("click", function() {
        feedingScheduleNewMondayRecordInput.style.display = "grid";
    });

    feedingScheduleNewSundayRecordButton.addEventListener("click", function() {
        feedingScheduleNewSundayRecordInput.style.display = "grid";
    });

    feedingScheduleNewSundayRecordInput.addEventListener('submit', function(event) {
        event.preventDefault();
        const form = new FormData(feedingScheduleNewSundayRecordInput);
        if(form.get('record-time').length == 0){
            let wrongInput = feedingScheduleNewSundayRecordInput.querySelector('.pr-new-record-time');
            wrongInput.classList.toggle('pr-wrong-input');
            wrongInput.style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput.classList.toggle("pr-wrong-input"); wrongInput.style.borderRadius = "0";}, 1000);
            return;
        }
        if(form.get('record-text').length > 50 || form.get('record-text').length == 0){
            let wrongInput = feedingScheduleNewSundayRecordInput.querySelector('.pr-new-record-text');
            wrongInput.classList.toggle('pr-wrong-input');
            wrongInput.style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput.classList.toggle("pr-wrong-input"); wrongInput.style.borderRadius = "0";}, 1000);
            return;
        }  
        addNewFeedingRecord("sunday", form.get('record-time'), form.get('record-text'));
        const sundayScheduleRecords = document.querySelector('#pr-feeding-schedule #pr-sunday .pr-schedule-records');
        setTimeout(function(){updateHTMLFeedingRecordList(sundayScheduleRecords, "sunday");}, 50);
        feedingScheduleNewSundayRecordInput.reset();
    });

    feedingScheduleNewMondayRecordInput.addEventListener('submit', function(event) {
        event.preventDefault();
        const form = new FormData(feedingScheduleNewMondayRecordInput);
        if(form.get('record-time').length == 0){
            let wrongInput = feedingScheduleNewMondayRecordInput.querySelector('.pr-new-record-time');
            wrongInput.classList.toggle('pr-wrong-input');
            wrongInput.style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput.classList.toggle("pr-wrong-input"); wrongInput.style.borderRadius = "0";}, 1000);
            return;
        }
        if(form.get('record-text').length > 50 || form.get('record-text').length == 0){
            let wrongInput = feedingScheduleNewMondayRecordInput.querySelector('.pr-new-record-text');
            wrongInput.classList.toggle('pr-wrong-input');
            wrongInput.style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput.classList.toggle("pr-wrong-input"); wrongInput.style.borderRadius = "0";}, 1000);
            return;
        }  
        addNewFeedingRecord("monday", form.get('record-time'), form.get('record-text'));
        const mondayScheduleRecords = document.querySelector('#pr-feeding-schedule #pr-monday .pr-schedule-records');
        setTimeout(function(){updateHTMLFeedingRecordList(mondayScheduleRecords, "monday");}, 50);
        feedingScheduleNewMondayRecordInput.reset();
    });
    
    feedingScheduleNewTuesdayRecordInput.addEventListener('submit', function(event) {
        event.preventDefault();
        const form = new FormData(feedingScheduleNewTuesdayRecordInput);
        if(form.get('record-time').length == 0){
            let wrongInput = feedingScheduleNewTuesdayRecordInput.querySelector('.pr-new-record-time');
            wrongInput.classList.toggle('pr-wrong-input');
            wrongInput.style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput.classList.toggle("pr-wrong-input"); wrongInput.style.borderRadius = "0";}, 1000);
            return;
        }
        if(form.get('record-text').length > 50 || form.get('record-text').length == 0){
            let wrongInput = feedingScheduleNewTuesdayRecordInput.querySelector('.pr-new-record-text');
            wrongInput.classList.toggle('pr-wrong-input');
            wrongInput.style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput.classList.toggle("pr-wrong-input"); wrongInput.style.borderRadius = "0";}, 1000);
            return;
        }  
        addNewFeedingRecord("tuesday", form.get('record-time'), form.get('record-text'));
        const tuesdayScheduleRecords = document.querySelector('#pr-feeding-schedule #pr-tuesday .pr-schedule-records');
        setTimeout(function(){updateHTMLFeedingRecordList(tuesdayScheduleRecords, "tuesday");}, 50);
        feedingScheduleNewTuesdayRecordInput.reset();
    });

    feedingScheduleNewWednesdayRecordInput.addEventListener('submit', function(event) {
        event.preventDefault();
        const form = new FormData(feedingScheduleNewWednesdayRecordInput);
        if(form.get('record-time').length == 0){
            let wrongInput = feedingScheduleNewWednesdayRecordInput.querySelector('.pr-new-record-time');
            wrongInput.classList.toggle('pr-wrong-input');
            wrongInput.style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput.classList.toggle("pr-wrong-input"); wrongInput.style.borderRadius = "0";}, 1000);
            return;
        }
        if(form.get('record-text').length > 50 || form.get('record-text').length == 0){
            let wrongInput = feedingScheduleNewWednesdayRecordInput.querySelector('.pr-new-record-text');
            wrongInput.classList.toggle('pr-wrong-input');
            wrongInput.style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput.classList.toggle("pr-wrong-input"); wrongInput.style.borderRadius = "0";}, 1000);
            return;
        }  
        addNewFeedingRecord("wednesday", form.get('record-time'), form.get('record-text'));
        const wednesdayScheduleRecords = document.querySelector('#pr-feeding-schedule #pr-wednesday .pr-schedule-records');
        setTimeout(function(){updateHTMLFeedingRecordList(wednesdayScheduleRecords, "wednesday");}, 50);
        feedingScheduleNewWednesdayRecordInput.reset();
    });

    feedingScheduleNewThursdayRecordInput.addEventListener('submit', function(event) {
        event.preventDefault();
        const form = new FormData(feedingScheduleNewThursdayRecordInput);
        if(form.get('record-time').length == 0){
            let wrongInput = feedingScheduleNewThursdayRecordInput.querySelector('.pr-new-record-time');
            wrongInput.classList.toggle('pr-wrong-input');
            wrongInput.style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput.classList.toggle("pr-wrong-input"); wrongInput.style.borderRadius = "0";}, 1000);
            return;
        }
        if(form.get('record-text').length > 50 || form.get('record-text').length == 0){
            let wrongInput = feedingScheduleNewThursdayRecordInput.querySelector('.pr-new-record-text');
            wrongInput.classList.toggle('pr-wrong-input');
            wrongInput.style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput.classList.toggle("pr-wrong-input"); wrongInput.style.borderRadius = "0";}, 1000);
            return;
        }  
        addNewFeedingRecord("thursday", form.get('record-time'), form.get('record-text'));
        const thursdayScheduleRecords = document.querySelector('#pr-feeding-schedule #pr-thursday .pr-schedule-records');
        setTimeout(function(){updateHTMLFeedingRecordList(thursdayScheduleRecords, "thursday");}, 50);
        feedingScheduleNewThursdayRecordInput.reset();
    });

    feedingScheduleNewFridayRecordInput.addEventListener('submit', function(event) {
        event.preventDefault();
        const form = new FormData(feedingScheduleNewFridayRecordInput);
        if(form.get('record-time').length == 0){
            let wrongInput = feedingScheduleNewFridayRecordInput.querySelector('.pr-new-record-time');
            wrongInput.classList.toggle('pr-wrong-input');
            wrongInput.style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput.classList.toggle("pr-wrong-input"); wrongInput.style.borderRadius = "0";}, 1000);
            return;
        }
        if(form.get('record-text').length > 50 || form.get('record-text').length == 0){
            let wrongInput = feedingScheduleNewFridayRecordInput.querySelector('.pr-new-record-text');
            wrongInput.classList.toggle('pr-wrong-input');
            wrongInput.style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput.classList.toggle("pr-wrong-input"); wrongInput.style.borderRadius = "0";}, 1000);
            return;
        }  
        addNewFeedingRecord("friday", form.get('record-time'), form.get('record-text'));
        const fridayScheduleRecords = document.querySelector('#pr-feeding-schedule #pr-friday .pr-schedule-records');
        setTimeout(function(){updateHTMLFeedingRecordList(fridayScheduleRecords, "friday");}, 50);
        feedingScheduleNewFridayRecordInput.reset();
    });

    feedingScheduleNewSaturdayRecordInput.addEventListener('submit', function(event) {
        event.preventDefault();
        const form = new FormData(feedingScheduleNewSaturdayRecordInput);
        if(form.get('record-time').length == 0){
            let wrongInput = feedingScheduleNewSaturdayRecordInput.querySelector('.pr-new-record-time');
            wrongInput.classList.toggle('pr-wrong-input');
            wrongInput.style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput.classList.toggle("pr-wrong-input"); wrongInput.style.borderRadius = "0";}, 1000);
            return;
        }
        if(form.get('record-text').length > 50 || form.get('record-text').length == 0){
            let wrongInput = feedingScheduleNewSaturdayRecordInput.querySelector('.pr-new-record-text');
            wrongInput.classList.toggle('pr-wrong-input');
            wrongInput.style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput.classList.toggle("pr-wrong-input"); wrongInput.style.borderRadius = "0";}, 1000);
            return;
        }  
        addNewFeedingRecord("saturday", form.get('record-time'), form.get('record-text'));
        const saturdayScheduleRecords = document.querySelector('#pr-feeding-schedule #pr-saturday .pr-schedule-records');
        setTimeout(function(){updateHTMLFeedingRecordList(saturdayScheduleRecords, "saturday");}, 50);
        feedingScheduleNewSaturdayRecordInput.reset();
    });

    // SLEEPING SCHEDULE 
    sleepingScheduleNewSundayRecordInput.addEventListener('submit', function(event) {
        event.preventDefault();
        const form = new FormData(sleepingScheduleNewSundayRecordInput);
        if(form.get('start-time').length == 0 || form.get('end-time').length == 0){
            let wrongInput = sleepingScheduleNewSundayRecordInput.querySelectorAll('.pr-new-record-time');
            wrongInput[0].classList.toggle('pr-wrong-input');
            wrongInput[0].style.borderRadius = "0.2rem";
            wrongInput[1].classList.toggle('pr-wrong-input');
            wrongInput[1].style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput[0].classList.toggle("pr-wrong-input"); 
                wrongInput[0].style.borderRadius = "0";
                wrongInput[1].classList.toggle("pr-wrong-input");
                wrongInput[1].style.borderRadius = "0";}, 1000);
            return;
        }
        if(form.get('record-text').length > 50 || form.get('record-text').length == 0){
            let wrongInput = sleepingScheduleNewSundayRecordInput.querySelector('.pr-new-record-text');
            wrongInput.classList.toggle('pr-wrong-input');
            wrongInput.style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput.classList.toggle("pr-wrong-input"); wrongInput.style.borderRadius = "0";}, 1000);
            return;
        }  
        //alert(form.get('start-time') + ' | ' + form.get('end-time'));
        addNewSleepingRecord("sunday", form.get('start-time'), form.get('end-time'), form.get('record-text'));
        const sundayScheduleRecords = document.querySelector('#pr-sleeping-schedule #pr-sunday .pr-schedule-records');
        setTimeout(function(){updateHTMLSleepingRecordList(sundayScheduleRecords, "sunday");}, 50);
        sleepingScheduleNewSundayRecordInput.reset();
    });

    sleepingScheduleNewMondayRecordInput.addEventListener('submit', function(event) {
        event.preventDefault();
        const form = new FormData(sleepingScheduleNewMondayRecordInput);
        if(form.get('start-time').length == 0 || form.get('end-time').length == 0){
            let wrongInput = sleepingScheduleNewMondayRecordInput.querySelectorAll('.pr-new-record-time');
            wrongInput[0].classList.toggle('pr-wrong-input');
            wrongInput[0].style.borderRadius = "0.2rem";
            wrongInput[1].classList.toggle('pr-wrong-input');
            wrongInput[1].style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput[0].classList.toggle("pr-wrong-input"); 
                wrongInput[0].style.borderRadius = "0";
                wrongInput[1].classList.toggle("pr-wrong-input");
                wrongInput[1].style.borderRadius = "0";}, 1000);
            return;
        }
        if(form.get('record-text').length > 50 || form.get('record-text').length == 0){
            let wrongInput = sleepingScheduleNewMondayRecordInput.querySelector('.pr-new-record-text');
            wrongInput.classList.toggle('pr-wrong-input');
            wrongInput.style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput.classList.toggle("pr-wrong-input"); wrongInput.style.borderRadius = "0";}, 1000);
            return;
        }  
        addNewSleepingRecord("monday", form.get('start-time'), form.get('end-time'), form.get('record-text'));
        const mondayScheduleRecords = document.querySelector('#pr-sleeping-schedule #pr-monday .pr-schedule-records');
        setTimeout(function(){updateHTMLSleepingRecordList(mondayScheduleRecords, "monday");}, 50);
        sleepingScheduleNewMondayRecordInput.reset();
    });
    
    sleepingScheduleNewTuesdayRecordInput.addEventListener('submit', function(event) {
        event.preventDefault();
        const form = new FormData(sleepingScheduleNewTuesdayRecordInput);
        if(form.get('start-time').length == 0 || form.get('end-time').length == 0){
            let wrongInput = sleepingScheduleNewTuesdayRecordInput.querySelectorAll('.pr-new-record-time');
            wrongInput[0].classList.toggle('pr-wrong-input');
            wrongInput[0].style.borderRadius = "0.2rem";
            wrongInput[1].classList.toggle('pr-wrong-input');
            wrongInput[1].style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput[0].classList.toggle("pr-wrong-input"); 
                wrongInput[0].style.borderRadius = "0";
                wrongInput[1].classList.toggle("pr-wrong-input");
                wrongInput[1].style.borderRadius = "0";}, 1000);
            return;
        }
        if(form.get('record-text').length > 50 || form.get('record-text').length == 0){
            let wrongInput = sleepingScheduleNewTuesdayRecordInput.querySelector('.pr-new-record-text');
            wrongInput.classList.toggle('pr-wrong-input');
            wrongInput.style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput.classList.toggle("pr-wrong-input"); wrongInput.style.borderRadius = "0";}, 1000);
            return;
        }  
        addNewSleepingRecord("tuesday", form.get('start-time'), form.get('end-time'), form.get('record-text'));
        const tuesdayScheduleRecords = document.querySelector('#pr-sleeping-schedule #pr-tuesday .pr-schedule-records');
        setTimeout(function(){updateHTMLSleepingRecordList(tuesdayScheduleRecords, "tuesday");}, 50);
        sleepingScheduleNewTuesdayRecordInput.reset();
    });

    sleepingScheduleNewWednesdayRecordInput.addEventListener('submit', function(event) {
        event.preventDefault();
        const form = new FormData(sleepingScheduleNewWednesdayRecordInput);
        if(form.get('start-time').length == 0 || form.get('end-time').length == 0){
            let wrongInput = sleepingScheduleNewWednesdayRecordInput.querySelectorAll('.pr-new-record-time');
            wrongInput[0].classList.toggle('pr-wrong-input');
            wrongInput[0].style.borderRadius = "0.2rem";
            wrongInput[1].classList.toggle('pr-wrong-input');
            wrongInput[1].style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput[0].classList.toggle("pr-wrong-input"); 
                wrongInput[0].style.borderRadius = "0";
                wrongInput[1].classList.toggle("pr-wrong-input");
                wrongInput[1].style.borderRadius = "0";}, 1000);
            return;
        }
        if(form.get('record-text').length > 50 || form.get('record-text').length == 0){
            let wrongInput = sleepingScheduleNewWednesdayRecordInput.querySelector('.pr-new-record-text');
            wrongInput.classList.toggle('pr-wrong-input');
            wrongInput.style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput.classList.toggle("pr-wrong-input"); wrongInput.style.borderRadius = "0";}, 1000);
            return;
        }  
        addNewSleepingRecord("wednesday", form.get('start-time'), form.get('end-time'), form.get('record-text'));
        const wednesdayScheduleRecords = document.querySelector('#pr-sleeping-schedule #pr-wednesday .pr-schedule-records');
        setTimeout(function(){updateHTMLSleepingRecordList(wednesdayScheduleRecords, "wednesday");}, 50);
        sleepingScheduleNewWednesdayRecordInput.reset();
    });

    sleepingScheduleNewThursdayRecordInput.addEventListener('submit', function(event) {
        event.preventDefault();
        const form = new FormData(sleepingScheduleNewThursdayRecordInput);
        if(form.get('start-time').length == 0 || form.get('end-time').length == 0){
            let wrongInput = sleepingScheduleNewThursdayRecordInput.querySelectorAll('.pr-new-record-time');
            wrongInput[0].classList.toggle('pr-wrong-input');
            wrongInput[0].style.borderRadius = "0.2rem";
            wrongInput[1].classList.toggle('pr-wrong-input');
            wrongInput[1].style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput[0].classList.toggle("pr-wrong-input"); 
                wrongInput[0].style.borderRadius = "0";
                wrongInput[1].classList.toggle("pr-wrong-input");
                wrongInput[1].style.borderRadius = "0";}, 1000);
            return;
        }
        if(form.get('record-text').length > 50 || form.get('record-text').length == 0){
            let wrongInput = sleepingScheduleNewThursdayRecordInput.querySelector('.pr-new-record-text');
            wrongInput.classList.toggle('pr-wrong-input');
            wrongInput.style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput.classList.toggle("pr-wrong-input"); wrongInput.style.borderRadius = "0";}, 1000);
            return;
        }  
        addNewSleepingRecord("thursday", form.get('start-time'), form.get('end-time'), form.get('record-text'));
        const thursdayScheduleRecords = document.querySelector('#pr-sleeping-schedule #pr-thursday .pr-schedule-records');
        setTimeout(function(){updateHTMLSleepingRecordList(thursdayScheduleRecords, "thursday");}, 50);
        sleepingScheduleNewThursdayRecordInput.reset();
    });

    sleepingScheduleNewFridayRecordInput.addEventListener('submit', function(event) {
        event.preventDefault();
        const form = new FormData(sleepingScheduleNewFridayRecordInput);
        if(form.get('start-time').length == 0 || form.get('end-time').length == 0){
            let wrongInput = sleepingScheduleNewFridayRecordInput.querySelectorAll('.pr-new-record-time');
            wrongInput[0].classList.toggle('pr-wrong-input');
            wrongInput[0].style.borderRadius = "0.2rem";
            wrongInput[1].classList.toggle('pr-wrong-input');
            wrongInput[1].style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput[0].classList.toggle("pr-wrong-input"); 
                wrongInput[0].style.borderRadius = "0";
                wrongInput[1].classList.toggle("pr-wrong-input");
                wrongInput[1].style.borderRadius = "0";}, 1000);
            return;
        }
        if(form.get('record-text').length > 50 || form.get('record-text').length == 0){
            let wrongInput = sleepingScheduleNewFridayRecordInput.querySelector('.pr-new-record-text');
            wrongInput.classList.toggle('pr-wrong-input');
            wrongInput.style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput.classList.toggle("pr-wrong-input"); wrongInput.style.borderRadius = "0";}, 1000);
            return;
        }  
        addNewSleepingRecord("friday", form.get('start-time'), form.get('end-time'), form.get('record-text'));
        const fridayScheduleRecords = document.querySelector('#pr-sleeping-schedule #pr-friday .pr-schedule-records');
        setTimeout(function(){updateHTMLSleepingRecordList(fridayScheduleRecords, "friday");}, 50);
        sleepingScheduleNewFridayRecordInput.reset();
    });

    sleepingScheduleNewSaturdayRecordInput.addEventListener('submit', function(event) {
        event.preventDefault();
        const form = new FormData(sleepingScheduleNewSaturdayRecordInput);
        if(form.get('start-time').length == 0 || form.get('end-time').length == 0){
            let wrongInput = sleepingScheduleNewSaturdayRecordInput.querySelectorAll('.pr-new-record-time');
            wrongInput[0].classList.toggle('pr-wrong-input');
            wrongInput[0].style.borderRadius = "0.2rem";
            wrongInput[1].classList.toggle('pr-wrong-input');
            wrongInput[1].style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput[0].classList.toggle("pr-wrong-input"); 
                wrongInput[0].style.borderRadius = "0";
                wrongInput[1].classList.toggle("pr-wrong-input");
                wrongInput[1].style.borderRadius = "0";}, 1000);
            return;
        }
        if(form.get('record-text').length > 50 || form.get('record-text').length == 0){
            let wrongInput = sleepingScheduleNewSaturdayRecordInput.querySelector('.pr-new-record-text');
            wrongInput.classList.toggle('pr-wrong-input');
            wrongInput.style.borderRadius = "0.2rem";
            setTimeout(function(){wrongInput.classList.toggle("pr-wrong-input"); wrongInput.style.borderRadius = "0";}, 1000);
            return;
        }  
        addNewSleepingRecord("saturday", form.get('start-time'), form.get('end-time'), form.get('record-text'));
        const saturdayScheduleRecords = document.querySelector('#pr-sleeping-schedule #pr-saturday .pr-schedule-records');
        setTimeout(function(){updateHTMLSleepingRecordList(saturdayScheduleRecords, "saturday");}, 50);
        sleepingScheduleNewSaturdayRecordInput.reset();
    });
    
    sleepingScheduleNewSundayRecordButton.addEventListener("click", function() {
        sleepingScheduleNewSundayRecordInput.style.display = "grid";
    });

    sleepingScheduleNewSaturdayRecordButton.addEventListener("click", function() {
        sleepingScheduleNewSaturdayRecordInput.style.display = "grid";
    });

    sleepingScheduleNewFridayRecordButton.addEventListener("click", function() {
        sleepingScheduleNewFridayRecordInput.style.display = "grid";
    });

    sleepingScheduleNewThursdayRecordButton.addEventListener("click", function() {
        sleepingScheduleNewThursdayRecordInput.style.display = "grid";
    });

    sleepingScheduleNewWednesdayRecordButton.addEventListener("click", function() {
        sleepingScheduleNewWednesdayRecordInput.style.display = "grid";
    });

    sleepingScheduleNewTuesdayRecordButton.addEventListener("click", function() {
        sleepingScheduleNewTuesdayRecordInput.style.display = "grid";
    });

    sleepingScheduleNewMondayRecordButton.addEventListener("click", function() {
        sleepingScheduleNewMondayRecordInput.style.display = "grid";
    });

    feedingScheduleButton.addEventListener("click", () => {
        const feedingSchedule = document.getElementById("pr-feeding-schedule");
        const sleepingSchedule = document.getElementById("pr-sleeping-schedule");
        feedingSchedule.style.display = "grid";
        feedingSchedule.style.backgroundColor = "#e4c5f3";
        feedingScheduleButton.style.backgroundColor = "#e4c5f3";
        //feedingScheduleButton.style.fontSize = "1.27rem";
        sleepingScheduleButton.style.backgroundColor = "rgb(208 202 210)";
        //sleepingScheduleButton.style.fontSize = "1.2rem";
        sleepingSchedule.style.display = "none";
    });

    sleepingScheduleButton.addEventListener("click", () => {
        const feedingSchedule = document.getElementById("pr-feeding-schedule");
        const sleepingSchedule = document.getElementById("pr-sleeping-schedule");
        sleepingSchedule.style.display = "grid";
        sleepingSchedule.style.backgroundColor = "#e4c5f3";
        //sleepingScheduleButton.style.fontSize = "1.27rem";
        sleepingScheduleButton.style.backgroundColor = "#e4c5f3";
        feedingScheduleButton.style.backgroundColor = "rgb(208 202 210)";
        //feedingScheduleButton.style.fontSize = "1.2rem";
        feedingSchedule.style.display = "none";
    });

    let newChildAdded = false;
    childDataForm.addEventListener("submit", async function (event) {
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
        await new Promise(r => setTimeout(r, 100));
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
        closeButton.style.display = "flex";
        closeButton.style.top = "1.3%";
    });

    // Close button
    closeButton.addEventListener("click", function() {
        closeButton.style.top = "2%";
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
