# Installing Xorg server with NVidia drivers

Posted on: 2016/4/20

```
$ pkg install xorg-minimal
$ mv /etc/X11/xorg.conf $HOME/xorg.conf.etc
$ mv /usr/local/etc/X11/xorg.conf $HOME/xorg.conf.localetc
$ Xorg -configure # make sure that this succeeds
$ cp /root/xorg.conf.new /etc/X11/xorg.conf
$ pkg install nvidia-driver
$ echo 'nvidia_load="YES"' >> /boot/loader.conf
$ echo 'linux_enable="YES"' >> /etc/rc.conf
```
