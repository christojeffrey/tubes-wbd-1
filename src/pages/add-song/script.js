const addSong = () => {
    const song_title = document.getElementById('song-title').value;
    const singer = document.getElementById('singer').value;
    const publish_date = document.getElementById('publish-date').value;
    const genre = document.getElementById('genre').value;
    const album_id = document.getElementById('album-id').value;

    const unique_file_name = Date.now()

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
                alert(data.error);
                return;
            }
        })
    }
    
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
                alert(data.error);
                return;
            } else {
                const audio = new Audio('../../assets/song-audio/' + audio_file_name);
                audio.onloadedmetadata = () => {
                    const duration = audio.duration;
                    
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
                };
            }
        })
    }




}


checkTokenOnPageLoad(true);
LOAD_NAVBAR();
LOAD_ACCOUNT_INFO();
getAlbumList();
getGenreList();