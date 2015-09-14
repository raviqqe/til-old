# DHCP

## Installation

Download and install `net/isc-dhcp43-server` from ports.

Edit `/etc/rc.conf`.

```
ifconfig_re0="inet 192.168.0.64 netmask 255.255.255.0"
dhcpd_enable="YES"
dhcpd_iface="re0"
```

Edit `/usr/local/etc/dhcpd.conf`. One of examples is following.

```
option domain-name "your.domain.com";
option domain-name-servers 192.168.0.1;
...
ddns-update-style none;
authoritative;
...
subnet 192.168.0.0 netmask 255.255.255.0 {
  range 192.168.0.128 192.168.0.254;
  option routers 192.168.0.1;
  option broadcast-address 192.168.0.255;
}
```

Then, start the daemon or reboot.

```
$ service isc-dhcpd start
```
