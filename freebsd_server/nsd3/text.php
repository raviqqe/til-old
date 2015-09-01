<?php section\name("Installation"); ?>

  Download and install ```dns/nsd3``` from ports.


  Edit ```/etc/rc.conf```.

```
  nsd_enable="YES"
```

  Edit ```/usr/local/etc/nsd/nsd.conf```.

```
<?php print(codefile('code/nsd.conf')); ?>
```

  Edit <i>zonefile</i> in ```/usr/local/etc/nsd```.
  It's compatible with BIND's defined in RFC 1034 and RFC 1035.
  Then, compile the zone files.

```
  $ nsdc rebuild
```

  Finally, start the daemon or reboot.

```
  $ service nsd start
```
<?php section\name("Updating zone information"); ?>

  When you edit zone files, run these commands to update the zone information.

```
  $ nsdc rebuild<br/>
  $ nsdc reload
```
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
