LOAD_COMPONENT(
    {
    name: "albumCard",
    args: {
        id: 1,
        album_title: "Informatika Berjiwa Kesatria STI JUGA",
        singer: "Dimas",
        year: "2022",
        genre: "pop",
        img: "https://picsum.photos/230",
        on_click: "albumCardOnClick",
    },
    },
    (status, data) => {
    if (status === 200) {
        document.getElementById("albums").innerHTML += data;
    }
    }
);
LOAD_COMPONENT(
    {
    name: "albumCard",
    args: {
        id: 2,
        album_title: "Berjiwa",
        singer: "Dimas",
        year: "2022",
        genre: "pop",
        img: "https://picsum.photos/230",
        on_click: "albumCardOnClick",
    },
    },
    (status, data) => {
    if (status === 200) {
        document.getElementById("albums").innerHTML += data;
    }
    }
);
LOAD_COMPONENT(
    {
    name: "albumCard",
    args: {
        id: 1,
        album_title: "Kesatria",
        singer: "Dimas",
        year: "2022",
        genre: "pop",
        img: "https://picsum.photos/230",
        on_click: "albumCardOnClick",
    },
    },
    (status, data) => {
    if (status === 200) {
        document.getElementById("albums").innerHTML += data;
    }
    }
);

// update card style
let previd = null;
albumCardOnClick = (id) => {
if (previd != null) {
    document.getElementById("album-card-" + previd).classList.remove("selected-album");
}
document.getElementById("album-card-" + id).classList.add("selected-album");
console.log("selected id " + id);
previd = id;
};