document.querySelector('#reg-register-button').addEventListener('click', function(event) {
    event.preventDefault();
    var email = document.querySelector('#reg-email');
    var password = document.querySelector('#reg-pass');
    var repeatPassword = document.querySelector('#reg-pass-repeat');
    var fname = document.querySelector('#reg-fname');
    var lname = document.querySelector('#reg-lname');
    var dob = document.querySelector('#reg-dob');

    var emailError = document.querySelector('#login-email-error');
    var passError = document.querySelector('#login-password-error');
    var repeatPassError = document.querySelector('#login-password-repeat-error');
    var lnameError = document.querySelector('#login-lname-error');
    var fnameError = document.querySelector('#login-fname-error');
    var dobError = document.querySelector('#login-dob-error');

    var valid = true;

    passError.textContent = "";
    repeatPassError.textContent = "";
    dobError.textContent = "";
    emailError.textContent = "";
    lnameError.textContent = "";
    fnameError.textContent = "";

    if (!fname.value.trim()) {
        fnameError.textContent = "First name is required";
        valid = false;
        wrongInputAnimation(fname);
    }

    if (!lname.value.trim()) {
        lnameError.textContent = "Last name is required";
        valid = false;
        wrongInputAnimation(lname);
    }

    if (dob.value.length <= 0) {
        dobError.textContent = "Date of birth is required";
        valid = false;
        wrongInputAnimation(dob);
    }
   
    if (!email.value.trim()) {
        emailError.textContent = "Email is required";
        valid = false;
        wrongInputAnimation(email);
    } else if (!isEmailValid(email.value.trim())) {
        emailError.textContent = "Invalid email format";
        valid = false;
        wrongInputAnimation(email);
    }

    var passwordCheck = isPasswordValid(password.value.trim());
    if (!password.value.trim()) {
        passError.textContent = "Password is required";
        valid = false;
        wrongInputAnimation(password);
    } else if (password.value.length < 8) {
        passError.textContent = "Password must be minimum 8 characters long";
        valid = false;
        wrongInputAnimation(password);
    } else if (passwordCheck) {
        passError.textContent = passwordCheck;
        valid = false;
        wrongInputAnimation(password);
    } else if (!(password.value.trim() === repeatPassword.value.trim())) {
        passError.textContent = "Passwords do not match";
        repeatPassError.textContent = "Passwords do not match";
        valid = false;
        wrongInputAnimation(password);
        wrongInputAnimation(repeatPassword);
    }

    if (!repeatPassword.value.trim()) {
        wrongInputAnimation(repeatPassword);
        repeatPassError.textContent = "Password is required";
        valid = false;
    }

    if (valid) {
        document.querySelector('#reg-login-form').submit();
    }
    else {
        repeatPassError.style.fontSize = "0.75rem";
        passError.style.fontSize = "0.75rem";
        emailError.style.fontSize = "0.75rem";
        dobError.style.fontSize = "0.75rem";
        lnameError.style.fontSize = "0.75rem";
        fnameError.style.fontSize = "0.75rem";
        // password = document.querySelector('#reg-pass');
        // repeatPassword = document.querySelector('#reg-pass-repeat');
        // fname = document.querySelector('#reg-fname');
        // lname = document.querySelector('#reg-lname');
        // dob        
        document.getElementById("reg-loginbox").style.height = "32.6rem";
    }
});

function wrongInputAnimation(input){
    input.classList.toggle('pr-wrong-input');
    setTimeout(function(){input.classList.toggle("pr-wrong-input"); input.style.color = "";}, 1000);
}

function isEmailValid(email) {
    var regex = /^[a-z0-9A-Z._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
    return regex.test(email);
}

function isPasswordValid(password) {
    var errorMsg = "Password must contain at least one lowercase character.\nPassword must contain at least one uppercase character.\nPassword must contain at least one number.\nPassword must contain at least one special character."
    var specialChars = "!@#$%^&*()-_=+][|}{';\":/?.>,<\\";

    var hasLowerCase = false;
    var hasUpperCase = false;
    //var hasNumber = false;
    var hasSpecialChar = false;

    for (var i = 0; i < password.length; i++) {
        var character = password.charAt(i);
        if (!hasLowerCase && /[a-z]/.test(character)) {
            hasLowerCase = true;
            //errorMsg = errorMsg.replace("Password must contain at least one lowercase character.\n", "");
        } else if (!hasUpperCase && /[A-Z]/.test(character)) {
            hasUpperCase = true;
            //errorMsg = errorMsg.replace("Password must contain at least one uppercase character.\n", "");
        } 
        // else if (!hasNumber && /[0-9]/.test(character)) {
        //     hasNumber = true;
        //     errorMsg = errorMsg.replace("Password must contain at least one number.\n", "");
        // } 
        else if (!hasSpecialChar && specialChars.includes(character)) {
            hasSpecialChar = true;
            //errorMsg = errorMsg.replace("Password must contain at least one special character.", "");
        }
    }
    if(!hasLowerCase)
        return "Password must contain at least one lowercase character.\n";
    else if (!hasUpperCase)
        return "Password must contain at least one uppercase character.\n";
    else if (!hasSpecialChar)
        return "Password must contain at least one special character.";
    else 
        return null;

}