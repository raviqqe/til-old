# portmaster, the ports management command

Posted on 2015/9/2

## Updating all ports automatically

If you want to build all ports which is out of date,
the command below may save you time.

```
$ portmaster --no-confirm -adGvy
```

(Notice) If there is the `LICENSES_ASK` line enabled in `/etc/make.conf` file,
you may be asked wheter you accept some ports' licenses to install them
even when `--no-confirm` and `-y` option are specified on the command line.


## Installing vim with Python 3.5 support

As of 2016/5/2, installing vim with Python3.5 support may go well
as running `vim` says something like
`Shared object, /usr/local/lib/libpython3.5dm.so not found`.
This is because the dynamic library of Python 3.5 is
at `/usr/local/lib/libpython3.5dm.so` while vim needs `.../libpython3.5m.so`.

To put it there, `lang/python35`'s default configuration needs to be changed
so that `DEBUG` flag is off.
And, then, recompile `lang/python35`, which would solves the problem.
(As noted above, `libpython3.5dm.so`'s `d` can stem from Debugging.)
