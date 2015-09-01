<?php section\name("Checking out from the repository to the directory"); ?>
```
	$ svn checkout svn://<i>host</i>/<i>reposname</i> <i>destdir</i>
```
<?php section\name("Importing the source directory to the new repository"); ?>
```
	$ svn import <i>sourcedir</i> svn://<i>host</i>/<i>reposname</i> -m "<i>logmessage</i>"
```
<?php section\name("Making your repository copy up to date"); ?>
```
	$ svn update
```
<?php section\name("Adding a file or a directory to the repository tree"); ?>
```
	$ svn add <i>path</i>
```
<?php section\name("Deleting, copying or moving a file or a directory"); ?>
```
	$ svn delete <i>path</i><br/>
	$ svn copy <i>path</i><br/>
	$ svn move <i>path</i>
```
<?php section\name("Making or removing a directory"); ?>
```
	$ svn mkdir <i>directory</i><br/>
	$ svn delete <i>directory</i>
```
<?php section\name("Commit your changes to the repository"); ?>
```
	$ svn commit -m "<i>logmessage</i>"
```
<?php section\name("Roll back the repository"); ?>
```
	$ svn update -r <i>revisionnumber</i>
```
<?php section\name("Displaying help of svn commands"); ?>
```
	$ svn help <i>command</i>
```
<?php section\name("Other svn commands"); ?>
```
	$ svn diff [<i>path</i>]<br/>
	$ svn status [<i>path</i>]
```
<?php subsection\examples(); ?>
	<i>destdir</i> : ~/svn/repos0<br/>
	<i>host</i> : svnserver.mydomain.com<br/>
	<i>reposname</i> : repos0<br/>
	<i>sourcedir</i> : ~/src<br/>
	<i>path</i> : ~/svn/repos0/fileordir<br/>
	<i>logmessage</i> : commited<br/>
	<i>command</i> : add
<?php subsection\end(); ?>
