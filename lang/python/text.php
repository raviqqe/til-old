<?php section\name("curses apps which read stdin in real time"); ?>

The code below does that. As I'm not sure that, curses module seems to use
sys.stdin as the input source and you should need os.close(0) somehow even when
sys.stdin is overwritten.

```
<?php print(codefile('code/curses_stdin.py')); ?>
```

You can execute it like the below. Without piping, it does nothing and just
exits.

```
$ fortune | the_script_above
```
