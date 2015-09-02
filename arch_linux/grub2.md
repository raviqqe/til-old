# GRUB 2

Posted on 2015/9/2

## Installing bootcode

When you want to install GRUB 2 into a separated directory (not into `/boot`),
you can specify it with `--boot-directory` option. GRUB 2 would
be installed properly even if it is in a different partition.

```
$ grub-install --boot-directory /mnt/boot \
    --target i386-pc --recheck /dev/sda
```

Then, make a configuration file as usual in the directory.

```
$ grub-mkconfig -o /mnt/boot/grub
```
