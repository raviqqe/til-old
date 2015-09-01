<?php section\name("Installing or Upgrading a package"); ?>
```
  $ pacman -S <i>packagename</i>
```
<?php section\name("Removing a package and other packages required only by it"); ?>
```
  $ pacman -Rs <i>packagename</i>
```
<?php section\name("Upgrading all packages and the system"); ?>
```
  $ pacman -Syu
```
<?php section\name("Updating the package database"); ?>
```
  $ pacman -Sy
```
<?php section\name("Installing a local package"); ?>
```
  $ pacman -U <i>localpackage</i>
```
<?php subsection\examples(); ?>
  <i>packagename</i> : firefox<br/>
  <i>localpackage</i> : firefox.pkg.tar.xz
<?php subsection\end(); ?>
