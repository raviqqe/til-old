# Docker

## Installation

First, install packages.

```
$ pkg install docker-freebsd ca_root_nss
```

Docker needs ZFS support.

```
$ kldload zfs
$ dd if=/dev/zero of=/usr/local/dockerfs bs=1024K count=2000
$ zpool create -f zroot /usr/local/dockerfs
$ zfs create -o mountpoint=/usr/docker zroot/docker
```

Note that the mount point is designated in `pkg info -D docker-freebsd`.

```
$ sysrc docker_enable="YES"
$ service docker start
```


## FreeBSD image

No official image of FreeBSD exists as of October 15, 2016.
You can build [mine](https://github.com/raviqqe/freebsd-docker-image).


## References

- [Docker on FreeBSD](https://wiki.freebsd.org/Docker)
