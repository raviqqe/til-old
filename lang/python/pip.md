# pip


## Reinstall all packages

```
$ pip install --upgrade --force-reinstall $(pip list | awk '{ print $1 }')
```
