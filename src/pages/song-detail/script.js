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

// get song id from query
const urlParams = new URLSearchParams(window.location.search);
const song_id = urlParams.get("song_id");

const token = localStorage.getItem("user_token") || localStorage.getItem("admin_token");
// load song detail from getSongDetail
GET_API(`../../api/song/getSongDetail.php?song_id=${song_id}`, token, (status, data) => {
  if (status === 200) {
    // set song title
    document.getElementById("song-title").innerText = data.song_title;
    // set song singer
    document.getElementById("singer").innerText = data.singer;
    // set song publish date
    document.getElementById("publish-date").innerText = data.publish_date;
    // set song genre
    document.getElementById("genre").innerText = data.genre;

    // load song player
    LOAD_COMPONENT(
      {
        name: "player",
        args: {
          id: song_id,
          title: data.song_title,
          singer: data.singer,
          audio_path: "../../assets/song-audio/" + data.audio_path,
          img: "../../assets/song-image/" + data.image_path,
        },
      },
      (status, data) => {
        if (status === 200) {
          document.getElementById("player").innerHTML = data;
        }
      }
    );
  }
});
