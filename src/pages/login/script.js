function onLoginClick() {
  console.log("testing");
  // get username from id username
  const username = document.getElementById("username").value;
  // get password from id password
  const password = document.getElementById("password").value;

  if (username === "" || password === "") {
    document.getElementById("status").innerHTML = "Please fill all the field";
    return;
  }

  POST_API("../../api/auth/login.php", null, { username, password }, (status, data) => {
    if (status === 200) {
      // if status is 200, redirect to index.html
      console.log("data: " + data);
      document.getElementById("status").innerHTML = data;
    } else {
      // else, show error message
      document.getElementById("status").innerHTML = data.error;
    }
  });
}
