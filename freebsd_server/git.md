# Git Server via `git daemon`

## Set up the server

Following `/usr/local/etc/rc.d/git_daemon`, append the lines below to
`/etc/rc.conf`.

```
git_deamon_enable="YES"
git_daemon_directory="/home/git"
git_daemon_flags="--base-path=\"$git_daemon_directory\" "\
"--syslog --reuseaddr --detach"
```

The `--base-path` option is applied only when you cloning repositories
via git protocol.

Then, Launch `git daemon`.

```
$ sudo service git_daemon start
```


## Creating new git repositories

In the `$git_daemon_directory`,

```
$ git init test_repo.git
$ touch test_repo.git/git-daemon-export-ok
```

The `git-daemon-export-ok` file is necessary to make it in public
by `git daemon`.


## Cloning and pushing the repositories

On the client computer, clone it as usual.

```
$ git clone git://your_server.com/test_repo.git
```

or,

```
$ git clone ssh://your_server.com/test_repo.git
```

Note that git protocol doesn't have the function of authentication.
So, if you want to develop something using the remote repository,
you should use ssh protocol to be allowed to push changes.
Of course, you need your account on the remote machine.

Optionally, you can use HTTP/S protocol like GitHub
through the Apache HTTP server.
See [Git - Smart HTTP](https://git-scm.com/book/en/v2/Git-on-the-Server-Smart-HTTP).
