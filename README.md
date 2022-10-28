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
![image](https://user-images.githubusercontent.com/70847819/198525109-c3ea1af4-bc97-4cb3-9b77-d8e68ab0fcde.png)
![image](https://user-images.githubusercontent.com/70847819/198525379-04debdf3-876e-4eb9-8aa0-5f7c0aab71e4.png)
![image](https://user-images.githubusercontent.com/70847819/198525478-bb625e56-3741-47ac-9ac7-099083a78be0.png)
![image](https://user-images.githubusercontent.com/70847819/198525585-d0049238-d293-4b12-bd41-3c1b1c4376de.png)
![image](https://user-images.githubusercontent.com/70847819/198525675-11b20e2c-5f6c-4537-b873-6a4cf8252e0c.png)
![image](https://user-images.githubusercontent.com/70847819/198525976-b8c21f54-9d76-432b-a697-ca05fbac700c.png)
![image](https://user-images.githubusercontent.com/70847819/198528879-68442fc0-6bfb-4a81-be9b-2b6d170d6900.png)
![image](https://user-images.githubusercontent.com/70847819/198529515-9ce80161-e34e-4bca-92dd-5ae42c84b5df.png)
![image](https://user-images.githubusercontent.com/70847819/198530495-e2acc6b0-eae6-4f0e-91d6-8b34270f24f2.png)
![image](https://user-images.githubusercontent.com/70847819/198530578-61136aac-3347-44d0-89b3-3dec6ca9a16b.png)

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

- [Jeffrey] song-card
- [Dimas] album-card
- [Jeffrey] navbar
- [Addin] player
- [Jeffrey] user-card

#### PAGES

- [Dimas] album-list
- [Jeffrey] user-list
- [Jeffrey] song-detail
- [Jeffrey] album-detail
- [Addin] update-song
- [Dimas]update-album
- [Addin] home (song list)
- [Addin] add-album
- [Addin] add-song
- [Jeffrey] search-song

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
