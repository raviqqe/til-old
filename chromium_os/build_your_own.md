# Building your own Chromium OS

Posted on: March 3, 2016

These are tips about building your own Chromium OS kernel and disk image
for the one easy to forget everything.
Some of them are what I stumbleed on.
Some of them are what are difficult to grasp for me.


# Accepting licenses

Some posts about `portage`, the package build system of Gentoo used by Chromium OS,
says that you should set `ACCEPT_LICENSE` in `/etc/make.conf`
or append lines to `/etc/portage/package.license` to accept licenses.
But, both of them didn't work in the chroot environment of `cros_sdk` somehow.
How to deal with rejected licneses is written in
[here](https://www.chromium.org/chromium-os/licensing/building-a-distro).
The most convenient way is append the line below to `/etc/make.conf.user`
in the chroot environment.

```
ACCEPT_LICENSE="*"
```

This lets you accept all licenses when building packages of every board.
