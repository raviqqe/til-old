<?php section\name("Installing bootcode"); ?>
<p>
  When you want to install grub2 into a separated directory (not into /boot),
  you can specify it with <code>--boot-directory</code> option. Grub2 would
  be installed properly even if it is in a different partition.
</p>
<p class="code"><code>
  $ grub-install --boot-directory <i>directory</i> \<br/>
    --target i386-pc --recheck <i>device</i>
</code></p>
<p>
  Then, make a configuration file as usual in the directory.
</p>
<p class="code"><code>
  $ grub-mkconfig -o <i>grubdir</i>
</code></p>
<?php subsection\examples(); ?>
  <i>directory</i> : /mnt/boot<br/>
  <i>device</i> : /dev/sda<br/>
  <i>grubdir</i> : /mnt/boot/grub
<?php subsection\end(); ?>
