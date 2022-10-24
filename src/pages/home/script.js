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
                    img: song.image_path,
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

    fetchSongs()