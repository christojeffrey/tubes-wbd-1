console.log("test");

for (let i = 0; i < 10; i++) {
  LOAD_COMPONENT(
    {
      name: "songCard",
      args: {
        id: i,
        title: "Song Title" + i,
        artist: "Artist Name" + i,
        img: "https://picsum.photos/200/300",
        on_click: "songCardOnClick",
      },
    },
    (status, data) => {
      if (status === 200) {
        document.getElementById("cards").innerHTML += data;
      }
    }
  );
}

// update card style
let previd = null;
songCardOnClick = (id) => {
  if (previd != null) {
    document.getElementById("song-card-" + previd).classList.remove("selected-song");
  }
  document.getElementById("song-card-" + id).classList.add("selected-song");
  console.log("selected id " + id);
  previd = id;
};
