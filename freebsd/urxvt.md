# urxvt

Posted on: 2015/10/29


## Displaying Unicode characters

To display unicode characters on urxvt, unicode fonts must be set up
in .Xdefaults or .Xresources.

```
urxvt*font: xft:Terminus:pixelsize=12,antialias=false
urxvt*italicFont: xft:Terminus:pixelsize=12,antialias=false
urxvt*boldFont: xft:Terminus:bold:pixelsize=12,antialias=false
urxvt*boldItalicFont: xft:Terminus:bold:pixelsize=12,antialias=false
```

And the locale must be set in .xinitrc or .xsession before launching urxvt.

```
LANG=en_US.UTF-8
```
