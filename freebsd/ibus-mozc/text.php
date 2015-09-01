<?php section\name("Installation"); ?>

Install ```ja-ibus-mozc```.

```
  $ pkg install <i>ja-ibus-mozc</i>
```
<?php section\name("Configuration"); ?>

  Edit your ```~/.xinitrc``` or ```~/.xsession``` and add these
  lines as described in ibus-mozc's pkg-message file.

```
...<br/>
export GTK_IM_MODULE=ibus<br/>
export QT_IM_MODULE=xim<br/>
export XMODIFIERS=@im=ibus<br/>
/usr/local/bin/mozc start<br/>
ibus-daemon -r --daemonize --xim<br/>
...
```

  Launch ```ibus-setup```, go to 'Input Method' tab and add mozc as a
  input method in the 'Japanese' section.


  Finally, reboot your system.

<?php section\name("US keyboard"); ?>

  When you have a US keyboard, then you may want to change your keymap of mozc.
  Then, launch ```ibus-setup``` and go to 'Input Method' tab,
  click 'Japanese - Mozc' and 'Preferences', and change your keymap
  clicking 'Custmize...' of 'Keymap style' in the mozc configuration window.
  Specifically, you may need to change 'IME on' command in 'DirectInput' mode.

