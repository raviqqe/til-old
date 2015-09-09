# syncthing, the file synchronization software

Posted on: 2015/9/8

syncthing is a software that realize your own cloud file server replacing
proprietary ones such as Dropbox and Box.
The most remarkable feature of it is, I think, its P2P-like architecture
similar to BitTorrent Sync.
There is no concept like servers or clients.
Each __device__ is connected with each other online
so that every instance of files and directories to be synchronized is copied
to each __device__.
Of course, syncthing can be run on servers. Then, you can connect your device
and synchronize contents wherever the Internet is available.

Moreover, in my experience, its usage of network bandwidth on synchronization
is superior to the other prorietary service by 2 times
(around 1Mbps against 500Kbps).


## Installation

Install `net/syncthing` from ports.

```
$ pkg install net/syncthing
```

## Setup on your devices

All you need to edit are
`~/.config/syncthing/config.xml` files on each devices.
Their format is like the following.

```xml
<configuration version="11">
<folder id="... >
  ...
</folder>
<device id="... >
  ...
</device>
<gui enabled=... >
  ...
</gui>
<options>
  ...
</options>
</configuration>

```

To add your new device, add a new device element to it.
Your device's ID can be found in the configuration file itself,
and GUI's gear menu.
The name properties are optional.
And, then, add the device's ID to some folder elements.

For more details about syncthing, see
[the official documentation](http://docs.syncthing.net).

## discorv, the device discovery server

When you come to configure syncthing by GUI or `config.xml`,
a question how the devices finds each other may come to your mind
because, in configuration, all need to be set up are
not any IP address and port but only their IDs.
The discovery servers of syncthing take the role of it for devices to know
the network locations of other devices.

The default discovery servers of IPv4 and IPv6 will be found
in a `<options>` element in `~/.config/syncthing/config.xml`.
It is the official dicovery servers of syncthing.net.

Of course, you can set up and run your own discovery server.
On FreeBSD, just add a following line to `/etc/rc.conf`.

```
syncthingdiscosrv_enable="YES"
```

Then, start the daemon.

```
$ service syncthing-discosrv start
```

To enable it as one of discovery servers for your devices,
add it to their configuration file, `~/.config/syncthing/config.xml`.
Note that the default port number of discovery servers is 22026
unless you set another one on the command line.

```
<options>
  ...
  <globalAnnounceServer>udp4://your.domain.com:22026</globalAnnounceServer>
  ...
</options>
```
