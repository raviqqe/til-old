# DNS content server with nsd3

## Installation

Download and install `dns/nsd3` from ports.

Edit `/etc/rc.conf`.

```
nsd_enable="YES"
```

Edit `/usr/local/etc/nsd/nsd.conf`.

```
server:
  ip-address: 192.168.0.1
  ip-address: ::1
  ip-address: 127.0.0.1
  port: 53
  zonesdir: "/usr/local/etc/nsd"
  logfile: "/var/log/nsd.log"
  hide-version: yes
  username: bind

zone:
  name: "your.domain.com"
  zonefile: your.domain.com.zone
```

Edit `your.domain.com.zone` in `/usr/local/etc/nsd`.
Its format is compatible with BIND's defined in RFC 1034 and RFC 1035.
Then, compile the zone files.

```
$ nsdc rebuild
```

Finally, start the daemon or reboot.

```
$ service nsd start
```

## Updating zone information

When you edit zone files, run these commands to update the zone information.

```
$ nsdc rebuild
$ nsdc reload
```

## Utility commands

* nsdc
* nsd-checkconf
* nsd-notify
* nsd-patch
* nsd-xfer
* zonec
