<?php section\name("Removing gaps between terminal emulators"); ?>
<p>
	Edit  this line in <code>config.h</code>.
</p>
<p class="code"><code>
	static const Bool resizehints = False;
</code></p>
<p>
	Then, compile and install it.
</p>
<?php section\name("Setting the default terminal emulator"); ?>
<p>
	Edit  this line in <code>config.h</code>.
</p>
<p class="code"><code>
	static const char *termcmd[]  = { "<i>yourterm</i>", NULL };
</code></p>
<p>
	Then, compile and install it.
</p>
<?php subsection\examples(); ?>
	<i>yourterm</i> : urxvt
<?php subsection\end(); ?>
