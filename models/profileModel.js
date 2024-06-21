function changeChildImage(childId) {
    console.log(childId);
    const childPhoto = document.getElementById("pr-child-image");
    const childMenuPhoto = document.getElementById("pr-child-img-container" + childId);
    const file = document.getElementById("pr-photo").files[0];
    const reader = new FileReader();
    
    reader.addEventListener("load", () => {
        // convert image to base64 str
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
        };

        xhr.send(formData);
    });

    if (file) {// file was uploaded
        reader.readAsDataURL(file); 
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