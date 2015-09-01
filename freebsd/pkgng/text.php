<?php section\name("Installation"); ?>
<p>
Install <code>ports-mgmt/pkg</code> from ports.
</p>
<?php section\name("Installing packages"); ?>
<p class="code"><code>
  $ pkg install <i>packagename</i>
</code></p>
<?php section\name("Removing packages"); ?>
<p class="code"><code>
  $ pkg delete <i>packagename</i>
</code></p>
<?php section\name("Upgrading packages"); ?>
<p class="code"><code>
  $ pkg upgrade <i>packagename</i>
</code></p>
<p>
  To upgrade all packages,
</p>
<p class="code"><code>
  $ pkg upgrade
</code></p>
<?php section\name("Updating the repository catalogue"); ?>
<?php subsection\notice(); ?>
  When you get error messages like "failed checksum from repository",
  Try this.
<?php subsection\end(); ?>
<p class="code"><code>
  $ pkg update -f
</code></p>
<?php subsection\examples(); ?>
  <i>packagename</i> : firefox
<?php subsection\end(); ?>
