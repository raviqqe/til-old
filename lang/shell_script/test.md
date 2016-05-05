# test

## `-n` option

```
$ [ -n ]; echo $?
0
$ [ -n a ]; echo $?
0
$ [ -n '' ]; echo $?
1
$ foo=a
$ [ -n $foo ]; echo $?
0
$ unset foo
$ [ -n $foo ]; echo $?
0
$ [ -n "$foo" ]; echo $?
1
$ foo=
$ [ -n $foo ]; echo $?
0
$ [ -n "$foo" ]; echo $?
1
```

Just sucks.
