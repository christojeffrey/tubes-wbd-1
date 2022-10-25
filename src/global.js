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

function LOAD_COMPONENT(jsonBodyData, callbackfn) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../../api/echoComponent.php", true);

  xhr.onerror = (e) => {
    console.error(xhr.statusText);
    callbackfn(500, xhr.statusText);
  };
  xhr.ontimeout = () => {
    console.error(`The request timed out.`);
    callbackfn(500, "The request timed out.");
  };
  xhr.timeout = TIMEOUT_TIME;

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4) {
      callbackfn(xhr.status, xhr.responseText);
    }
  };
  xhr.send(JSON.stringify(jsonBodyData));
}

// navbar function. option 1, created globally, option two, passed by each page who called it. because navbar is used by almost all page, i think creating it globally is the better option
function onLogout() {
  // clear user_token, admin_token, username, from local storage
  localStorage.removeItem("user_token");
  localStorage.removeItem("admin_token");
  localStorage.removeItem("username");
  // redirect to login
  window.location.href = "../login";
}

// function that is called when the page with admin token is loaded
// give alert and route to home if the user is not authenticated
// return token and isadmin if the user is authenticated
function checkTokenOnPageLoad(isCheckAdmin) {
  let token;
  if (isCheckAdmin) {
    if (!localStorage.getItem("admin_token")) {
      window.location.href = "../home";
      alert("You are not authorized to access this page");
      return;
    }  else {
      token = localStorage.getItem("admin_token");
    }
  } else {
    if (!localStorage.getItem("user_token")) {
      window.location.href = "../home";
      alert("You are not authorized to access this page");
      return;
    } else {
      token = localStorage.getItem("user_token");
    }
  }

  // call api to check if token is valid
  GET_API('../../api/auth/checkToken.php', token, (status, data) => {
    if (status != 200) {
      // token is invalid
      window.location.href = "../home";
      alert("You are not authorized to access this page");
    }
  });
}

function LOAD_NAVBAR() {
  LOAD_COMPONENT(
    {
      name: "navbar",
      args: {
        is_admin: localStorage.getItem("admin_token") ? true : false,
        is_logged_in: localStorage.getItem("user_token") || localStorage.getItem("admin_token") ? true : false,
      },
    },
    (status, data) => {
      if (status === 200) {
        document.getElementById("navbar").innerHTML = data;
      }
    }
  );
}

function LOAD_ACCOUNT_INFO() {
  LOAD_COMPONENT(
    {
      name: "accountInfo",
      args: {
        username: localStorage.getItem("username"),
      },
    },
    (status, data) => {
      if (status === 200) {
        document.getElementById("account-info").innerHTML = data;
      }
    }
  );
}