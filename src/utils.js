// a place for js function that can be used accross the app by importing them

// callback function for the API have two args: status and data
function GET_API(apiLoc, callbackfn) {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", apiLoc, true);
  console.log("ready");
  xhr.onload = (e) => {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        console.log(xhr.responseText);
        callbackfn(xhr.status, xhr.responseText);
      } else {
        console.error(xhr.statusText);
      }
    }
  };
  xhr.onerror = (e) => {
    console.error(xhr.statusText);
  };
  xhr.ontimeout = () => {
    console.error(`The request timed out.`);
  };
  xhr.timeout = 10000;
  // xhr.onreadystatechange = function () {
  //   console.log("onreadystatechange", xhr.readyState);
  //   if (xhr.readyState == 4) {
  //     console.log("xhr.status", xhr.status);
  //     if (xhr.status === 200) {
  //       callbackfn(xhr.status, xhr.responseText);
  //     }
  //   }
  // };
  xhr.send();
}
