// import { GET_API } from "./utils";

function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    GET_API("../../api/getexample.php?q=" + str, null, (status, data) => {
      console.log("status", status);
      if (status === 200) {
        document.getElementById("txtHint").innerHTML = data;
      } else {
        document.getElementById("txtHint").innerHTML = "Error: " + status;
      }
    });
  }
}

function doPost() {
  let jsonBody = { name: "John", age: "21" };
  POST_API("../../api/postexample.php", null, jsonBody, (status, data) => {
    console.log("status", status);
    if (status === 200) {
      document.getElementById("postResult").innerHTML = data;
    } else {
      document.getElementById("postResult").innerHTML = "Error: " + status;
    }
  });
}
