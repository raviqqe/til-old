# systemd

## Viewing and setting the default runlevel

To view the current default runlevel, run:

```
$ systemctl get-default
```

To set the default runlevel, run:

```
$ systemctl set-default $target_name.target
```

`$target_name` can be `multi-user` or `graphical` for usual use.
