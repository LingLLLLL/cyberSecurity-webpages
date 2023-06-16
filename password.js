//check "Password must contain at least one lowercase letter, one uppercase letter, one digit, one special character, and be at least 8 characters long"
function validatePassword(password) {
  const passwordRegex =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
  return passwordRegex.test(password);
}

const passwordInput = document.getElementById("password");
const passwordError = document.getElementById("passwordError");

const pass = passwordInput.addEventListener("input", function () {
  if (!validatePassword(this.value)) {
    passwordError.textContent =
      "Password must contain at least one lowercase letter, one uppercase letter, one digit, one special character, and be at least 8 characters long";
  } else {
    passwordError.textContent = "";
  }
});

const form = document.querySelector("form");
//prevent form from submitting if password requirement not met
form.addEventListener("submit", function (e) {
  if (!validatePassword(passwordInput.value)) {
    e.preventDefault();
  }
});
