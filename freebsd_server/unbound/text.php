<?php section\name("Installation"); ?>

  ```dns/unbound``` is in base (on FreeBSD 10). 


  Edit ```/etc/rc.conf```.

```
  local_unbound_enable="YES"
```

  Run the setup script.

```
  $ local-unbound-setup
```

  Edit ```/etc/unbound/unbound.conf```.

```
<?php print(codefile('code/unbound.conf')); ?>
```

  Finally, start the daemon or reboot.

```
  $ service local_unbound start
```
<?php section\name("Enabling remote control"); ?>

  Add the lines to ```/etc/unbound/unbound.conf```.

```
<?php print(codefile('code/unbound_remote-control.conf')); ?>
```

  Generate a key.

```
  $ sudo -u unbound unbound-control-setup
```

  Now, you can use ```unbound-control``` commnad.

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
