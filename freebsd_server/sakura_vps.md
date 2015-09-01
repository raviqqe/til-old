# Installing FreeBSD 10.2 on Sakura VPS through its ISO image server

Posted On: Augast 26, 2015

With the Sakura VPS service, you can upload your own ISO image of some OS
to Sakura's ISO image server. Then, the OS can be installed into your VPS
through it.
The way to install FreeBSD 10.2 is below. I used the ISO image on the FreeBSD
website, FreeBSD-10.2-RELEASE-amd64-bootonly.iso.


## Uploading ISO image

First, download the latest ISO image from the FreeBSD website to your local
machine. I used the boot-only image to reduce the time to upload it to the ISO
image server.
Working on your running FreeBSD and downloading the checksum,
verifying the checksum of it is easy and recommended.
The command to check it will be something like this;

```
sha256 FreeBSD-10.2-RELEASE-amd64-bootonly.iso

```

Compare its value with the one in the downloaded checksum file.
Then, upload the image to Sakura's image server, follow the guide, and
launch its VNC console on your browser.

## Installing FreeBSD by bsdinstall

When installing it through `bsdinstall`, you can just follow it.
The point to watch out is network configuration. While you may set up both IPv4
and IPv6, set the fixed IP addresses, gateways' addresses and etc provided by
Sakura and don't set up either DHCP or SLAAC.

(Caution) When you are setting up IPv6's default gateway, the address provided
by Sakura may be a link local address. If so, don't forget to append the scope
ID back of it. On FreeBSD or other Unix-like OS such as Linux, you may just add
'%' and an interface name, such as `vtnet0` (e.g. fe80::1%vtnet0).
On rc.conf, for example;

```
ipv6_defaultgateway="fe80::1%vtnet0"
```
