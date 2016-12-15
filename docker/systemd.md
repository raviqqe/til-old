# systemd in Docker

## Dockerfile

```dockerfile
FROM centos:7
MAINTAINER Me

ENV container docker

RUN (cd /lib/systemd/system/sysinit.target.wants && for f in *; do [ $f == systemd-tmpfiles-setup.service ] || rm -f $f; done) && \
    rm -f /lib/systemd/system/multi-user.target.wants/* && \
    rm -f /etc/systemd/system/*.wants/* && \
    rm -f /lib/systemd/system/local-fs.target.wants/* && \
    rm -f /lib/systemd/system/sockets.target.wants/*udev* && \
    rm -f /lib/systemd/system/sockets.target.wants/*initctl* && \
    rm -f /lib/systemd/system/basic.target.wants/* && \
    rm -f /lib/systemd/system/anaconda.target.wants/*

CMD /usr/sbin/init
```

## Running the image

Run the image mounting a cgroup directory.

```
$ docker run -it --privileged -v /sys/fs/cgroup:/sys/fs/cgroup:ro $image
```

When you want to run some commands before `/usr/sbin/init`,
you need to `exec` it.

```
CMD echo Hello, world! && exec /usr/sbin/init
```


## References

- [Running systemd within a Docker Container - Red Hat Developer Blog](https://developers.redhat.com/blog/2014/05/05/running-systemd-within-docker-container/)
