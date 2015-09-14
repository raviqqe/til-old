# Router

THIS PAGE IS WORK IN PROGRESS.

# Router configuration

Edit `/etc/rc.conf`.

```
gateway_enable="YES"
router_enable="YES"
firewall_enable="NO"
```

If your router is connected to another local one with a static IP address,
add the lines to `/etc/rc.conf`.

```
defaultrouter="192.168.0.1"
ifconfig_re0="inet 192.168.0.2 netmask 255.255.255.0"
```

Then, start the daemon or reboot.

```
$ service routed start
```

## PPP configuration

(Notice)
This section is work in progress.

To enable PPP connection, add the lines to `/etc/rc.conf`.

```
ppp_enable="YES"
ppp_mode="ddial"
ppp_profile="your_provider"
```

To enable NAT with PPP, add the line to `/etc/rc.conf`.

```
ppp_nat="YES"
```

## NAT configuration

To enable NAT with PPP, add the line to `/etc/rc.conf`.

```
natd_enable="YES"
natd_interface="re0"
```

## Firewall configuration

To enable firewall, add the lines to `/etc/rc.conf`.
The type of `firewall_type` can be either `open`, `client`, `simple`
or something else, or a full path to a ruleset file.

```
firewall_enable="YES"
firewall_type="simple"
```

Then, execute the daemon or reboot.

```
$ service ipfw start
```

To enable a custom firewall ruleset, add the line to `/etc/rc.conf`.

```
firewall_script="<i>scriptfile</i>"
```

Edit `/etc/ipfw.conf`.

```
fwcmd=ipfw
oif=re0
iif=re1
${fwcmd} add allow ip from any to any via ${oif}
${fwcmd} add allow ip from any to any via ${iif}
```

(Warning)
This setting allow all IP packets to go in and out through the router.
For security, it should be stricter
depending on the security policy of your network.

```
$ sh /etc/ipfw.conf
```

<!--
# Port forwarding configuration

To enable port forwarding, add the lines to `/etc/rc.conf`.

```
portmap_enable="YES"
```
-->
