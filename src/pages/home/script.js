const fetchSongs = () => {
    const urlParams = new URLSearchParams(window.location.search);
    const page = urlParams.get("page");
    const limit = urlParams.get("limit");

    GET_API(`../../api/song/getSongList.php?page=${page}&limit=${limit}`, null, (status, data) => {
        if (status === 200) {
        document.getElementById("cards").innerHTML = "";
        data.forEach((song) => {
            LOAD_COMPONENT(
            {
                name: "songCard",
                args: {
                    id: song.song_id,
                    title: song.song_title,
                    artist: song.singer,
                    audio_path: "../../assets/song-audio" + song.audio_path,
                    img: "../../assets/song-image" +song.image_path,
                    on_click: "songCardOnClick",
                },
            },
            (status, data) => {
                if (status === 200) {
                    document.getElementById("cards").innerHTML += data;
                }
            }
            );
        });
        }
    });
    }

// update card style
let previd = null;
const songCardOnClick = (id, title, singer, audio_path, img) => {
    if (previd != null) {
      document.getElementById("song-card-" + previd).classList.remove("selected-song");
    }
    document.getElementById("song-card-" + id).classList.add("selected-song");
    console.log("selected id " + id);
    previd = id;

            // $id, $song_title, $singer, $audio_path, $img

    LOAD_COMPONENT(
        {
          name: "player",
          args: {
            id: i,
            title: title,
            singer: singer,
            audio_path: audio_path,
            img: img,
          },
        },
        (status, data) => {
          if (status === 200) {
            document.getElementById("player-home").innerHTML += data;
          }
        }
      );
  };
fetchSongs()