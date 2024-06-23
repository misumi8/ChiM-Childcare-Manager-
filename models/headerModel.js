function logOut(){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../CHiM/controllers/logOut.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status != 200) {
                alert(xhr.responseText);
            }
            //else alert(xhr.responseText);
        }
    };
    xhr.send();
}