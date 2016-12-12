# Upload your package to PyPI

A directory structure of your package should be like this.
How to write `setup.py` is described
[here](https://packaging.python.org/en/latest/distributing/#setup-py).

```
your_package_dir
`- setup.py
`- your_module.py
```

Then, build and upload it.

```
$ python setup.py sdist bdist_wheel
$ pip install twine
$ twine upload dist/*
```


## References

- [Packaging and Distributing Projects - Packaging User Guide documentation](https://packaging.python.org/distributing/#uploading-your-project-to-pypi)
