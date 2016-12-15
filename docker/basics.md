# Basics

Posted on: 2016/4/4


## Listing up local images

```
docker images
```


## Searching images in remote repositories

```
docker search TERM
```


## Pulling images in remote repositories

```
docker pull IMAGE_NAME
```


## Running a container

```
docker run IMAGE_NAME [COMMAND [ARG...]]
```

### Examples

Run a image, get into it, and work with it interactively.

```
$ docker run -it docker.io/centos sh
```

To create an image from a running container,

```
$ docker stop $container_id
$ docker commit $container_id $image_name
```

### Tips

- Add `--privileged` option to enable a docker container
  to do some privileged action, such as changing their hostname
  with `hostname` command.


## Stop runnning a container

```
docker stop CONTAINER_ID
```


## Removing a stopped container

```
docker rm CONTAINER_ID
```

### Removing all stopped containers

```
docker rm $(docker ps -a -q)
```

## Listing up running containers

```
docker ps
```


## Attaching to a running container

```
docker attach CONTAINER
```


### Examples

To pull the image, `docker.io/ubuntu` with all tags,

```
$ docker pull -a docker.io/ubuntu
```


## Building an image

```
docker build -t REPO_NAME[:TAG_NAME] ABS_PATH
```


## Removing an image

```
docker rmi IMAGE_NAME
```

### Removing all untagged images

```
docker rmi $(docker images | grep '^<none>' | awk '{print $3}')
```

## Runnning multiple docker containers with some daemon command

```
for id in $(seq 1 10)
do
  docker run -d -h "$basehostname$id.com" $image_name
done
```

## Pusing your image to docker.io

```
$ docker login --username=$user_name --email=$email_address
$ docker push $repo_name/$image_name
```

## Saving and loading images from and to tarballs

```
$ docker save $image > foo.tar
```

`load` command extracts tag names in addition to images themselves.

```
$ docker load < foo.tar
```

## Moving docker directory (on Fedora 23)

```
$ systemctl stop docker.service
$ mv /var/lib/docker /home/docker # old to new
$ vi /etc/sysconfig/docker
$ grep OPTIONS /etc/sysconfig/docker
OPTIONS='--selinux-enabled --log-driver=journald -g /home/docker'
$ systemctl start docker.service
```


## Troubleshooting

### After docker failed with a device full error, it says `Error runnning ... dm_task_run failed` with most of subcommands...

Remove docker's directory.
On Fedora 23, it is at `/var/lib/docker`.

(Is this the best way to deal with it?)


### Writing to /etc/resolv.conf

The current version of Docker (October 15, 2016) doesn't allow modifying
`/etc/resolv.conf` in `Dockerfile`.
Even if you do so, it is made empty in each build step.

So, you cannot do this:

```
RUN echo nameserver 8.8.8.8 > /etc/resolv.conf
RUN some_command # using /etc/resolv.conf
```

Therefore, do this instead:

```
RUN echo nameserver 8.8.8.8 > /etc/resolv.conf && \
    some_command # using /etc/resolv.conf
```

There are [some discussions](https://github.com/docker/docker/issues/2267).


## References

- [Remove untagged images from Docker](http://jimhoskins.com/2013/07/27/remove-untagged-docker-images.html)
- [dockerで、pathの場所を、/var/lib/dockerから/mnt/foobar/に変更する方法 (Fedora版)](http://qiita.com/cat-in-136/items/f358a1bd08ae4b037ea1)
