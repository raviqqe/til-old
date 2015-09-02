# Using mozc with ibus

Posted on 2015/9/2

## Installation

Install `ja-ibus-mozc`.

```
$ pkg install ja-ibus-mozc
```

## Configuration

Edit your `~/.xinitrc` or `~/.xsession` and add these
lines as described in ibus-mozc's pkg-message file.

```
export GTK_IM_MODULE=ibus
export QT_IM_MODULE=xim
export XMODIFIERS=@im=ibus
/usr/local/bin/mozc start
ibus-daemon -r --daemonize --xim
```

Launch `ibus-setup` command, go to 'Input Method' tab and add `mozc` as a
input method in the 'Japanese' section.

Finally, reboot your system and launch X window system.

## US keyboard

When you have a US keyboard, then you may want to change your keymap of mozc.
Then, launch `ibus-setup` and go to 'Input Method' tab,
click 'Japanese - Mozc' and 'Preferences', and change your keymap
clicking 'Custmize...' of 'Keymap style' in the mozc configuration window.
Specifically, you may need to change 'IME on' command in 'DirectInput' mode.

