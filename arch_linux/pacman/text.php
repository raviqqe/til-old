<?php section\name("Installing or Upgrading a package"); ?>
<p class="code"><code>
  $ pacman -S <i>packagename</i>
</code></p>
<?php section\name("Removing a package and other packages required only by it"); ?>
<p class="code"><code>
  $ pacman -Rs <i>packagename</i>
</code></p>
<?php section\name("Upgrading all packages and the system"); ?>
<p class="code"><code>
  $ pacman -Syu
</code></p>
<?php section\name("Updating the package database"); ?>
<p class="code"><code>
  $ pacman -Sy
</code></p>
<?php section\name("Installing a local package"); ?>
<p class="code"><code>
  $ pacman -U <i>localpackage</i>
</code></p>
<?php subsection\examples(); ?>
  <i>packagename</i> : firefox<br/>
  <i>localpackage</i> : firefox.pkg.tar.xz
<?php subsection\end(); ?>
