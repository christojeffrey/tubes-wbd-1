
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