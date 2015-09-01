<?php section\name("Installation"); ?>
<p>
  Download and install <code>dns/nsd3</code> from ports.
</p>
<p>
  Edit <code>/etc/rc.conf</code>.
</p>
<p class="code"><code>
  nsd_enable="YES"
</code></p>
<p>
  Edit <code>/usr/local/etc/nsd/nsd.conf</code>.
</p>
<p class="code"><code>
<?php print(codefile('code/nsd.conf')); ?>
</code></p>
<p>
  Edit <i>zonefile</i> in <code>/usr/local/etc/nsd</code>.
  It's compatible with BIND's defined in RFC 1034 and RFC 1035.
  Then, compile the zone files.
</p>
<p class="code"><code>
  $ nsdc rebuild
</code></p>
<p>
  Finally, start the daemon or reboot.
</p>
<p class="code"><code>
  $ service nsd start
</code></p>
<?php section\name("Updating zone information"); ?>
<p>
  When you edit zone files, run these commands to update the zone information.
</p>
<p class="code"><code>
  $ nsdc rebuild<br/>
  $ nsdc reload
</code></p>
<?php section\name("Utility commands"); ?>
<ul>
  <li>nsdc</li>
  <li>nsd-checkconf</li>
  <li>nsd-notify</li>
  <li>nsd-patch</li>
  <li>nsd-xfer</li>
  <li>zonec</li>
</ul>
<?php subsection\examples(); ?>
  <i>interfaceip</i> : 192.168.0.1<br/>
  <i>yourdomain</i> : raviqqe.com.<br/>
  <i>zonefile</i> : raviqqe.com.zone
<?php subsection\end(); ?>
