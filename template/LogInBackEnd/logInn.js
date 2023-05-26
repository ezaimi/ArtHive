
const validation = new JustValidate("#signUp");

console.log(validation);
validation
  .addField("#name", [
    {
      rule: "required",
      errorMessage: "Please enter a name",
      getMessage: () => {
        return {
          message: "Please enter a name",
          class: "just-validate-error",
        };
      },
    },
  ])

  .addField("#email", [
    {
      rule: "required",
    },
    {
      rule: "email",
    },
    {
      validator: (value) => () => {
        return fetch(
          "./LogInBackEnd/email-Validation.php?email=" +
            encodeURIComponent(value)
        )
          .then(function (response) {
            return response.json();
          })
          .then(function (json) {
            return json.available;
          });
      },
      errorMessage: "email already taken",
    },
  ])

  .addField("#password", [
    {
      rule: "required",
      errorMessage:
        "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please enter a password",
    },
    {
      rule: "password",
      errorMessage: "Not valid Password",
      style: "color: blue",
      getMessage: () => {
        return {
          message: "Numbers and special characters are required",
          class: "just-validate-error",
          style: "color: blue;", // Set the color to red
        };
      },
    },
  ])

  .onSuccess((event) => {
    document.getElementById("signUp").submit();
  });
