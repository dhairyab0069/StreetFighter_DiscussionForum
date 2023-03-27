document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form[name='MyForm']");
  const usernameInput = form.querySelector("input#username");
  const passwordInput = form.querySelector("input#password");

  form.addEventListener("submit", function (event) {
    event.preventDefault(); // prevent the form from submitting

    // validate the username and password fields
    const username = usernameInput.value.trim();
    const password = passwordInput.value.trim();

    let isValid = true;
    let errorMessage = "";

    // validate the username.
    if (!/^[a-zA-Z0-9]{3,8}$/.test(username)) {
      errorMessage +=
        "Username must be between 3-8 characters and alpha numeric. "; //error message
      isValid = false; // Password is not valid
    }

    // validate the password
    if (!/^{3,10}$/.test(password)) {
      errorMessage += "Password must be between 3-10 characters. "; //error message
      isValid = false; // Password is not valid
    }

    if (!isValid) {
      // display the error message
      alert(errorMessage);
    } else {
      // submit the form
      form.submit();
    }
  });
});
