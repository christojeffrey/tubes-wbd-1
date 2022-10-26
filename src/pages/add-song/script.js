// get album list from backend to display album title and singer in dropdown
const getAlbumList = () => {
    GET_API('../../api/album/getAlbumList.php?with_song=false&get_all=true', token, (status, data) => {
        document.getElementById("album-id").innerHTML = "";
        if (status === 200) {
            // if success, render dropdown
            data["albums"].forEach(song => {
                let albumOption = document.createElement("option");
                albumOption.value = song.album_id;
                albumOption.innerHTML = song.album_title + " - " + song.singer;
                document.getElementById("album-id").appendChild(albumOption);
            });
        } 
        let albumOption = document.createElement("option");
        albumOption.value = null;
        albumOption.innerHTML = "None";
        document.getElementById("album-id").appendChild(albumOption);
    })
}

const getGenreList = () => {
    document.getElementById("genre").innerHTML = "";
    genre_list.forEach(genre => {
        let genreOption = document.createElement("option");
        genreOption.value = genre;
        genreOption.innerHTML = genre;
        document.getElementById("genre").appendChild(genreOption);
    });
}

const addSong = () => {
    const song_title = document.getElementById('song-title').value;
    const singer = document.getElementById('singer').value;
    const publish_date = document.getElementById('publish-date').value;
    const genre = document.getElementById('genre').value;
    const duration = 10;
    const album_id = document.getElementById('album-id').value;

    const unique_file_name = Date.now()

    var audio_file_name;
    const audio_files = document.getElementById('audio-file').files;
    if (audio_files.length > 0) {
        var formData = new FormData();
        const audio_file = audio_files[0];
        const auio_file_ext = audio_file.name.split('.').pop();

        formData.append('file', audio_file);
        audio_file_name = unique_file_name + "." + auio_file_ext

        UPLOAD_API('../../api/upload/fileUpload.php?type=audio&name=' +  audio_file_name, token, formData,  (status, data) => {
            if (status !== 200) {
                alert("error uploading audio");
                return;
            }
        })
    }

    var image_file_name;
    const image_files = document.getElementById('image-file').files;
    if (image_files.length > 0) {
        var formData = new FormData();
        const image_file = image_files[0];
        const image_file_ext = image_file.name.split('.').pop();

        formData.append("file", image_files[0]);
        image_file_name = unique_file_name + "." + image_file_ext

        UPLOAD_API('../../api/upload/fileUpload.php?type=image&name=' + image_file_name, token, formData,(status, data) => {
            if (status !== 200) {
                alert("error uploading image");
                return;
            }
        })
    }

    const body = {
        "song_title": song_title,
        "singer": singer,
        "publish_date": publish_date,
        "genre": genre,
        "audio_path": audio_file_name,
        "image_path": image_file_name,
        "duration": duration,
        "album_id": album_id
    }

    POST_API('../../api/song/addSong.php', token, body, formData, (status, data) => {
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


checkTokenOnPageLoad(true);
const token = localStorage.getItem("user_token") || localStorage.getItem("admin_token");
LOAD_NAVBAR();
LOAD_ACCOUNT_INFO();
getAlbumList();
getGenreList();