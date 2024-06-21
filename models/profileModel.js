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

async function addMemory(content, description, important){
    const reader = new FileReader();
    
    reader.addEventListener("load", () => {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../CHiM/controllers/addNewMemory.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        var params = 'description=' + encodeURIComponent(description) + '&important=' + encodeURIComponent(important ? 1 : 0) + '&content=' + encodeURIComponent(reader.result);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                if (xhr.status != 200) {
                    alert("addMemory error");
                }
                else {
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
                let today = new Date();
                let dateDOB = new Date(dob);
                let years = today.getFullYear() - dateDOB.getFullYear();
                let months = today.getMonth() - dateDOB.getMonth();
                let newDOBformat = dob[8] + dob[9] + '.' + dob[5] + dob[6] + '.' + dob[0] + dob[1] + dob[2] + dob[3];
                //alert(newDOBformat);
                infoTableSpans[1].textContent = name;
                infoTableSpans[3].textContent = newDOBformat;
                infoTableSpans[5].textContent = years + (years > 1 ? " years, " : " year, ") + months + (months > 1 ? " months" : "month"); 
                infoTableSpans[7].textContent = height;
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