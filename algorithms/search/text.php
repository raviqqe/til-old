<?php section\name("Preparation"); ?>

  Make sure that ```base-devel``` is installed.

```
	# pacman -S base-devel
```
<?php section\name("Building and installing packages"); ?>

  Create a directory where you copy files to build packages.

```
	# mkdir <i>aurbuilddir</i> 
```

  Download the archive file of a package to build from AUR.

```
  # wget <i>pkgurl</i>
```

  Extract it to the build directory.

```
  # tar -xvf <i>pkgtarball</i> -C <i>aurbuilddir</i>
```

  Build the package.

```
  # cd <i>aurbuilddir</i>/<i>pkgname</i><br/>
  # makepkg -s
```

  Now you will find the package file with the extension,
  ".pkg.tar.xz" in the directory,  <i>aurbuilddir</i>/<i>pkgname</i>.
  Install it.

```
  # pacman -U <i>pkgfile</i>
```
<?php section\name("Removing packages"); ?>

  Use ```pacman```.

<?php section\name("Related files and directories"); ?>
<ul>
  <li>```/etc/makepkg.conf``` : the configuration file of ```makepkg``` command</li>
</ul>
<?php subsection\examples(); ?>
	<i>aurbuilddir</i> : ~/aur<br/>
	<i>pkgurl</i> : http://aur.archlinux.org/packages/op/openarena/openarena.tar.gz<br/>
	<i>pkgtarball</i> : openarena.tar.gz<br/>
	<i>pkgname</i> : openarena<br/>
	<i>pkgfile</i> : openarena-0.8.8-2-i686.pkg.tar.xz
<?php subsection\end(); ?>
