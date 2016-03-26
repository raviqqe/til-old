# Upload your package with PyPI

The directory structure of your package should be like this.
How to write `setup.py` is described
[here](https://packaging.python.org/en/latest/distributing/#setup-py).

```
your_package_dir
`- setup.py
`- your_package.py
```

Then, register your package.

```
$ python setup.py register 
```

Finally, upload it.

```
$ python setup.py sdist upload
```
