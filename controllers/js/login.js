document.querySelector('#login-button').addEventListener('click', function(event) {
    event.preventDefault();
    var email = document.querySelector('.user-name-input');
    var password = document.querySelector('.user-password-input');
    var emailError = document.querySelector('#login-email-error');
    var passError = document.querySelector('#login-password-error');
    
    var valid = true;

    passError.textContent = "";
    emailError.textContent = "";

    if (!email.value.trim()) {
        emailError.textContent = "Email is required";
        wrongInputAnimation(email);
        valid = false;
    } else if (!isEmailValid(email.value.trim())) {
        emailError.textContent = "Invalid email format";
        wrongInputAnimation(email);
        valid = false;
    }

    if (!password.value.trim()) {
        passError.textContent = "Password is required";
        wrongInputAnimation(password);
        valid = false;
    } else if (password.value.length < 8) {
        passError.textContent = "Password must be minimum 8 characters long";
        wrongInputAnimation(password);
        valid = false;
    }

    if (valid) {
        document.querySelector('#login-form').submit();
    }
});

document.addEventListener('DOMContentLoaded', function() {
    if (failedLoginAttempt) {
        var emailError = document.querySelector('#login-email-error');
        var passError = document.querySelector('#login-password-error');
        emailError.textContent = failedLoginAttempt;
        passError.textContent = failedLoginAttempt;
    }
});

function isEmailValid(email) {
    var regex = /^[a-z0-9A-Z._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
    return regex.test(email);
}

function wrongInputAnimation(input){
    input.classList.toggle('pr-wrong-input');
    setTimeout(function(){input.classList.toggle("pr-wrong-input"); input.style.color = "";}, 1000);
}