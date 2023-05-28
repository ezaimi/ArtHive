console.log("Dav");
const validation1 = new JustValidate("#signUp-logIn");



validation1
    .addField("#log_email", [
        {
            rule: "required",
            errorMessage: "&nbsp;&nbsp;Please enter an email",
        },
        {
            rule: "email",
            errorMessage: "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please enter a valid email",
        },
        {
            validator: (value) => {
                return () => {
                    return fetch("./LogInBackEnd/email-loginvalidation.php?email=" + encodeURIComponent(value))
                        .then(function(response) {
                            return response.json();
                        })
                        .then(function(json) {
                            return !json.available;
                        });
                };
            },
            errorMessage: "Incorrect Gmail"
        }
        
    ])

    .addField("#log_pass", [
        {
            rule: "required",
            errorMessage: "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please enter a password",
        },
        {
            rule: "password",
            errorMessage: "Not valid Password",
        },
        {
            validator: (email, password) => {
                return () => {
                    const url = "./LogInBackEnd/login-validation.php?email=" + encodeURIComponent(email) + "&password=" + encodeURIComponent(password);
                    return fetch(url)
                        .then(function(response) {
                            return response.json();
                        })
                        .then(function(json) {
                            return json.available;
                        });
                };
            },
            errorMessage: "Invalid Password"
        }
    ])

    .onSuccess((event) => {
        document.getElementById("signUp-logIn").submit();
    });