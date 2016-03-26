# Preventing wildcards in variables from being parsed

Put double quotes ("") around the variables.

```
$ var=\*
$ echo $var
dir1 dir2 file1 file2...
$ echo "$var"
*
```

Shell parses the variables first and then evaluates other things,
such as wildcards (* and ?) and escape sequences (\', \? and so on).
And, if any file whose name includes them doesn't exist,
wildcards are not evaluated.


## Variables in a variable

```
$ var1=foo
$ var2='$var1'
$ echo $var2
$var1
$ eval echo $var2
foo
```
