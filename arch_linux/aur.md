# AUR, the Arch User Repository

## Preparation

Make sure that the `base-devel` package is installed.

```
$ pacman -S base-devel
```

## Building and installing packages

Create a directory where you copy files to build packages.

```
$ mkdir ~/aur
```

Download the archive file of a package to build from AUR.

```
$ wget http://aur.archlinux.org/packages/op/openarena/openarena.tar.gz
```

Then, the following tasks are the same as the ones of ABS.
Extract the tarball to the build directory,
Build the package,
and install it via `pacman -U` command.

```
$ tar -xvf openarena.tar.gz -C ~/aur
$ cd ~/aur/openarena
$ makepkg -s
$ pacman -U openarena-0.8.8-2-i686.pkg.tar.xz
```
