<?php section\name("Installation"); ?>
<p>
  <code>ftpd</code> is included in base.
</p>
<p>
Edit <code>/etc/rc.conf</code>.
</p>
<p class="code"><code>
  ftpd_enable="YES"
</code></p>
<p>
  Start the daemon or reboot.  
</p>
<p class="code"><code>
  $ service ftpd start
</code></p>
