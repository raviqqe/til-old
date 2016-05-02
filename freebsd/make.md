# make (so called BSD make (bmake))


## An example of `/etc/make.conf`

```
ALWAYS_CHECK_MAKE = yes
MAKE_JOBS_NUMBER = 8

CFLAGS += -O0 -g
CXXFLAGS += ${CFLAGS}

SVN_UPDATE = yes

DEFAULT_VERSIONS = python=3.5 python3=3.5 ruby=2.3
```

For more information, see `man make.conf` and `/usr/ports/Mk/bsd.port.mk`.
