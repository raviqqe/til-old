<?php section\name("Checking out from the repository to the directory"); ?>
<p class="code"><code>
	$ svn checkout svn://<i>host</i>/<i>reposname</i> <i>destdir</i>
</code></p>
<?php section\name("Importing the source directory to the new repository"); ?>
<p class="code"><code>
	$ svn import <i>sourcedir</i> svn://<i>host</i>/<i>reposname</i> -m "<i>logmessage</i>"
</code></p>
<?php section\name("Making your repository copy up to date"); ?>
<p class="code"><code>
	$ svn update
</code></p>
<?php section\name("Adding a file or a directory to the repository tree"); ?>
<p class="code"><code>
	$ svn add <i>path</i>
</code></p>
<?php section\name("Deleting, copying or moving a file or a directory"); ?>
<p class="code"><code>
	$ svn delete <i>path</i><br/>
	$ svn copy <i>path</i><br/>
	$ svn move <i>path</i>
</code></p>
<?php section\name("Making or removing a directory"); ?>
<p class="code"><code>
	$ svn mkdir <i>directory</i><br/>
	$ svn delete <i>directory</i>
</code></p>
<?php section\name("Commit your changes to the repository"); ?>
<p class="code"><code>
	$ svn commit -m "<i>logmessage</i>"
</code></p>
<?php section\name("Roll back the repository"); ?>
<p class="code"><code>
	$ svn update -r <i>revisionnumber</i>
</code></p>
<?php section\name("Displaying help of svn commands"); ?>
<p class="code"><code>
	$ svn help <i>command</i>
</code></p>
<?php section\name("Other svn commands"); ?>
<p class="code"><code>
	$ svn diff [<i>path</i>]<br/>
	$ svn status [<i>path</i>]
</code></p>
<?php subsection\examples(); ?>
	<i>destdir</i> : ~/svn/repos0<br/>
	<i>host</i> : svnserver.mydomain.com<br/>
	<i>reposname</i> : repos0<br/>
	<i>sourcedir</i> : ~/src<br/>
	<i>path</i> : ~/svn/repos0/fileordir<br/>
	<i>logmessage</i> : commited<br/>
	<i>command</i> : add
<?php subsection\end(); ?>
