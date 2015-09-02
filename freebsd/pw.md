# pw, the user and group management command

## Creating users for humen

`-m` option is necessary to create their home directories.

```
$ pw useradd <user name> -m -G <additional groups separated by commas> \
    -s <shell>
```

## Creating daemon users

For server administrators, creating daemon users is a common task.
Creating its own user and running each deamon program as him
keeps the server more secure than runnning it as a root user.
I usually create them by the command below.
`-s /usr/sbin/nologin` option prevents the daemons from logging in
and omitting `-m` option and putting `-d /nonexistent` gives them
no home directory.

```
$ pw useradd <user name> [-c <comment>] -d /nonexistent -s /usr/sbin/nologin
```
