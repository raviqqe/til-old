# portmaster, the ports management command

If you want to build all ports which is out of date,
the command below may save you time.

```
$ portmaster --no-confirm -adGvy
```

(Notice) If there is the `LICENSES_ASK` line enabled in `/etc/make.conf` file,
you may be asked wheter you accept some ports' licenses to install them
even when `--no-confirm` and `-y` option are specified on the command line.
