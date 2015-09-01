<?php section\name("Router configuration"); ?>

  Edit ```/etc/rc.conf```.

```
  gateway_enable="YES"<br/>
  router_enable="YES"<br/>
  firewall_enable="NO"
```

  If your router is connected another local one with a static IP address, add the lines to ```/etc/rc.conf```.

```
  defaultrouter="<i>drouterip</i>"<br/>
  ifconfig_<i>netiface</i>="inet <i>ipaddr</i> netmask <i>netmask</i>"
```

  Then, start the daemon or reboot.

```
  $ service routed start
```
<?php subsection\examples(); ?>
  <i>drouterip</i> : 192.168.0.1<br/>
  <i>netiface</i> : re1<br/>
  <i>ipaddr</i> : 192.168.1.1<br/>
  <i>netmask</i> : 255.255.255.0
<?php subsection\end(); ?>
<?php section\name("PPP configuration"); ?>
<?php subsection\notice(); ?>
  This section is work in progress.
<?php subsection\end(); ?>
<p >
  To enable PPP connection, add the lines to ```/etc/rc.conf```.

```
  ppp_enable="YES"<br/>
  ppp_mode="ddial"<br/>
  ppp_profile="<i>provider</i>"
```
<p >
  To enable NAT with PPP, add the line to ```/etc/rc.conf```.

```
  ppp_nat="YES"
```
<?php subsection\examples(); ?>
  <i>provider</i> : commufa
<?php subsection\end(); ?>
<?php section\name("NAT configuration"); ?>
<p >
  To enable NAT with PPP, add the line to ```/etc/rc.conf```.

```
  natd_enable="YES"<br/>
  natd_interface="<i>netiface</i>"
```
<?php subsection\examples(); ?>
  <i>netiface</i> : re0
<?php subsection\end(); ?>
<?php section\name("Firewall configuration"); ?>
<p >
  To enable firewall, add the lines to ```/etc/rc.conf```.
  The kinds of <i>type</i> are <i>open</i>, <i>client</i>, <i>simple</i> and so on, or a full path to a ruleset file.

```
  firewall_enable="YES"<br/>
  firewall_type="<i>type</i>"
```

  Then, execute the daemon or reboot.

```
  $ service ipfw start
```
<p >
  To enable a custom firewall ruleset, add the line to ```/etc/rc.conf```.

```
  firewall_script="<i>scriptfile</i>"
```

  Edit <i>scriptfile</i>.

```
  fwcmd=ipfw<br/>
  oif=<i>outnetiface</i><br/>
  iif=<i>innetiface</i><br/>
  ${fwcmd} add allow ip from any to any via ${oif}<br/>
  ${fwcmd} add allow ip from any to any via ${iif}
```
<?php subsection\warning(); ?>
  This setting allow all IP packets to go in and out through the router.
  For security, it should be more strict depending on the security policy of your network.
<?php subsection\end(); ?>
```
  $ sh <i>scriptfile</i>
```
<?php subsection\examples(); ?>
  <i>outnetiface</i> : re0<br/>
  <i>innetiface</i> : re1<br/>
  <i>scriptfile</i> : /etc/ipfw.conf
<?php subsection\end(); ?>
<!--
<?php section\name("Port forwarding configuration"); ?>
<p >
  To enable port forwarding, add the lines to ```/etc/rc.conf```.

```
  portmap_enable="YES"
```
-->
