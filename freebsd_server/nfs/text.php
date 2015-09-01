<?php section\name("Installation"); ?>
<p>
  Configuratins are below.
</p>
<p>
  Edit <code>/etc/rc.conf</code>.
</p>
<p class="code"><code>
  mountd_enable="YES"<br/>
  mountd_flags="-r"<br/>
  rpcbind_enable="YES"<br/>
  rpc_lockd_enable="YES"<br/>
  rpc_statd_enable="YES"<br/>
  nfs_server_enable="YES"<br/>
  nfs_reserved_port_only="NO"
</code></p>
<p>
  Edit <code>/etc/exports</code> to allow hosts in the network to mount the filesystem.
</p>
<p class="code"><code>
  <i>dirtoexport</i> -maproot=root -network <i>network</i> -mask <i>netmask</i>
</code></p>
<p>
  Or, to allow specific hosts to mount the filesystem.
</p>
<p class="code"><code>
  <i>dirtoexport</i> -maproot=root <i>host</i> [<i>host</i> [<i>host</i> ...]]
</code></p>
<p>
  Then, start the daemons or reboot.
</p>
<p class="code"><code>
  $ service nfsd start<br/>
  $ service lockd start<br/>
  $ service statd start
</code></p>
<?php subsection\examples(); ?>
  <i>dirtoexport</i> : /usr/local/nfs<br/>
  <i>network</i> : 192.168.1.0<br/>
  <i>netmask</i> : 255.255.255.0<br/>
  <i>host</i> : 192.168.2.64
<?php subsection\end(); ?>
