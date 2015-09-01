<?php section\name("Preventing wildcards in variables from being parsed"); ?>

  Put quotes ("") around the variables.

```
  $ var=\*<br/>
  $ echo $var<br/>
  dir1 dir2 file1 file2...<br/>
  $ echo "$var"<br/>
  *
```

  Shell parses the variables first and then does other things,
  such as wildcards (* and ?) and escape sequences (\', \? and so on).
  And, if any file whose name includes them doesn't exist, wildcards are not parsed.

<?php section\name("Variables in a variable"); ?>
```
  $ var1=foo<br/>
  $ var2='$var1'<br/>
  $ echo $var2<br/>
  $var1<br/>
  $ eval echo $var2<br/>
  foo
```
