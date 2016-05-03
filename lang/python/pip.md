# pip


## Reinstall all packages

```
$ pip install --upgrade --force-reinstall $(pip list | awk '{ print $1 }')
```

When you want to ignore caches, append `--no-cache-dir` option too.
