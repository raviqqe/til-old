<?php section\name("Installation"); ?>
<p>
Install <code>ja-ibus-mozc</code>.
</p>
<p class="code"><code>
  $ pkg install <i>ja-ibus-mozc</i>
</code></p>
<?php section\name("Configuration"); ?>
<p>
  Edit your <code>~/.xinitrc</code> or <code>~/.xsession</code> and add these
  lines as described in ibus-mozc's pkg-message file.
</p>
<p class="code"><code>
...<br/>
export GTK_IM_MODULE=ibus<br/>
export QT_IM_MODULE=xim<br/>
export XMODIFIERS=@im=ibus<br/>
/usr/local/bin/mozc start<br/>
ibus-daemon -r --daemonize --xim<br/>
...
</code></p>
<p>
  Launch <code>ibus-setup</code>, go to 'Input Method' tab and add mozc as a
  input method in the 'Japanese' section.
</p>
<p>
  Finally, reboot your system.
</p>
<?php section\name("US keyboard"); ?>
<p>
  When you have a US keyboard, then you may want to change your keymap of mozc.
  Then, launch <code>ibus-setup</code> and go to 'Input Method' tab,
  click 'Japanese - Mozc' and 'Preferences', and change your keymap
  clicking 'Custmize...' of 'Keymap style' in the mozc configuration window.
  Specifically, you may need to change 'IME on' command in 'DirectInput' mode.
</p>
