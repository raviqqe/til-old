<?php section\name("curses apps which read stdin in real time"); ?>
<p>
The code below does that. As I'm not sure that, curses module seems to use
sys.stdin as the input source and you should need os.close(0) somehow even when
sys.stdin is overwritten.
</p>
<p class="code"><code>
<?php print(codefile('code/curses_stdin.py')); ?>
</code></p>
<p>
You can execute it like the below. Without piping, it does nothing and just
exits.
</p>
<p class="code"><code>
$ fortune | the_script_above
</code></p>
