function changeChildImage(childId) {
    console.log(childId);
    const childPhoto = document.getElementById("pr-child-image");
    const childMenuPhoto = document.getElementById("pr-child-img-container" + childId);
    const photo = document.getElementById("pr-photo").files[0];
    const reader = new FileReader();
    
    reader.addEventListener("load", () => {
        // convert photo to base64 str
        childPhoto.src = reader.result;
        childMenuPhoto.src = reader.result;
        childPhoto.style.opacity = "1";

        // sending a request to php server
        var xhr = new XMLHttpRequest();
        var url = '../CHiM/controllers/childPicUpdate.php';
        var formData = new FormData();

        formData.append('child_id', childId);
        formData.append('photo', reader.result);
        xhr.open('POST', url, true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                if (xhr.status != 200) {
                    alert("updateChildPhoto error");
                }
            }
            //formData.reset();
        };

        xhr.send(formData);
    });

    if (photo != null) {// photo was uploaded
        reader.readAsDataURL(photo); 
    }
}

function updateChildList() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../CHiM/controllers/updateChildList.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var newHtml = xhr.responseText;
                var container = document.getElementById('pr-children-container');
                container.innerHTML = newHtml;
            } else {
                alert('Произошла ошибка при загрузке данных о детях.');
            }
        }
    };
    xhr.send();
}


function addNewChild(){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../CHiM/controllers/addNewChild.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status != 200) {
                alert("setSessionChildId error");
            }
            else {
                //alert(xhr.responseText);
                return xhr.responseText;
            }
        }
        //alert("Reload successfully");
    };
    xhr.send();
}

function setSessionChildId(userId, childId) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../CHiM/controllers/sessionChildId.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var params = 'child_id=' + encodeURIComponent(childId);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status != 200) {
                alert("setSessionChildId error");
            }
            else {
                window.location.href = "profile?id=" + userId + "&cid=" + childId;
                location.reload(true); // true -> cache ignore
            }
        }
        //alert("Reload successfully");
    };
    xhr.send(params);
}

async function addMemory(content, description, important, shared){
    const reader = new FileReader();
    
    reader.addEventListener("load", () => {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../CHiM/controllers/addNewMemory.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        var params = 'description=' + encodeURIComponent(description) + '&shared=' + encodeURIComponent(shared ? 1 : 0) + '&important=' + encodeURIComponent(important ? 1 : 0) + '&content=' + encodeURIComponent(reader.result);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                if (xhr.status != 200) {
                    alert("addMemory error");
                }
                else {
                    //alert(xhr.responseText);
                    location.reload(true); // true -> cache ignore
                }
            }
            //alert("Reload successfully");
        };
        xhr.send(params);
    });

    if (content != null) {
        await new Promise(r => setTimeout(r, 1500));
        reader.readAsDataURL(content); 
    }
}

function updateChildInfo(name, dob, gender, height, hobby, food){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../CHiM/controllers/updateChildInfo.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var params = 'name=' + encodeURIComponent(name) +
                 '&dob=' + encodeURIComponent(dob) +
                 '&gender=' + encodeURIComponent(gender) + 
                 '&height=' + encodeURIComponent(height) +
                 '&hobby=' + encodeURIComponent(hobby) +
                 '&food=' + encodeURIComponent(food);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status != 200) {
                alert("addMemory error");
            }
            else {
                const infoTableSpans = document.querySelectorAll('#pr-2col-table-info span');
                const lastSpan = document.getElementById('pr-last-info-item').querySelectorAll('span')[0];
                const childId = document.getElementById('pr-child-id');
                const childListName = document.getElementById('pr-child-span' + childId.textContent);
                let today = new Date();
                let dateDOB = new Date(dob);
                let years = today.getFullYear() - dateDOB.getFullYear();
                let months = today.getMonth() - dateDOB.getMonth();
                while(months < 0) {
                    years--;
                    months += 12;
                }
                let newDOBformat = dob[8] + dob[9] + '.' + dob[5] + dob[6] + '.' + dob[0] + dob[1] + dob[2] + dob[3];
                //alert(newDOBformat);
                childListName.textContent = name;
                infoTableSpans[1].textContent = name;
                infoTableSpans[3].textContent = newDOBformat;
                infoTableSpans[5].textContent = years + (years > 1 ? " years, " : " year, ") + months + (months > 1 ? " months" : "month"); 
                infoTableSpans[7].textContent = height + " cm.";
                infoTableSpans[9].textContent = food;
                infoTableSpans[11].textContent = gender;
                lastSpan.textContent = hobby;
                //console.log('yes');
            }
        }
        //alert("Reload successfully");
    };
    xhr.send(params);
}

function addNewFeedingRecord(weekday, time, text){
    //alert('fucntion called');
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../CHiM/controllers/addNewFeedingRecord.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var params = 'record-time=' + encodeURIComponent(time) + '&record-text=' + encodeURIComponent(text) + '&weekday=' + encodeURIComponent(weekday);
    //alert('params created');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status != 200) {
                alert(xhr.responseText);
            }
            //else alert(xhr.responseText);
        }
    };
    xhr.send(params);
}

function addNewSleepingRecord(weekday, startTime, endTime, text){
    //alert('fucntion called');
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../CHiM/controllers/addNewSleepingRecord.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var params = 'start-time=' + encodeURIComponent(startTime) + '&end-time=' + encodeURIComponent(endTime) + '&record-text=' + encodeURIComponent(text) + '&weekday=' + encodeURIComponent(weekday);
    //alert('params created');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status != 200) {
                alert(xhr.responseText);
            }
            //else alert(xhr.responseText);
        }
    };
    xhr.send(params);
}

function updateHTMLFeedingRecordList(recordList, weekday) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../CHiM/controllers/getUpdatedHtmlFeedingRecordList.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var param = 'weekday=' + encodeURIComponent(weekday);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status != 200) {
                alert(xhr.responseText);
            }
            else {
                //alert(xhr.responseText);
                //document.querySelector('#pr-feeding-schedule #pr-' + weekday + ' .pr-schedule-records').style.display = 'none';
                recordList.innerHTML = xhr.responseText;
            }
        }
    };
    xhr.send(param);
}

function updateHTMLSleepingRecordList(recordList, weekday) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../CHiM/controllers/getUpdatedHtmlSleepingRecordList.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var param = 'weekday=' + encodeURIComponent(weekday);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status != 200) {
                alert(xhr.responseText);
            }
            else {
                //alert(xhr.responseText);
                //document.querySelector('#pr-feeding-schedule #pr-' + weekday + ' .pr-schedule-records').style.display = 'none';
                recordList.innerHTML = xhr.responseText;
            }
        }
    };
    xhr.send(param);
}

function removeNewFeedingRecordInput(weekday){
    const newRecord = document.querySelector('#pr-feeding-schedule #pr-' + weekday + ' .pr-new-record');
    newRecord.reset();
    newRecord.style.display = 'none';
}

function removeNewSleepingRecordInput(weekday){
    const newRecord = document.querySelector('#pr-sleeping-schedule #pr-' + weekday + ' .pr-new-record');
    newRecord.reset();
    newRecord.style.display = 'none';
}

function deleteFeedingRecord(weekday, recordId){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../CHiM/controllers/deleteFeedingRecord.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var param = 'id=' + encodeURIComponent(recordId);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status != 200) {
                alert(xhr.responseText);
            }
            else {
                updateHTMLFeedingRecordList(document.querySelector('#pr-feeding-schedule #pr-' + weekday + ' .pr-schedule-records'), weekday);
            }
        }
    };
    xhr.send(param);
}

function deleteSleepingRecord(weekday, recordId){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../CHiM/controllers/deleteSleepingRecord.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var param = 'id=' + encodeURIComponent(recordId);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status != 200) {
                alert(xhr.responseText);
            }
            else {
                updateHTMLSleepingRecordList(document.querySelector('#pr-sleeping-schedule #pr-' + weekday + ' .pr-schedule-records'), weekday);
            }
        }
    };
    xhr.send(param);
}