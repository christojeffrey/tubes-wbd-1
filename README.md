# Description

# Requirements

# Installation

## setup Repo

we're going to use github and gitlab informatika as our remote git repository. We use github as a backup, and assuming that it's more reliable that gitlab informatika(and it's recommended by the assitant)

here is how to setup the repo

```bash
git clone git@github.com:christojeffrey/tubes-wbd-1.git
git remote set-url origin --push --add git@gitlab.informatika.org:if3110-2022-k01-01-26/tugas-besar-1.git
git remote set-url origin --push --add git@github.com:christojeffrey/tubes-wbd-1.git
```

when you run

```bash
git remote -v
```

you should see something like this

```bash
origin  git@github.com:christojeffrey/tubes-wbd-1.git (fetch)
origin  git@gitlab.informatika.org:if3110-2022-k01-01-26/tugas-besar-1.git (push)
origin  git@github.com:christojeffrey/tubes-wbd-1.git (push)
```

that means we're going to push to both gitlab and github, and we're going to fetch from github

# How to run the server

# what will you see if all goes well

### sidenote
