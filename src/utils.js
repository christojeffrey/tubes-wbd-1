// a place for js function that can be used accross the app by importing them

// callback function for the API have two args: status and data
function GET_API(apiLoc, callbackfn) {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", apiLoc, true);
  console.log("ready");

  xhr.onerror = (e) => {
    console.error(xhr.statusText);
    callbackfn(500, xhr.statusText);
  };
  xhr.ontimeout = () => {
    console.error(`The request timed out.`);
    callbackfn(500, "The request timed out.");
  };
  xhr.timeout = 10000;

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4) {
      callbackfn(xhr.status, xhr.responseText);
    }
  };
  xhr.send();
}

function POST_API(apiLoc, jsonBodyData, callbackfn) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", apiLoc, true);
  xhr.setRequestHeader("Content-Type", "application/json");
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
  xhr.send(JSON.stringify(jsonBodyData));
}
