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


## Shutting down a frozen connection

Type `~.` which sends an escape sequence to the client
to shut down the connection.


## Generating keys

```
$ ssh-keygen -t ed25519 -C "raviqqe@gmail.com"
```


## References

- [ssh 技術文書: リモートへのトンネルと、リモートからのトンネルの例](http://www.xdip.com/?id=ssh-tunnel)
- [Properly Close a Frozen SSH Session](http://blog.infertux.com/2012/12/20/properly-close-a-frozen-ssh-session/)
- [Generating a new SSH key and adding it to the ssh-agent - User Documentation](https://help.github.com/articles/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent/)
