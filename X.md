# X server

## Killing X server on Fedora 23 (systemd based)

```
$ init 3
```


## List up and search for fonts

Use `xlsfonts` maybe with XLFD (X Logical Font Description) pattern.

```
$ xlsfonts [-fn <XLFD pattern>]
```

Use `fc-list` with font names of Xft (X freetype?) description.

```
$ fc-list [<pattern>]
```
