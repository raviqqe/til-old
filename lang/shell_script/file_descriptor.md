# Using File Descriptors in sh

Posted on: 2016/4/21


```
$ exec 3<> foo.txt # open for read and write
$ exec 5< foo.txt # open for read only
$ exec 4> foo.txt # open for write
$ echo Hello >&3
$ cat <&3
$ exec 3>&- # close file descriptor
```
