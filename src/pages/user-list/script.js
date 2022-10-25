// load navbar
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

// load account info
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

// load user list
// admin_token is required
const token = localStorage.getItem("admin_token");
GET_API("../../api/auth/getAllUsers.php", token, (status, data) => {
  if (status === 200) {
    let user_list = document.getElementById("user-list");
    user_list.innerHTML = "";
    data.forEach((user) => {
      LOAD_COMPONENT(
        {
          name: "userCard",
          args: {
            id: `${user.user_id}`,
            username: `${user.username}`,
            email: `${user.email}`,
            is_admin: `${user.is_admin}`,
            name: `${user.name}`,
          },
        },
        (status, data) => {
          if (status === 200) {
            user_list.innerHTML += data;
          }
        }
      );
    });
  }
});
