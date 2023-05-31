console.log("Davidddddd");
const validation4 = new JustValidate("#log-Inn");
 var kot1 = null;
const lot1 = true

validation4
    .addField("#log_email2", [
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
                kot1 = value;
                return () => {
                    return fetch("./LogInBackEnd/email-validation11.php?email=" + encodeURIComponent(value))
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
                const url = "./LogInBackEnd/login-validation11.php?email=" + encodeURIComponent(kot1) + "&password=" + encodeURIComponent(email);
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