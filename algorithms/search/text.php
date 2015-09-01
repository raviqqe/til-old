<?php section\name("Preparation"); ?>
<p>
  Make sure that <code>base-devel</code> is installed.
</p>
<p class="code"><code>
	# pacman -S base-devel
</code></p>
<?php section\name("Building and installing packages"); ?>
<p>
  Create a directory where you copy files to build packages.
</p>
<p class="code"><code>
	# mkdir <i>aurbuilddir</i> 
</code></p>
<p>
  Download the archive file of a package to build from AUR.
</p>
<p class="code"><code>
  # wget <i>pkgurl</i>
</code></p>
<p>
  Extract it to the build directory.
</p>
<p class="code"><code>
  # tar -xvf <i>pkgtarball</i> -C <i>aurbuilddir</i>
</code></p>
<p>
  Build the package.
</p>
<p class="code"><code>
  # cd <i>aurbuilddir</i>/<i>pkgname</i><br/>
  # makepkg -s
</code></p>
<p>
  Now you will find the package file with the extension,
  ".pkg.tar.xz" in the directory,  <i>aurbuilddir</i>/<i>pkgname</i>.
  Install it.
</p>
<p class="code"><code>
  # pacman -U <i>pkgfile</i>
</code></p>
<?php section\name("Removing packages"); ?>
<p>
  Use <code>pacman</code>.
</p>
<?php section\name("Related files and directories"); ?>
<ul>
  <li><code>/etc/makepkg.conf</code> : the configuration file of <code>makepkg</code> command</li>
</ul>
<?php subsection\examples(); ?>
	<i>aurbuilddir</i> : ~/aur<br/>
	<i>pkgurl</i> : http://aur.archlinux.org/packages/op/openarena/openarena.tar.gz<br/>
	<i>pkgtarball</i> : openarena.tar.gz<br/>
	<i>pkgname</i> : openarena<br/>
	<i>pkgfile</i> : openarena-0.8.8-2-i686.pkg.tar.xz
<?php subsection\end(); ?>
