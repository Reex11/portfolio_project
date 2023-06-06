console.log("form-validation.js loaded");

function validateForm() {

    let emailRegex = /\S+@\S+\.\S+/;

    let username = document.forms["register"]["username"].value;
    if (username == "") {
      alert("Username field cant be empty");
      return false;
    } else if (username.length < 5) {
      alert("Username must be at least 5 characters");
      return false;
    } else if (username.length > 20) {
        alert("Username must be less than 20 characters");
        return false;
    }
    let email = document.forms["register"]["email"].value;
    if (email == "") {
        alert("Email field cant be empty");
        return false;
    } else if (!emailRegex.test(email)) {
        alert("Email is not valid");
        return false;
    }
    let password = document.forms["register"]["password"].value;
    if (password == "") {
        alert("Password field cant be empty");
        return false;
    } else if (password.length < 8) {
        alert("Password must be at least 8 characters long");
        return false;
    }

  }