# Manual Installation

## Creating partitions with GPT

First, create a new GPT parttion scheme on your storage device.

(Warning) This procedure will delete all your data on the storage device.

```
$ gpart destroy -F ada0
$ gpart create -s gpt /dev/ada0
```

Add a partition for a boot loader and install bootcode.

```
$ gpart add -t freebsd-boot [-b 40] -s 512K ada0
$ gpart bootcode -b /boot/pmbr -p /boot/gptboot -i 1 ada0
```

Add other partitions and a optional swap partition. ('-b 1M' option
can be for the first partition.)

```
$ gpart add -t freebsd-ufs -s 64G ada0
$ gpart add -t freebsd-swap -s 2G ada0
```

Then, create new filesystems on the partitions and mount them.

```
$ newfs -Uj /dev/ada0p2
$ mount /dev/ada0p2 /mnt
```

(Notice) When you are working on your UEFI system,
EFI system partition must be created instead of freebsd-boot partition
and fill it with /boot/boot1.efifat image.
See [UEFI support page at FreeBSD wiki](https://wiki.freebsd.org/UEFI).

## Creating partitions with MBR

First, create a new MBR parttion scheme on your storage device.
This tutorial uses FreeBSD's BSD partition scheme to subdivide
a MBR partition because the number of MBR partitions on a device
is limited at 4 (primary ones).

(Warning) This procedure will delete all your data on the storage device.

```
$ gpart destroy -F ada0
$ gpart create -s mbr /dev/ada0
```

Add a partition for BSD partition scheme and install bootcode.

```
$ gpart add -t freebsd [-a 4k] -s 64G ada0
$ gpart create -s bsd /dev/ada0s1
$ gpart bootcode -b /boot/boot ada0s1
```

Add other partitions and a optional swap partition.
(`-a 4K` option can be for the first partition.)

(Warning) The first partition must be the root filesystem
because all object files used during boot must be in the first partition.

```
$ gpart add -t freebsd-ufs -s 62G ada0s1
$ gpart add -t freebsd-swap -s 2G ada0s1
```

Then, create new filesystems on the partitions and mount them.

```
$ newfs -Uj /dev/ada0s1a
$ mount /dev/ada0s1a /mnt
```

## Installing the system

Extract the archived files of the system and install them on the root filesystem.

```
  $ cd <i>mountpoint</i><br/>
  $ tar -xvpf /usr/freebsd-dist/base.txz<br/>
  $ tar -xvpf /usr/freebsd-dist/kernel.txz<br/>
  $ tar -xvpf /usr/freebsd-dist/ports.txz<br/>
  $ tar -xvpf /usr/freebsd-dist/src.txz<br/>
  $ tar -xvpf /usr/freebsd-dist/doc.txz<br/>
  $ tar -xvpf /usr/freebsd-dist/games.txz
```

Edit <i>mountpoint</i>/etc/fstab.

```
  # dev mp fstype options dump pass<br/>
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

<i>idxnum</i> : 1 (the index number of the freebsd-boot slice)<br/>
<i>bsdpartition</i> : ada0s2<br/>
<i>bsdsubpartition</i> : ada0s2a<br/>
<i>partdev</i> : ada0p3<br/>
<i>swappartdev</i> : ada0p2<br/>
<i>mountpoint</i> : /mnt<br/>
<i>yourkeymap</i> : jp.106<br/>
<i>yourhostname</i> : myfavecom<br/>
<i>ethdev</i> : re0
