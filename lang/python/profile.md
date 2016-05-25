# Profiling

## Profiling Python scripts with `cProfile` and `cprofilev`

First, install `cprofilev`.

```
$ pip install cprofilev
```

Then, run your script.

```
$ python -m cProfile -o cprofile_result.bin my_script.py
$ cprofilev -p $some_port -f cprofile_result.bin
```

Finally, view the profiling result at `http://127.0.0.1:$some_port/`
on your web browser.


## References

- [Profiling python with cProfile](https://ymichael.com/2014/03/08/profiling-python-with-cprofile.html)
