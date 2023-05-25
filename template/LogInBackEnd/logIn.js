console.log("Dav");
const validation = new JustValidate("#signUp");

console.log("namebitch");

var nameError = document.getElementById('name-error');
var emailError = document.getElementById('email-error');
var passwordError = document.getElementById('password-error');

validation
    .addField("#name", [
        {
            rule: "required",
            errorMessage: "Please enter a NAME",
            getMessage: () => {
                return {
                    message: "Please enter a NAME",
                    class: "just-validate-error",
                };
            }

        }
    ])

    .addField("#email", [
        {
            rule: "required",
            errorMessage: "&nbsp;&nbsp;Please enter an email",
        },
        {
            rule: "email",
            errorMessage: "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please enter a valid email",
        }
    ])

    .addField("#password", [
        {
            rule: "required",
            errorMessage: "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please enter a password",
        },
        {
            rule: "password",
            errorMessage: "Not valid Password",
            style: "color: blue",
            getMessage: () => {
                return {
                    message: "Numbers and special characters are required",
                    class: "just-validate-error",
                    style: "color: blue;" // Set the color to red
                };
            }
        }
    ])

    .onSuccess((event) => {
        document.getElementById("signUp").submit();
    });