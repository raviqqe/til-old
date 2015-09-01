<?php section\name("Installation"); ?>

Download and install ```net/isc-dhcp43-server``` from ports.


Edit ```/etc/rc.conf```.

```
ifconfig_<i>netiface</i>="inet <i>ipaddr</i> netmask <i>maskvalue</i>"<br/>
dhcpd_enable="YES"<br/>
dhcpd_iface="<i>netiface</i>"
```

Edit ```/usr/local/etc/dhcpd.conf```.

```
<?php print(codefile('code/dhcpd.conf')); ?>
```

Then, start the daemon or reboot.

```
$ service isc-dhcpd start
```
<?php subsection\examples(); ?>
<i>netiface</i> : re0<br/>
<i>ipaddr</i> : 192.168.0.64<br/>
<i>maskvalue</i> : 255.255.255.0<br/>
<i>domainname</i> : my.domain.com<br/>
<i>dnsserverip</i> : 192.168.1.1<br/>
<i>networkip</i> : 192.168.1.0<br/>
<i>netmask</i> : 255.255.255.0<br/>
<i>dynfirstip</i> : 192.168.1.128<br/>
<i>dynlastip</i> : 192.168.1.254<br/>
<i>routerip</i> : 192.168.1.1<br/>
<i>broadcastip</i> : 192.168.1.255
<?php subsection\end(); ?>
