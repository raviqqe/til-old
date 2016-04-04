# SSH

Posted on: 2016/4/4


## SSH port forwarding

Use `-L` option. It accepts a local address optionally.
For more information, see `man ssh`.

```
$ ssh -g -L $local_port:$remote_host:$remote_port $user_name@$remote_host
```

For example, 

```
$ ssh -g -L 8080:192.168.0.1:80 myname@192.168.0.1
```


## References

- [ssh 技術文書: リモートへのトンネルと、リモートからのトンネルの例](http://www.xdip.com/?id=ssh-tunnel)
