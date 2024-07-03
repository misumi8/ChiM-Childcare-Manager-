document.addEventListener("DOMContentLoaded", function () {
    var menuLinks = document.querySelectorAll(".menu-link");
    menuLinks.forEach(function (link) {
        link.addEventListener("click", function (event) {
            var href = this.getAttribute("href"); // Get the link's href

            // Make an AJAX request to update the session
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../CHiM/controllers/setUserSession.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.status === 'success') {
                        window.location.href = href; // Redirect to the link after session update
                    } else {
                        alert(response.message);
                    }
                }
            };
            xhr.send();

            // Instead of preventing the default behavior,
            // stop the event propagation to prevent the default navigation
            // and handle navigation manually on AJAX success.
            event.stopPropagation();
        });
    });
});
