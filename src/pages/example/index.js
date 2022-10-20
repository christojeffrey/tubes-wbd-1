// import { GET_API } from "./utils";

function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    GET_API("../../api/getexample.php?q=" + str, (status, data) => {
      console.log("status", status);
      if (status === 200) {
        document.getElementById("txtHint").innerHTML = data;
      } else {
        document.getElementById("txtHint").innerHTML = "Error: " + status;
      }
    });
  }
}
