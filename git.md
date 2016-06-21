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

To replace a submodule with another one, just edit its URI in `.gitmodule`.
And, then run `git submodule sync`.


## `git add`

To commit a part of a file,

```
$ git add --patch $file
```


## `git rebase`

To rebase commits to a branch interactively,

```
$ git rebase -i
```


## `git tag`

Unannotated tags are tags have only names.
To tag a commit without annotation,

```
$ git tag $tag_name
```

Annotated tags are tags have names and messages.
To tag a commit with annotation,

```
$ git tag -a $tag_name [-m $message]
```


## Undoing `git rebase`

```
$ git reflog # find the last commit where the `git rebase` was not done
$ git reset --head HEAD@{$number}
```


## `git remote`

To delete all stale remote branches, run:

```
$ git remote prune $remote
```


## Enabling credential storage for HTTPS

```
$ git config --global credential.helper cache
```

## Sharing repositories by UNIX group

Create repositories with the `--shared=group` option.

```
$ git init --bare --shared=group repo.git
```

To share existing repositories, run:

```
$ git -C $repo_dir config core.sharedRepository group
$ chmod -R g+rw $repo_dir
$ chmod g+s $(find $repo_dir -type d)
```


## References

- [How do I remove a submodule?](http://stackoverflow.com/questions/1260748/how-do-i-remove-a-submodule)
