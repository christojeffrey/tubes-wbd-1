# Description

a copy of spotify. build using vanilla PHP, js, html and css. implement login and register, differentiating admin and user(and 'user' who does not logged in), pagination, and search.

# Requirements

1. docker, docker desktop would be the easiest way to get started
2. docker-compose

# Installation

## setup Repo

we're going to use github and gitlab informatika as our remote git repository. We use github as a backup, and assuming that it's more reliable that gitlab informatika(and it's recommended by the assitant)

here is how to setup the repo

```powershell
git clone git@github.com:christojeffrey/tubes-wbd-1.git
cd .\tubes-wbd-1\
git remote set-url origin --push --add git@gitlab.informatika.org:if3110-2022-k01-01-26/tugas-besar-1.git
git remote set-url origin --push --add git@github.com:christojeffrey/tubes-wbd-1.git
```

when you run

```powershell
git remote -v
```

you should see something like this

```powershell
origin  git@github.com:christojeffrey/tubes-wbd-1.git (fetch)
origin  git@gitlab.informatika.org:if3110-2022-k01-01-26/tugas-besar-1.git (push)
origin  git@github.com:christojeffrey/tubes-wbd-1.git (push)
```

that means we're going to push to both gitlab and github, and we're going to fetch from github

# How to run

1. go to folder where `docker-compose.yml` is located, run:

   ```powershell
   docker-compose down && docker-compose build && docker-compose up
   ```

2. go to `localhost:8000` on your browser. it should serve whatever that is on `./src/index.php`
3. go to `localhost:7777` on your browser. you should see adminer page. login using the following credentials:

   ```
   server: db
   username: tubes
   password: tubes
   database: tubes
   ```

   you should see the database that we're using for this project. the database is configured by `./sqlfile/initialschema.sql`

# How to stop

press `ctrl + c` to stop the docker compose

# what will you see if all goes well

# work distribution

these are the people who make this project

- Christopher Jeffrey, 13520055
- Addin Nabilal Huda, 13520045
- Dimas Faidh Muzaki, 13520156

First we did our own exploration, to get the idea about _how to do it_ first. Kinda like prove of concept. then after we get a good enough idea about how the project will be done, we discuss thoroughly about the project requirement. Including the APIs that we will make, and the pages. We then create API spec (the link is in the sidenote) then we create the API.

- Jeffrey do the auth API,
- Addin do the song API,
- Dimas do the album API.

then we start moving on to the pages and implementation. we do this by taking task, and tackling them one by one. When someone have finished their task, they take another task. here's a rough task distribution that we end up with. note that this does not represent the full task distribution, since we kinda not really do this in a strict way. we just do it as we go.

#### COMPONENTS

- [jef] song-card
- [dim] album-card
- [jef] navbar
- [din] player
- [jef] user-card

#### PAGES

- [dim] album-list
- [jef] user-list
- [jef] song-detail
- [jef] album-detail
- [din] update-song
- [Dimas]update-album
- [din] home (song list)
- [din] add-album
- [din] add-song
- [jef] search-song

#### STYLE

- [din] update2an dan add2an

#### OTHER

- [din] itung durasi lagu

### sidenote

#### the tutorial in this repo is intended for windows user

#### people who make this

- Christopher Jeffrey, 13520055
- Addin Nabilal Huda, 13520045
- Dimas Faidh Muzaki, 13520156

### working drive

[drive link](https://drive.google.com/drive/folders/1gtFksY_fHIAS5xdsUdHUGRMqDG4VUcrX?usp=sharing)

### recommended vscode extensions

[php formater](https://marketplace.visualstudio.com/items?itemName=rifi2k.format-html-in-php)

#### readings

- [project specification](https://docs.google.com/document/d/1bdYy1bAk6tpwYCZfqUxErCIJuESzfYH-n8ijvaNP_Jg/edit)
- [docker reference](https://www.section.io/engineering-education/dockerized-php-apache-and-mysql-container-development-environment/)
- [ajax example](https://www.w3schools.com/php/php_ajax_php.asp)
- [ajax post example](https://stackoverflow.com/questions/9713058/send-post-data-using-xmlhttprequest)
- [require and require once difference](<https://www.geeksforgeeks.org/difference-between-require-and-require_once-in-php/#:~:text=%3F%3E,-Output%3A&text=The%20require()%20function%20is%20used%20to%20include%20a%20PHP,will%20not%20include%20it%20again.>)

#### skimped material

1. Difference between CMD and ENTRYPOINT in Dockerfile

### docker note

port format is `host:container`

todo:

1. dump on close, and then load from dump
2. php read data from public folder
