console.log("hagjhdagfjdshsdfjdsaha");
const validation3 = new JustValidate("#LogInn");


validation3
  .addField("#email_log", [
    {
      rule: "required",
      errorMessage:"Please enter an email"
    },
    {
      rule: "email",
    },
    {
      validator: (value) => () => {
        return fetch(
          "./LogInBackEnd/logIn-email-Validation.php?email=" +
            encodeURIComponent(value)
        )
          .then(function (response) {
            return response.json();
          })
          .then(function (json) {
            return json.available;
          });
      },
      errorMessage: "Incoorect email",
    },
  ])

  .addField("#password_log", [
    {
      rule: "required",
      errorMessage:
        "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please enter a password",
    },
    {
      validator: (value) => () => {
        return fetch(
          "./LogInBackEnd/logIn-password-Validation.php?email=" +
            encodeURIComponent(value)
        )
          .then(function (response) {
            return response.json();
          })
          .then(function (json) {
            return json.available;
          });
      },
      errorMessage: "Incoorect password",
    }
  ])

  .onSuccess((event) => {
    document.getElementById("LogInn").submit();
  });
