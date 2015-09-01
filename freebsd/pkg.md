# pkgng, the package management command
<?php section\name("Installation"); ?>

Install ```ports-mgmt/pkg``` from ports.

<?php section\name("Installing packages"); ?>
```
  $ pkg install <i>packagename</i>
```
<?php section\name("Removing packages"); ?>
```
  $ pkg delete <i>packagename</i>
```
<?php section\name("Upgrading packages"); ?>
```
  $ pkg upgrade <i>packagename</i>
```

  To upgrade all packages,

```
  $ pkg upgrade
```
<?php section\name("Updating the repository catalogue"); ?>
<?php subsection\notice(); ?>
  When you get error messages like "failed checksum from repository",
  Try this.
<?php subsection\end(); ?>
```
  $ pkg update -f
```
<?php subsection\examples(); ?>
  <i>packagename</i> : firefox
<?php subsection\end(); ?>
