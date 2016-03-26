# Git server by ssh

To run a git repository server, you don't need any daemon running on it.
You need only ssh server.

```
$ service sshd start
```

Then, clone your repository from the server on clients via ssh protocol.

```
$ git clone ssh://your.git.server/home/username/git/foo.git
```


## Push to your repositories

When you also want to push changes on local repositories,
you should create and use bare repositories on your server.

```
$ git init --bare /home/username/git/foo.git
```
