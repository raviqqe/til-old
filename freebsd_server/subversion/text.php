<?php section\name("Installation"); ?>

  Download and install ```devel/subversion``` from ports.


  Configuratins are below.

```
  $ pw groupadd svn<br/>
  $ pw useradd svn -g svn -s /usr/sbin/nologin<br/>
  $ mkdir <i>reposroot</i><br/>
  $ chown -R svn:svn <i>reposroot</i><br/>
  $ chmod -R 775 <i>reposroot</i>
```

  Edit ```/etc/group``` and add repository administrators to svn group.

```
  svn:*:<i>gid</i>:<i>username</i>
```

  Edit ```/etc/rc.conf```.

```
  svnserve_enable="YES"<br/>
  svnserve_data="<i>reposroot</i>"
```

  Then, start ```svnserve``` daemon or reboot.

```
  $ service svnserve start
```

  Lastly, add users to manage subversion repositories to ```svn``` group.

```
  $ pw usermod <i>username</i> -G svn
```
<?php section\name("Creating repositories"); ?>

  Create a repository named <i>reposname</i>.

```
  $ svnadmin create <i>reposroot</i>/<i>reposname</i>
```

  Edit <i>reposroot</i>/<i>reposname</i>/conf/authz.

```
  [/]<br/>
  <i>username</i> = rw<br/>
  * = r
```

  Edit <i>reposroot</i>/<i>reposname</i>/conf/passwd.

```
  [users]<br/>
  <i>username</i> = <i>password</i>
```

  Edit <i>reposroot</i>/<i>reposname</i>/conf/svnserve.conf.

```
  [general]<br/>
  anon-access = read<br/>
  authz-db = authz<br/>
  password-db = passwd
```

  Now, you can access from clients to the host with the URI, svn://<i>hostname</i>/<i>reposname</i>.

<?php section\name("Backing up repositories"); ?>
```
  $ svnadmin dump <i>reposroot</i>/<i>reposname</i> &gt; <i>dumpfile</i>
```
<?php section\name("Restoring repositories"); ?>
```
  $ svnadmin load <i>reposroot</i>/<i>reposname</i> &lt; <i>dumpfile</i>
```
<?php section\name("Deleting or renaming repositories"); ?>

  Just delete or rename the repository's directory.

```
  $ rm -rf <i>reposroot</i>/<i>reposname</i><br/>
  $ mv <i>reposroot</i>/<i>oldreposname</i> <i>reposroot</i>/<i>newreposname</i>
```
<?php subsection\examples(); ?>
  <i>reposroot</i> : /usr/local/svn<br/>
  <i>dumpfile</i> : ~/svn.dmp
<?php subsection\end(); ?>
