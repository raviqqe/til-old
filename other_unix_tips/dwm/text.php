<?php section\name("Removing gaps between terminal emulators"); ?>

	Edit  this line in ```config.h```.

```
	static const Bool resizehints = False;
```

	Then, compile and install it.

<?php section\name("Setting the default terminal emulator"); ?>

	Edit  this line in ```config.h```.

```
	static const char *termcmd[]  = { "<i>yourterm</i>", NULL };
```

	Then, compile and install it.

<?php subsection\examples(); ?>
	<i>yourterm</i> : urxvt
<?php subsection\end(); ?>
