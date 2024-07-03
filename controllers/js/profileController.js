document.getElementById('user-search').addEventListener('input', function () {
    var searchQuery = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'controllers/search_users.php?query=' + encodeURIComponent(searchQuery), true);
    xhr.onreadystatechange = function () {
        console.log("Ready State:", xhr.readyState);
        console.log("Status:", xhr.status);
        console.log("Response Text:", xhr.responseText);

        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    var userUl = document.getElementById('user-list-ul');
                    userUl.innerHTML = '';
                    response.users.forEach(function (user) {
                        var li = document.createElement('li');
                        li.textContent = user.email;
                        li.setAttribute('onclick', 'selectUser(' + user.id + ')');
                        userUl.appendChild(li);
                    });
                } catch (e) {
                    console.error("Error parsing JSON:", e);
                }
            } else {
                console.error("Error with request:", xhr.statusText);
            }
        }
    };
    xhr.send();
});

document.addEventListener('DOMContentLoaded', function () {
    fetchUsers('', 0);
});

let currentPage = 0;
const usersPerPage = 5;

document.getElementById('user-search').addEventListener('input', function () {
    currentPage = 0;
    fetchUsers(this.value, currentPage);
});

document.getElementById('prev-page').addEventListener('click', function () {
    if (currentPage > 0) {
        currentPage--;
        fetchUsers(document.getElementById('user-search').value, currentPage);
    }
});

document.getElementById('next-page').addEventListener('click', function () {
    currentPage++;
    fetchUsers(document.getElementById('user-search').value, currentPage);
});

function fetchUsers(query, page) {
    const offset = page * usersPerPage;
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `controllers/search_users.php?query=${encodeURIComponent(query)}&limit=${usersPerPage}&offset=${offset}`, true);
    xhr.onreadystatechange = function () {

        if (xhr.readyState === 4 && xhr.status === 200) {
            try {
                const response = JSON.parse(xhr.responseText);
                const userUl = document.getElementById('user-list-ul');
                userUl.innerHTML = '';
                response.users.forEach(function (user) {
                    const li = document.createElement('li');
                    li.innerHTML = `
                        ${user.email}
                        <button onclick="selectUser(${user.id})">Select</button>
                        <button onclick="deleteUser(${user.id})">Delete</button>
                    `;
                    userUl.appendChild(li);
                });
            } catch (e) {
                console.error("Error parsing JSON:", e);
            }
        }
    };
    xhr.send();
}

function selectUser(userId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "controllers/update_session.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.status === 'success') {
                location.reload(); // Reload the page to reflect changes
            } else {
                alert(response.message);
            }
        }
    };
    xhr.send("userId=" + userId);
}

function deleteUser(userId) {
    if (confirm("Are you sure you want to delete this user? This action cannot be undone.")) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "controllers/delete_user.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    alert("User deleted successfully.");
                    location.reload(); // Reload the page to reflect changes
                } else {
                    alert(response.message);
                }
            }
        };
        xhr.send("userId=" + userId);
    }
}

function deleteChild(childId) {
    if (confirm("Are you sure you want to delete this child? This action cannot be undone.")) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "/CHiM/controllers/delete_child.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        console.log("Response JSON:", response);
                        if (response.status === 'success') {
                            alert("Child deleted successfully.");
                            location.reload(); // Reload the page to reflect changes
                        } else {
                            alert(response.message);
                        }
                    } catch (e) {
                        console.error("Error parsing JSON:", e);
                    }
                } else {
                    console.error("Error with request:", xhr.statusText);
                }
            }
        };
        xhr.send("childId=" + childId);
    }
}

function deleteMemory(memoryId) {
    if (confirm("Are you sure you want to delete this memory? This action cannot be undone.")) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "/CHiM/controllers/delete_memory.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        console.log("Response JSON:", response);
                        if (response.status === 'success') {
                            alert("Memory deleted successfully.");
                            location.reload(); // Reload the page to reflect changes
                        } else {
                            alert(response.message);
                        }
                    } catch (e) {
                        console.error("Error parsing JSON:", e);
                    }
                } else {
                    console.error("Error with request:", xhr.statusText);
                }
            }
        };
        xhr.send("memoryId=" + memoryId);
    }
}