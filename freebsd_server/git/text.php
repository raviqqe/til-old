<?php section\name("Installation"); ?>
<p>
  Download and install <code>devel/git</code> from ports.
</p>
<p>
  Configuratins are below.
</p>
<p class="code"><code>
  $ pw groupadd git<br/>
  $ pw useradd git -g git -s /usr/sbin/nologin<br/>
  $ mkdir <i>reposroot</i><br/>
  $ chown -R git:git <i>reposroot</i><br/>
  $ chmod -R 775 <i>reposroot</i>
</code></p>
<?php subsection\notice(); ?>
  Be sure that the <i>reposroot</i> and files and directories in it are owned by <code>git:git</code>
  and their permissions are set to <code>775</code> such that git server has proper access to them. 
<?php subsection\end(); ?>
<p>
  Edit <code>/etc/group</code> and add repository administrators to git group if you want.
</p>
<p class="code"><code>
  git:*:<i>gid</i>:<i>username</i>
</code></p>
<p>
  Edit <code>/etc/rc.conf</code>.
</p>
<p class="code"><code>
  git_daemon_enable="YES"<br/>
  git_daemon_directory="<i>reposroot</i>"<br/>
  git_daemon_flags="--syslog --base-path=/git --export-all"
</code></p>
<p>
  Then, start <code>gitserve</code> daemon or reboot.
</p>
<p class="code"><code>
  $ service git_daemon start
</code></p>
<?php subsection\examples(); ?>
  <i>reposroot</i> : /srv/git<br/>
<?php subsection\end(); ?>
