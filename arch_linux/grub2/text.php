<?php section\name("Installing bootcode"); ?>

  When you want to install grub2 into a separated directory (not into /boot),
  you can specify it with ```--boot-directory``` option. Grub2 would
  be installed properly even if it is in a different partition.

```
  $ grub-install --boot-directory <i>directory</i> \<br/>
    --target i386-pc --recheck <i>device</i>
```

  Then, make a configuration file as usual in the directory.

```
  $ grub-mkconfig -o <i>grubdir</i>
```
<?php subsection\examples(); ?>
  <i>directory</i> : /mnt/boot<br/>
  <i>device</i> : /dev/sda<br/>
  <i>grubdir</i> : /mnt/boot/grub
<?php subsection\end(); ?>
