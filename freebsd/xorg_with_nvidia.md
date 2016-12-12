# Installing Xorg server with NVidia drivers

Posted on: 2016/4/20

```
$ pkg install xorg-minimal nvidia-driver
$ Xorg -configure # make sure that this succeeds
$ cp /root/xorg.conf.new /etc/X11/xorg.conf
$ sysrc kld_list=nvidia-modeset
$ sysrc linux_enable=YES
```
