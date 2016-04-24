# XDM, the X Display Manager

XDM is a display manager for X server.
A display manager controls multiple user logins and logouts,
display locking and etc.
On FreeBSD, after installation of `xdm` package, some cofigurations are needed.
This article describes how to do that and customize XDM's looks.


## Installation

```
$ pkg install xdm
```


## Configuration

Edit `/etc/ttys`.

```diff
...
-ttyv8  "/usr/local/bin/xdm -nodaemon"  xterm  off secure
+ttyv8  "/usr/local/bin/xdm -nodaemon"  xterm  on secure
...
```
