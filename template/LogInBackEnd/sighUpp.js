console.log("jajajaj");
const validation2 = new JustValidate("#signUp2");

console.log(validation2);
validation2
.addField("#name2", [
    {
      rule: "required",
      errorMessage: "Please enter a name",
      getMessage: () => {
        return {
          message: "Please enter a NAME",
          class: "just-validate-error",
        };
      }

    }
  ])

  .addField("#email2", [
    {
        rule: "required"
    },
    {
        rule: "email"
    },
    {
        validator: (value) => () => {
            return fetch("./LogInBackEnd/email-Validation.php?email=" + encodeURIComponent(value))
                   .then(function(response) {
                       return response.json();
                   })
                   .then(function(json) {
                       return json.available;
                   });
        },
        errorMessage: "email already taken"
    }
])

.addField("#password2", [
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
    document.getElementById("signUp2").submit();
  });