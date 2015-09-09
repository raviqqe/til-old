# Git

Posted on 2015/9/9

THIS PAGE IS WORK IN PROGRESS.

## Installation

Download and install `devel/git` from ports.

## Configuration

```
$ pw groupadd git
$ pw useradd git -g git -s /usr/sbin/nologin
$ mkdir <reposroot>
$ chown -R git:git <reposroot>
$ chmod -R 775 <reposroot>
```

(Notice)
Be sure that the `<reposroot>` and files and directories in it are
owned by `git:git` and their permissions are set to 775
such that the git server has proper access to them.

Edit `/etc/group` and add repository administrators to git group if you want.

```
git:*:<gid>:<username>
```

Edit `/etc/rc.conf`.

```
git_daemon_enable="YES"
git_daemon_directory="/home/git"
git_daemon_flags="--syslog --base-path=/git --export-all"
```

Then, start `gitserve` daemon or reboot.

```
$ service git_daemon start
```
