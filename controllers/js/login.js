var emailRequiered = false;
var emailFormat = false;
var passwordRequiered = false;
var minPassLength = false;
var passCheckPassed = false;


document.querySelector('#login-button').addEventListener('click', function(event) {
    event.preventDefault();
    const loginbox = document.getElementById('loginbox');
    const loginButton = document.getElementById('login-button');
    const notRegisteredYet = document.getElementById('register');
    var email = document.querySelector('.user-name-input');
    var password = document.querySelector('.user-password-input');
    var emailError = document.querySelector('#login-email-error');
    var passError = document.querySelector('#login-password-error');
    var valid = true;

    passError.textContent = "";
    emailError.textContent = "";

    if (!email.value.trim()) {
        emailError.textContent = "Email is required";
        if(!emailRequiered){
            loginbox.style.height = (loginbox.clientHeight + 16) + "px";
            loginButton.style.marginTop = (parseInt(window.getComputedStyle(loginButton).marginTop) + 16) + "px";
            notRegisteredYet.style.marginTop = (parseInt(window.getComputedStyle(notRegisteredYet).marginTop) + 16) + "px";
            emailRequiered = true;
        }
        valid = false;
    } else if (!isEmailValid(email.value.trim())) {
        emailError.textContent = "Invalid email format";
        if(!passwordRequiered){
            loginButton.style.marginTop = (parseInt(window.getComputedStyle(loginButton).marginTop) + 16) + "px";
            notRegisteredYet.style.marginTop = (parseInt(window.getComputedStyle(notRegisteredYet).marginTop) + 16) + "px";
            loginbox.style.height = (loginbox.clientHeight + 16) + "px";
            emailFormat = true;
        }
        valid = false;
    }

    var passwordCheck = isPasswordValid(password.value.trim());
    if (!password.value.trim()) {
        passError.textContent = "Password is required";
        if(!passwordRequiered){
            loginButton.style.marginTop = (parseInt(window.getComputedStyle(loginButton).marginTop) + 16) + "px";
            notRegisteredYet.style.marginTop = (parseInt(window.getComputedStyle(notRegisteredYet).marginTop) + 16) + "px";
            loginbox.style.height = (loginbox.clientHeight + 16) + "px";
            passwordRequiered = true;
        }
        valid = false;
    } else if (password.value.length < 8) {
        if(!minPassLength){
            loginButton.style.marginTop = (parseInt(window.getComputedStyle(loginButton).marginTop) + 16) + "px";
            notRegisteredYet.style.marginTop = (parseInt(window.getComputedStyle(notRegisteredYet).marginTop) + 16) + "px";
            loginbox.style.height = (loginbox.clientHeight + 16) + "px";
            minPassLength = true;
        }
        passError.textContent = "Password must be minimum 8 characters long";
        valid = false;
    } else if (passwordCheck) {
        if(!passCheckPassed){
            loginbox.style.height = (loginbox.clientHeight + 64) + "px";
            loginButton.style.marginTop = (parseInt(window.getComputedStyle(loginButton).marginTop) + 64) + "px";
            notRegisteredYet.style.marginTop = (parseInt(window.getComputedStyle(notRegisteredYet).marginTop) + 64) + "px";
            passCheckPassed = true;
        }passError.textContent = passwordCheck;
        valid = false;
    }

    if (valid) {
        document.querySelector('#login-form').submit();
    }
});


function isEmailValid(email) {
    var regex = /^[a-z0-9A-Z._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
    return regex.test(email);
}

function isPasswordValid(password) {
    var errorMsg = "Password must contain at least one lowercase character.\nPassword must contain at least one uppercase character.\nPassword must contain at least one number.\nPassword must contain at least one special character."
    var specialChars = "!@#$%^&*()-_=+][|}{';\":/?.>,<\\";

    var hasLowerCase = false;
    var hasUpperCase = false;
    var hasNumber = false;
    var hasSpecialChar = false;

    for (var i = 0; i < password.length; i++) {
        var character = password.charAt(i);
        if (!hasLowerCase && /[a-z]/.test(character)) {
            hasLowerCase = true;
            errorMsg = errorMsg.replace("Password must contain at least one lowercase character.\n", "✓ Password must contain at least one lowercase character.\n");
        } else if (!hasUpperCase && /[A-Z]/.test(character)) {
            hasUpperCase = true;
            errorMsg = errorMsg.replace("Password must contain at least one uppercase character.\n", "✓ Password must contain at least one uppercase character.\n");
        } else if (!hasNumber && /[0-9]/.test(character)) {
            hasNumber = true;
            errorMsg = errorMsg.replace("Password must contain at least one number.\n", "✓ Password must contain at least one number.\n");
        } else if (!hasSpecialChar && specialChars.includes(character)) {
            hasSpecialChar = true;
            errorMsg = errorMsg.replace("Password must contain at least one special character.", "✓ Password must contain at least one special character.");
        }
    }
    return errorMsg;
}