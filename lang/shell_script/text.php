<?php section\name("Preventing wildcards in variables from being parsed"); ?>
<p>
  Put quotes ("") around the variables.
</p>
<p class="code"><code>
  $ var=\*<br/>
  $ echo $var<br/>
  dir1 dir2 file1 file2...<br/>
  $ echo "$var"<br/>
  *
</code></p>
<p>
  Shell parses the variables first and then does other things,
  such as wildcards (* and ?) and escape sequences (\', \? and so on).
  And, if any file whose name includes them doesn't exist, wildcards are not parsed.
</p>
<?php section\name("Variables in a variable"); ?>
<p class="code"><code>
  $ var1=foo<br/>
  $ var2='$var1'<br/>
  $ echo $var2<br/>
  $var1<br/>
  $ eval echo $var2<br/>
  foo
</code></p>
