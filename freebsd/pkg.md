# pkgng, the package management command

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

(Notice) When you get error messages like "failed checksum from repository",
Try this command which updates the repositories' metadata explicitly.

```
$ pkg update -f
```
