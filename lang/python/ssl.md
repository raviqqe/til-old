# Compiling Python with SSL support

Edit `Modules/Setup.dist`. The example below works fine on FreeBSD 11.0 with openssl package installed.

```
...

# Socket module helper for SSL support; you must comment out the other
# socket line above, and possibly edit the SSL variable:
SSL=/usr/local/openssl
_ssl _ssl.c \
        -DUSE_SSL -I$(SSL)/include -I$(SSL)/include/openssl \
        -L$(SSL)/lib -lssl -lcrypto

...
```

Compile python.

```
$ ./configure
$ make
$ make install
```


## References

- [openssl - Building Python with SSL support in non-standard location - Stack Overflow](http://stackoverflow.com/questions/5937337/building-python-with-ssl-support-in-non-standard-location)
