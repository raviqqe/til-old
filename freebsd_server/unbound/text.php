<?php section\name("Installation"); ?>
<p>
  <code>dns/unbound</code> is in base (on FreeBSD 10). 
</p>
<p>
  Edit <code>/etc/rc.conf</code>.
</p>
<p class="code"><code>
  local_unbound_enable="YES"
</code></p>
<p>
  Run the setup script.
</p>
<p class="code"><code>
  $ local-unbound-setup
</code></p>
<p>
  Edit <code>/etc/unbound/unbound.conf</code>.
</p>
<p class="code"><code>
<?php print(codefile('code/unbound.conf')); ?>
</code></p>
<p>
  Finally, start the daemon or reboot.
</p>
<p class="code"><code>
  $ service local_unbound start
</code></p>
<?php section\name("Enabling remote control"); ?>
<p>
  Add the lines to <code>/etc/unbound/unbound.conf</code>.
</p>
<p class="code"><code>
<?php print(codefile('code/unbound_remote-control.conf')); ?>
</code></p>
<p>
  Generate a key.
</p>
<p class="code"><code>
  $ sudo -u unbound unbound-control-setup
</code></p>
<p>
  Now, you can use <code>unbound-control</code> commnad.
</p>
<?php section\name("Utility commands"); ?>
<ul>
  <li>unbound-control</li>
  <li>unbound-checkconf</li>
  <li>unbound-host</li>
  <li>unbound-anchor</li>
</ul>
<?php subsection\examples(); ?>
  <i>interfaceip</i> : 192.168.0.1<br/>
  <i>networkip</i> : 192.168.0.0/24<br/>
  <i>localdomain</i> : local.<br/>
  <i>somedomain</i> : raviqqe.com.<br/>
  <i>authserver</i> : 192.168.0.2
<?php subsection\end(); ?>
