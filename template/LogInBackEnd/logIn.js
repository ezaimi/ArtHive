const validation = new JustValidate("#signUp");

validation
     .addField("#name", [{
        rule: "required",
     }])

     .addField("#email", [
      {
         rule: "required",
         errorMessage: "Please enter a gmail"
      },
      {
         rule: "email",
         errorMessage: "Please Enter a valid gmail"
      }
   ])
      .addField("#password", [
         {
         rule: "required",
         errorMessage: "Please enter a password"
      },
      {
         rule: "password",
      }

   ])

   .onSuccess((event)=>{
document.getElementById("signUp").submit();
   })