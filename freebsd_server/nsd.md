# DNS content server with nsd

Updated on February 23, 2016: Tested with nsd v4.1.7

This is how to build a DNS content (authoritative) server with `nsd`,
one of the implementations.


## Installation

Download and install `dns/nsd` from ports.
Then, set up keys and certificates.

```
$ nsd-control-setup
```

Edit `/etc/rc.conf`.

```
nsd_enable="YES"
```

Edit `/usr/local/etc/nsd/nsd.conf`.

```
server:
  server-count: 1
  ip-address: 192.168.0.1
  ip-address: 127.0.0.1
  ip-address: ::1
  do-ip4: yes
  do-ip6: yes
  port: 53
  username: nsd
  zonesdir: "/usr/local/etc/nsd"
  zonelistfile: "/var/db/nsd/zone.list"
  database: "/var/db/nsd/nsd.db"
  logfile: "/var/log/nsd.log"
  pidfile: "/var/run/nsd/nsd.pid"
  hide-version: yes
  log-time-ascii: yes
  round-robin: yes
  zonefiles-check: yes

zone:
  name: "your.domain.com."
  zonefile: your.domain.com.zone

zone:
  name: "0.168.192.in-addr.arpa."
  zonefile: your.domain.com.reverse
```

Edit `your.domain.com.zone` and `your.domain.com.reverse`
in `/usr/local/etc/nsd`.
Its format is compatible with BIND's defined in RFC 1034 and RFC 1035.

Finally, start the daemon or reboot.

```
$ service nsd start
```


## Updating zone information

When you edit zone files, run these commands to update the zone information.

```
$ nsd-control reload
```


## Troubleshoots

When something wrong is in `nsd.conf`, or any other zone files,
`nsd` doesn't work and serve names properly.
Then, look for bugs in them by checking the configuration file or logs.

```
$ nsd-checkconf /usr/local/etc/nsd/nsd.conf
```

```
$ tail /var/log/nsd.log
```


## Main binaries

* nsd
* nsd-control
* nsd-checkconf
