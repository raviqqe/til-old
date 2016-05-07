# Decorators

## Preserving function decorators

```
import functools

def my_decorator(func):
  @functools.wraps(func)
  def wrapper(*args, **kwargs):
    # some code...
    return func(*args, **kwargs)
  return wrapper

@my_decorator
def my_func():
  # some code...
```



## References

- [Preserving signatures of decorated functions](http://stackoverflow.com/questions/147816/preserving-signatures-of-decorated-functions)
