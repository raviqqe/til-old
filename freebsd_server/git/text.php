<?php section\name("Installation"); ?>

  Download and install ```devel/git``` from ports.


  Configuratins are below.

```
  $ pw groupadd git<br/>
  $ pw useradd git -g git -s /usr/sbin/nologin<br/>
  $ mkdir <i>reposroot</i><br/>
  $ chown -R git:git <i>reposroot</i><br/>
  $ chmod -R 775 <i>reposroot</i>
```
<?php subsection\notice(); ?>
  Be sure that the <i>reposroot</i> and files and directories in it are owned by ```git:git```
  and their permissions are set to ```775``` such that git server has proper access to them. 
<?php subsection\end(); ?>

  Edit ```/etc/group``` and add repository administrators to git group if you want.

```
  git:*:<i>gid</i>:<i>username</i>
```

  Edit ```/etc/rc.conf```.

```
  git_daemon_enable="YES"<br/>
  git_daemon_directory="<i>reposroot</i>"<br/>
  git_daemon_flags="--syslog --base-path=/git --export-all"
```

  Then, start ```gitserve``` daemon or reboot.

```
  $ service git_daemon start
```
<?php subsection\examples(); ?>
  <i>reposroot</i> : /srv/git<br/>
<?php subsection\end(); ?>
