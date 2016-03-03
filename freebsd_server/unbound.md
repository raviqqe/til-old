# DNS cache server by unbound

Posted on February 23, 2016: Tested with unbound v1.5.5 on FreeBSD 10.2

This article is about
how to build a DNS cache and recursive server with `unbound`
for your local network.


## Installation

Download and install `dns/unbound` from ports.
Do not use built-in unbound (its service name is `local_unbound`)
because it's only for queries from the machine itself on which unbound runs,
and it is not a latest one.

Before starting its setup,
note that, when you type the commands related to `unbound`,
such as `unbound`, `unbound-conrol`,
their full path are resolved into the built-in ones usually.

```
$ which unbound
/usr/local/sbin/unbound
$ which unbound-control
/usr/local/sbin/unbound-control
```

I recommend you that you always type their full path
to make sure that you are using the one from ports.
However, relative paths are used here for the sake of readability.

Then, let's get it started.
First, set up keys and certificates.

```
$ unbound-control-setup
```

Edit `/etc/rc.conf`.

```
unbound_enable="YES" # NOT local_unbound_enable
```

Get the latest root hints while the built-in ones are available.

```
$ fetch ftp://FTP.INTERNIC.NET/domain/named.cache
$ mv named.cache /usr/local/etc/unbound/root.hints
```

Edit `/usr/local/etc/unbound/unbound.conf`.

```
server:
  verbosity: 1
  num-threads: 1
  interface: 192.168.0.10
  interface: 127.0.0.1
  interface: ::1
  port: 53
  outgoing-interface: 192.168.0.10
  outgoing-range: 960 # maximum on FreeBSD 10.2 x86_64
  ip-transparent: yes
  num-queries-per-thread: 1024
  do-ip4: yes
  do-ip6: yes
  do-udp: yes
  do-tcp: yes
  do-daemonize: yes
  access-control: 192.168.0.0/24 allow
  access-control: 127.0.0.1 allow
  access-control: ::1 allow
  username: "unbound"
  directory: "/usr/local/etc/unbound"
  log-time-ascii: yes
  log-queries: yes
  pidfile: "/usr/local/etc/unbound/unbound.pid"
  root-hints: "/usr/local/etc/unbound/root.hints"
  hide-identity: yes
  hide-version: yes
  do-not-query-localhost: no

remote-control:
  control-enable: yes
  control-use-cert: yes
  control-interface: 127.0.0.1
  control-interface: ::1
  control-port: 8953
  server-key-file: "/usr/local/etc/unbound/unbound_server.key"
  server-cert-file: "/usr/local/etc/unbound/unbound_server.pem"
  control-key-file: "/usr/local/etc/unbound/unbound_control.key"
  control-cert-file: "/usr/local/etc/unbound/unbound_control.pem"

stub-zone:
  # Set up local namespace.
  # Queries can be redirected to nsd, the authoritative server here.
  name: "your.domain.com."
  stub-addr: 127.0.0.1:5353
```

Finally, start the daemon or reboot.

```
$ service unbound start
```


## Reloading its configuration file

```
$ unbound-control reload
```


## Troubleshooting

To check its configuration file, type

```
$ unbound-checkconf /usr/local/etc/unbound/unbound.conf
```


## Main binaries

* unbound
* unbound-control
* unbound-checkconf


## References

* [Unbound DNS Server Tutorial @ Calomel.org](https://calomel.org/unbound_dns.html)
* [nlnetlabs.nl :: Unbound](https://www.nlnetlabs.nl/projects/unbound/)
