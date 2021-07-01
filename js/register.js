// function check the emails and passwords
function register() {
    checkEmail();
    checkPassword();

// verify if emails and password are the same
    if(checkEmail() == true && checkPassword() == true)
        return true; // submit
    else return false; // don't submit
}

// function to check the emails
function checkEmail(){
    const emailUp = document.getElementById("emailUp").value;
    const confirmEmailUp = document.getElementById("confirmEmailUp").value;

    if (emailUp != confirmEmailUp) {
        visible("errorConfirmEmail", "emailFas");
        return false; // don't submit
    }

    else if(emailUp == confirmEmailUp){
        hidden("errorConfirmEmail", "emailFas");
        return true; // submit
    }
}

// function to check the passwords
function checkPassword(){
    const passwordUp = document.getElementById("passwordUp").value;
    const confirmPasswordUp = document.getElementById("confirmPasswordUp").value;

    if (passwordUp != confirmPasswordUp) {
        visible("errorConfirmPassword", "passwordFas");
        return false; // don't submit
    }

    else if(passwordUp == confirmPasswordUp){
        hidden("errorConfirmPassword", "passwordFas");
        return true; // submit
    }
}

// function to set the message visible with two parameters
function visible(error, fas){
    const small = document.getElementById(error);
    const i = document.getElementById(fas);
    small.style.visibility = "visible";
    i.style.visibility = "visible";
}

// function to set the message visible with two parameters
function hidden(error, fas){
    const small = document.getElementById(error);
    const i = document.getElementById(fas);
    small.style.visibility = "hidden";
    i.style.visibility = "hidden";
}


