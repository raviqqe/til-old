# Docker

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

## Tips

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
docker rmi $(docker images | grep '^<none>' | awk '{print $1}')
```

## Runnning multiple docker containers with some daemon command

```
for id in $(seq 1 10)
do
  docker run -d -h "$basehostname$id.com" $image_name
done
```


## References

- [Remove untagged images from Docker](http://jimhoskins.com/2013/07/27/remove-untagged-docker-images.html)
