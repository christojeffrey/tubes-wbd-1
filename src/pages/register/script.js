// if no update email in 2 seconds, do checkEmail
let timer = setTimeout(checkEmail, 2000);

function checkEmail() {
  POST_API("../../api/auth/checkIsEmailUniqueForRegister.php", null, { email: document.getElementById("email").value }, (status, data) => {
    if (status === 200) {
      console.log("data: " + data);
      document.getElementById("emailStatus").innerHTML = data.is_unique ? "Email is unique" : "Email is not unique";
    } else {
      // else, show error message
      document.getElementById("emailStatus").innerHTML = data.error;
    }
  });
}

function updateEmail() {
  // reset timer back to 2 seconds
  clearTimeout(timer);
  timer = setTimeout(checkEmail, 2000);
  //   set emailStatus as waiting
  document.getElementById("emailStatus").innerHTML = "waiting changes";
}
