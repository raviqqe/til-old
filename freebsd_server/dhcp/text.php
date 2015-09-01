<?php section\name("Installation"); ?>
<p>
Download and install <code>net/isc-dhcp43-server</code> from ports.
</p>
<p>
Edit <code>/etc/rc.conf</code>.
</p>
<p class="code"><code>
ifconfig_<i>netiface</i>="inet <i>ipaddr</i> netmask <i>maskvalue</i>"<br/>
dhcpd_enable="YES"<br/>
dhcpd_iface="<i>netiface</i>"
</code></p>
<p>
Edit <code>/usr/local/etc/dhcpd.conf</code>.
</p>
<p class="code"><code>
<?php print(codefile('code/dhcpd.conf')); ?>
</code></p>
<p>
Then, start the daemon or reboot.
</p>
<p class="code"><code>
$ service isc-dhcpd start
</code></p>
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
