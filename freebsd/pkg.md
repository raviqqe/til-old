# pkg, the binary package management command

Posted on 2015/9/2

## Installation

When running `pkg` command for the first time, you will see the prompt
asking you whether you want to install it or not.
Then, choose `y` to install it.
Or, alternatively install `ports-mgmt/pkg` from ports.

## Installing packages

```
$ pkg install <package name>
```

## Removing packages

```
$ pkg delete <package name>
```

## Upgrading packages"); ?>

```
$ pkg upgrade <package name>
```

To upgrade all packages,

```
$ pkg upgrade
```

## Updating the repository catalogue

When you get error messages like "failed checksum from repository"
or the below,

```
Fetching ja-ibus-mozc-2.17.2106.102.txz: 100%  293 KiB  18.8kB/s    00:16
pkg: cached package ja-ibus-mozc-2.17.2106.102: size mismatch, fetching from remote
Fetching ja-ibus-mozc-2.17.2106.102.txz: 100%  293 KiB 150.2kB/s    00:02
pkg: cached package ja-ibus-mozc-2.17.2106.102: size mismatch, cannot continue
```

try this command which updates the repositories' metadata forcibly.

```
$ pkg update -f
```

## Showing installation message

```
$ pkg info -D $package
```

## References

- [how to display pkg-message](https://lists.freebsd.org/pipermail/freebsd-questions/2009-September/204877.html)
