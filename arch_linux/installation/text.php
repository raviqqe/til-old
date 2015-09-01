<?php section\name("Creating partitions with GPT"); ?>

First, create a new GPT parttion scheme on your storage device.

<?php subsection\warning(); ?>
This procedure will delete all your data on the storage device.
<?php subsection\end(); ?>
```
  $ gpart destroy -F <i>blockdev</i><br/>
  $ gpart create -s gpt <i>blockdev</i>
```

Add a partition for a boot loader and install bootcode.

```
  $ gpart add -t freebsd-boot [-b 40] -s 512K <i>blockdev</i><br/>
  $ gpart bootcode -b /boot/pmbr -p /boot/gptboot -i <i>idxnum</i> <i>blockdev</i>
```

Add other partitions and a swap partition (which is optional). ('-b 1M' option can be for the first partition.)

```
  $ gpart add -t freebsd-ufs -s <i>size</i> <i>blockdev</i><br/>
  $ gpart add -t freebsd-swap -s <i>size</i> <i>blockdev</i>
```

Then, create new filesystems on the partitions and mount them.

```
  $ newfs -U /dev/<i>partdev</i><br/>
  $ mount /dev/<i>partdev</i> <i>mountpoint</i>
```
<?php section\name("Installing the system"); ?>

Extract the archived files of the system and install them on the root filesystem.

```
  $ cd <i>mountpoint</i><br/>
  $ tar -xvpf /usr/freebsd-dist/*.txz
```

Edit <i>mountpoint</i>/etc/fstab.

```
  $ dev mp fstype options dump pass<br/>
  /dev/<i>partdev</i> / ufs rw 0 1<br/>
  /dev/<i>swappartdev</i> none swap sw 0 0
```

Edit <i>mountpoint</i>/etc/rc.conf.

```
  keymap="<i>yourkeymap</i>"<br/>
  hostname="<i>yourhostname</i>"<br/>
  ifconfig_<i>ethdev</i>="DHCP"
```

Finally, reboot into your new system.

```
  $ cd<br/>
  $ umount <i>mountpoint</i><br/>
  $ reboot
```
<?php section\name("After installation"); ?>

Create alias database for ```sendmail``` in the new system.

```
  $ make -C /etc/mail aliases
```
<?php subsection\examples(); ?>
  <i>blockdev</i> : ada0<br/>
  <i>idxnum</i> : 1 (the index number of the freebsd-boot slice)<br/>
  <i>partdev</i> : ada0p3<br/>
  <i>swappartdev</i> : ada0p2<br/>
  <i>mountpoint</i> : /mnt<br/>
  <i>yourkeymap</i> : jp.106<br/>
  <i>yourhostname</i> : myfavecom<br/>
  <i>ethdev</i> : re0
<?php subsection\end(); ?>
