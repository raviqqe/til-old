<?php section\name("Installation"); ?>
<p>
  Download and install <code>devel/subversion</code> from ports.
</p>
<p>
  Configuratins are below.
</p>
<p class="code"><code>
  $ pw groupadd svn<br/>
  $ pw useradd svn -g svn -s /usr/sbin/nologin<br/>
  $ mkdir <i>reposroot</i><br/>
  $ chown -R svn:svn <i>reposroot</i><br/>
  $ chmod -R 775 <i>reposroot</i>
</code></p>
<p>
  Edit <code>/etc/group</code> and add repository administrators to svn group.
</p>
<p class="code"><code>
  svn:*:<i>gid</i>:<i>username</i>
</code></p>
<p>
  Edit <code>/etc/rc.conf</code>.
</p>
<p class="code"><code>
  svnserve_enable="YES"<br/>
  svnserve_data="<i>reposroot</i>"
</code></p>
<p>
  Then, start <code>svnserve</code> daemon or reboot.
</p>
<p class="code"><code>
  $ service svnserve start
</code></p>
<p>
  Lastly, add users to manage subversion repositories to <code>svn</code> group.
</p>
<p class="code"><code>
  $ pw usermod <i>username</i> -G svn
</code></p>
<?php section\name("Creating repositories"); ?>
<p>
  Create a repository named <i>reposname</i>.
</p>
<p class="code"><code>
  $ svnadmin create <i>reposroot</i>/<i>reposname</i>
</code></p>
<p>
  Edit <i>reposroot</i>/<i>reposname</i>/conf/authz.
</p>
<p class="code"><code>
  [/]<br/>
  <i>username</i> = rw<br/>
  * = r
</code></p>
<p>
  Edit <i>reposroot</i>/<i>reposname</i>/conf/passwd.
</p>
<p class="code"><code>
  [users]<br/>
  <i>username</i> = <i>password</i>
</code></p>
<p>
  Edit <i>reposroot</i>/<i>reposname</i>/conf/svnserve.conf.
</p>
<p class="code"><code>
  [general]<br/>
  anon-access = read<br/>
  authz-db = authz<br/>
  password-db = passwd
</code></p>
<p>
  Now, you can access from clients to the host with the URI, svn://<i>hostname</i>/<i>reposname</i>.
</p>
<?php section\name("Backing up repositories"); ?>
<p class="code"><code>
  $ svnadmin dump <i>reposroot</i>/<i>reposname</i> &gt; <i>dumpfile</i>
</code></p>
<?php section\name("Restoring repositories"); ?>
<p class="code"><code>
  $ svnadmin load <i>reposroot</i>/<i>reposname</i> &lt; <i>dumpfile</i>
</code></p>
<?php section\name("Deleting or renaming repositories"); ?>
<p>
  Just delete or rename the repository's directory.
</p>
<p class="code"><code>
  $ rm -rf <i>reposroot</i>/<i>reposname</i><br/>
  $ mv <i>reposroot</i>/<i>oldreposname</i> <i>reposroot</i>/<i>newreposname</i>
</code></p>
<?php subsection\examples(); ?>
  <i>reposroot</i> : /usr/local/svn<br/>
  <i>dumpfile</i> : ~/svn.dmp
<?php subsection\end(); ?>
