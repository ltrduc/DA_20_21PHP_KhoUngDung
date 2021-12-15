// Ex1
function validation() {
    let fullnameFiled = document.getElementById('fullname');
    let usernameFiled = document.getElementById('username');
    let passwordFile = document.getElementById('password');
    let repasswordFile = document.getElementById('repassword');
    let errorFiled = document.getElementById('errorMessage');

    let fullname = fullnameFiled.value;
    let username = usernameFiled.value;
    let password = passwordFile.value;
    let repassword = repasswordFile.value;

    if (fullname === "") {
        errorFiled.innerHTML = "Please enter your fullname";
        fullnameFiled.focus();
        return false;
    } else if (username === "") {
        errorFiled.innerHTML = "Please enter your username";
        usernameFiled.focus();
        return false;
    } else if (password === "") {
        errorFiled.innerHTML = "Please enter your password";
        passwordFile.focus();
        return false;
    } else if (password.length < 6) {
        console.log("Your password must contain at least 6 characters.");
        errorFiled.innerHTML = "Your password must contain at least 6 characters";
        passwordFile.focus();
        return false;
    } else if (repassword !== password) {
        errorFiled.innerHTML = "Your password is wrong";
        repasswordFile.focus();
        return false;
    }

    return true;
}

function clearErrorMessage() {
    let errorFiled = document.getElementById('errorMessage').innerHTML = "";
}