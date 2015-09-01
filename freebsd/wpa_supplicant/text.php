<?php section\name("Setting up the connection"); ?>
<p>
  <code>wpa_supplicant</code> is in base.
</p>
<p>
  First, generate the configuration file.
</p>
<p class="code"><code>
  $ wpa_passphrase <i>ssid</i> <i>passphrase</i> &gt;&gt; /etc/wpa_supplicant.conf
</code></p>
<p>
  Then, edit <code>rc.conf</code>.
</p>
<p class="code"><code>
  wlans_<i>ifdevice</i>="<i>ifname</i>"<br/>
  ifconfig_<i>ifname</i>="WPA SYNCDHCP"
</code></p>
<p>
  At last, restart the network service or reboot.
</p>
<p class="code"><code>
  $ service netif restart
</code></p>
<?php subsection\examples(); ?>
  <i>ssid</i> : WARPSTAR-0A1B2C<br/>
  <i>passphrae</i> : F6E5D4C3B2A10<br/>
  <i>ifdevice</i> : iwn0<br/>
  <i>ifname</i> : wlan0
<?php subsection\end(); ?>
