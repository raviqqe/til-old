<?php section\name("Setting up the connection"); ?>

  ```wpa_supplicant``` is in base.


  First, generate the configuration file.

```
  $ wpa_passphrase <i>ssid</i> <i>passphrase</i> &gt;&gt; /etc/wpa_supplicant.conf
```

  Then, edit ```rc.conf```.

```
  wlans_<i>ifdevice</i>="<i>ifname</i>"<br/>
  ifconfig_<i>ifname</i>="WPA SYNCDHCP"
```

  At last, restart the network service or reboot.

```
  $ service netif restart
```
<?php subsection\examples(); ?>
  <i>ssid</i> : WARPSTAR-0A1B2C<br/>
  <i>passphrae</i> : F6E5D4C3B2A10<br/>
  <i>ifdevice</i> : iwn0<br/>
  <i>ifname</i> : wlan0
<?php subsection\end(); ?>
