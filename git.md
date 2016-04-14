# Git

Posted on: 2016/04/12
Edited on: 2016/04/14


## `git submodule`

`git submodule` is a subcommand of `git` to manage recursive git repositories
(i.e. git repos in git repos).

To add a submodule,

```
$ git submodule add $git_repo_uri $dir
$ git commit -m $commit_message
```

To delete a submodule,

```
$ git submodule deinit $path_to_submodule
$ git rm $path_to_submodule
```


# `git add`

To commit a part of a file,

```
$ git add --patch $file
```
