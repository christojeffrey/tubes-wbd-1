checkTokenOnPageLoad(true);
const token = localStorage.getItem("user_token") || localStorage.getItem("admin_token");
LOAD_NAVBAR();
LOAD_ACCOUNT_INFO();
getAlbumList();

// get album list from backend to display album title and singer in dropdown
const getAlbumList = () => {
    GET_API('../../api/album/getAlbumList.php?with_song=false&get_all=true', token, (status, data) => {
        if (status === 200) {
            // if success, render dropdown
            document.getElementById("album-id").innerHTML = "";
            data["albums"].forEach(song => {
                let albumOption = document.createElement("option");
                albumOption.value = song.album_id;
                albumOption.innerHTML = song.album_title + " - " + song.singer;
                document.getElementById("album-id").appendChild(albumOption);
            });
        } else {
            // else, show error message
            document.getElementById('albumStatus').innerHTML = data.error;
        }
    })
}

const addSong = () => {
    const song_title = document.getElementById('song-title').value;
    const singer = document.getElementById('singer').value;
    const publish_date = document.getElementById('publish-date').value;
    const genre = document.getElementById('genre').value;
    const audio_path = "dummy.mp3";
    const image_path = "dummy.jpg";
    const duration = 10;
    const album_id = document.getElementById('album-id').value;
    console.log(album_id)
    const body = {
        "song_title": song_title,
        "singer": singer,
        "publish_date": publish_date,
        "genre": genre,
        "audio_path": audio_path,
        "image_path": image_path,
        "duration": duration,
        "album_id": album_id
    }

    console.log(body);
    POST_API('../../api/song/addSong.php', token, body, (status, data) => {
        if (status === 200) {
            // if success, show success message
            alert("success")
            // document.getElementById('add-song-form-container').reset();
        } else {
            // else, show error message
            alert("error")
        }
    });
}

