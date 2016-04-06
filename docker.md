# Docker

Posted on: 2016/4/4


## Listing up local images

`docker images`


## Searching images in remote repositories

`docker search TERM`


## Pulling images in remote repositories

`docker pull IMAGE_NAME`


## Running a container

`docker run IMAGE_NAME [COMMAND [ARG...]]`

### Examples

Run a image, get into it, and work with it interactively.

```
$ docker run -it docker.io/centos sh
```


## Stop runnning a container

`docker stop CONTAINER_ID`


## Removing a stopped container

`docker rm CONTAINER_ID`


## Listing up running containers

`docker ps`


## Attaching to a running container

`docker attach CONTAINER`


### Examples 

To pull the image, `docker.io/ubuntu` with all tags,

```
$ docker pull -a docker.io/ubuntu 
```


## Building a image

`docker build -t REPO_NAME[:TAG_NAME] ABS_PATH`


## Removing an image

`docker rmi IMAGE_NAME`
