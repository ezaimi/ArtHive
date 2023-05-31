const validation1 = new JustValidate("#log-Inn");
 var kot = null;
const lot = true

validation1
    .addField("#log_email1", [
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
                kot = value;
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

    .addField("#log_pass2", [
        {
            rule: "required",
            errorMessage: "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please enter a password",
        },
        {
            validator: (email) => {
              return () => {
                console.log(kot + " "+email)
                const url = "./LogInBackEnd/login-validation.php?email=" + encodeURIComponent(kot) + "&password=" + encodeURIComponent(email);
                console.log(url);
          
                return fetch(url)
                  .then(function(response) {
                    if (!response.ok) {
                      throw new Error("Network response was not ok");
                    }
                    return response.json();
                  })
                  .then(function(json) {
                    return json.available;
                  })
        
            }  
                  
            },
            errorMessage: "Invalid Password"
          }
    ])

    .onSuccess((event) => {
        document.getElementById("log-Inn").submit();
    });