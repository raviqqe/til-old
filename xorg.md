# X server

## Killing X server on Fedora 23 (systemd based)

```
$ init 3
```


## Listing fonts

```
$ xlsfonts [-fn <XLFD pattern>]
```

or

```
$ fc-list [<pattern>]
```

The former is for [XLFD](https://en.wikipedia.org/wiki/X_logical_font_description)
and the latter is for the modern [XFT](https://en.wikipedia.org/wiki/Xft)
(which is based on the [Fontconfig](https://www.freedesktop.org/wiki/Software/fontconfig/) library).


## References

- [xlsfonts(1) manual page](ftp://www.x.org/pub/X11R7.5/doc/man/man1/xlsfonts.1.html)
- [fc-list(1): available fonts - Linux man page](http://linux.die.net/man/1/fc-list)
