// a place for js function that can be used accross the app by importing them

// ===CONSTANT===
const TIMEOUT_TIME = 10000;
const BASE_URL = "/../../";

// ===FUNCTION===

// callback function for the API have two args: status and respondData
// fill authHeader with the auth header if needed. if not, leave it empty or null
function GET_API(apiLoc, authHeader = null, callbackfn) {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", apiLoc, true);
  if (authHeader != null) {
    xhr.setRequestHeader("Authorization", authHeader);
  }

  xhr.onerror = (e) => {
    console.error(xhr.statusText);
    callbackfn(500, JSON.parse(xhr.statusText));
  };
  xhr.ontimeout = () => {
    console.error(`The request timed out.`);
    callbackfn(500, "The request timed out.");
  };
  xhr.timeout = TIMEOUT_TIME;

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4) {
      callbackfn(xhr.status, JSON.parse(xhr.responseText));
    }
  };
  xhr.send();
}

// use this function to do post. jsonBody is the body of the post request
// callback function for the API have two args: status and respondData
// fill authHeader with the auth header if needed. if not, leave it empty or null
function POST_API(apiLoc, authHeader = null, jsonBodyData, callbackfn) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", apiLoc, true);
  xhr.setRequestHeader("Content-Type", "application/json");
  if (authHeader != null) {
    xhr.setRequestHeader("Authorization", authHeader);
  }

  xhr.onload = (e) => {
    if (xhr.readyState === 4) {
      console.log(xhr.responseText);
      callbackfn(xhr.status, JSON.parse(xhr.responseText));
    }
  };
  xhr.onerror = (e) => {
    console.error(xhr.statusText);
  };
  xhr.ontimeout = () => {
    console.error(`The request timed out.`);
  };
  xhr.timeout = TIMEOUT_TIME;
  xhr.send(JSON.stringify(jsonBodyData));
}
