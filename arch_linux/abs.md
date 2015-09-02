# ABS, the Arch Build System

Posted on 2015/9/1

## Installation of ABS

```
$ pacman -S abs
$ abs
```

Make sure that the `base-devel` package is installed.

```
$ pacman -S base-devel
```

## Building and installing packages

Create a directory where you copy files and directories of packages
to build them.
This procedure is optional but the way I recommend you
to keep and manage package files well.

```
$ mkdir ~/abs # wherever you want to create it
```

Copy the directory of a package to build from ABS tree.

```
$ cp -R /var/abs/<repository name>/<package name> ~/abs
```

Build the package. The `-s` option of `makepkg` command will try to resolve
its dependencies automatically.

```
$ cd ~/abs/<package name>
$ makepkg -s
```

Now you will find the package file with the extension,
`.pkg.tar.xz` in the directory,  `~/abs/<pkgname>`
(e.g. firefox-32.0.1-1-i686.pkg.tar.xz).
Install it.

```
$ pacman -U <package file>
```

## Removing packages

Use `pacman` to remove them from the system
as well as the ones installed normally via `pacman -S`.

```
$ pacman -Rs <package name>
```

## Related files and directories

* `/var/abs` : the directory of ABS package tree
* `/etc/abs.conf` : the configuration file of `abs` command
* `/etc/makepkg.conf` : the configuration file of `makepkg` command

