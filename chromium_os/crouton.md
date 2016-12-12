# Crouton

On Chrome OS,

```
$ wget -O crouton https://goo.gl/fd3zc
$ sudo sh crouton -r zesty -t xfce # Type a primary username and password following prompts
$ sudo startxfce4
```


## Installing dwm

```
$ sudo enter-chroot # in a shell of Chrome OS
$ sudo apt install dwm # in a chroot environment
$ echo "exec dwm" > ~/.xinitrc
$ xinit
```

Use `xinit` instead of `startx` which freezes your PC.
See [this issue](https://github.com/dnschneid/crouton/issues/1923) for more information.


## Listing up distros

```
$ sudo sh crouton -r list
```


## Listing up desktop environments

```
$ sudo sh crouton -t list
```


## References

- [dnschneid/crouton: Chromium OS Universal Chroot Environment](https://github.com/dnschneid/crouton)
