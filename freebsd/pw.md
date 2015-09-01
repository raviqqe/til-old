# pw

## Creating daemon users

For server administrators, creating daemon users is a common task.
Creating its own user and running each deamon program as him
keeps the server more secure than runnning it as a root user.
I usually create them by the command below.
`-s /nonexistent` option prevents the daemons from logging in and omitting `-m`
option doesn't create their home directories.

```
$ pw useradd <user name> [-c <comment>] -s /nonexistent
```
