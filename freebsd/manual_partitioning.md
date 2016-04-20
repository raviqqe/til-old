# Create partitions on bsdinstall manually

Posted on: 2016/4/20


# Let's do it!

- Proposition
  - on UEFI based system

- Partitions
  - EFI system partition
    - type: efi
    - size: 8GB (This may be too large for you. The default is 800K.)
    - mount point: (nothing)
    - label: EFI
  - Root partition
    - type: freebsd-ufs
    - size: 256GB
    - mount point: /
    - label: FreeBSDRoot (whatever)
  - Swap partition
    - freebsd-swap
    - size: 8GB
    - mount point: none (see `man fstab`)
    - label: FreeBSDSwap (whatever)

Then, continue to the step where you extract archives.
After installation, you will see `/efi/boot/bootx64.efi`
in the partition labeled as EFI.
