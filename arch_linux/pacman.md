# pacman, the Package Manager

Posted on 2015/9/2

## Installing or upgrading packages

```
$ pacman -S <package name>
```

## Removing a package and other packages required only by it

```
$ pacman -Rs <i>packagename</i>
```

## Upgrading all packages and the system

```
$ pacman -Syu
```

## Updating the package database

```
$ pacman -Sy
```

## Installing local package tarballs

```
$ pacman -U firefox.pkg.tar.xz
```

## Searching packages remotely

```
$ pacman -Ss <package name>
```
