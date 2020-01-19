function checkSignUp () {
    //declare variables for all neccessary form elements
    var firstName = document.getElementById("regFN");
    var lastName = document.getElementById("regLN");
    var phone = document.getElementById("regPN");
    var password1 = document.getElementById("regPW1");
    var password2 = document.getElementById("regPW2");
    var email = document.getElementById("regEM");
    var phonePattern = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/; //RegEx for phone numbers found on https://stackoverflow.com/questions/4338267/validate-phone-number-with-javascript
    var emailPattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;   //RegEx for email found on https://stackoverflow.com/questions/46155/how-to-validate-an-email-address-in-javascript    
    //validate first name != null
    if (firstName.value == "") {
        alert("First name cannot be empty");
        return false;
    }
    //validate last name != null
    if (lastName.value == "") {
        alert("Last name cannot be empty");
        return false;
    }
    //if they enter something into phone number it must match the regular expression from above
    if (phone.value !== "") {
        if (phone.value.match(phonePattern)) {
        } else {
            alert("Please enter a correct phone number");
            return false;
        }
    }
    //check if passwords match
    if (password1.value !== password2.value) {
        alert("Passwords do not match");
        return false;
    }
    //check if date is formatted as dd/mm/yyyy
    if (!(email.value.toLowerCase().match(emailPattern))) {
        alert("Email not in correct format");
        return false;
    }

    return true;
}