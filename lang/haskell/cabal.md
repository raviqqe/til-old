# Cabal Tips

Posted on February 28, 2016


## `cabal update` on the machine having small memory

`cabal update` monopolizes tremendous amount of memory as of cabal v1.16.0.2.
I had this problem on my VPS machine remote with 256MB memory.
Here are some solutions for that.

The same problem has been reported several times.
- [haskell - Limit memory used by cabal install? - Stack Overflow
](http://stackoverflow.com/questions/33546404/limit-memory-used-by-cabal-install)
- [Cabal on low memory device : haskell](https://www.reddit.com/r/haskell/comments/3a5c0e/cabal_on_low_memory_device/)

And, this problem seems to be fixed with the commits related to
[this issue](https://github.com/haskell/cabal/issues/2396).


### Creating a swap partition/file

This could be the most straightforward solution
while it may lead to prohibitive performance loss.

To create a swap partion,

```
$ fdisk /dev/sda
$ mkswap /dev/sda2
$ swapon /dev/sda2
```

Or, to create a swap file,

```
$ dd if=/dev/zero of=/swapfile bs=1M count=1024
$ chmod 600 /swapfile
$ mkswap /swapfile
$ swapon /swapfile
```

Edit `/etc/fstab` for permanent usage of them as you want to.

```
...
/dev/sda2 none swap defaults 0 0
#/swapfile none swap defaults 0 0 # for a swap file
...
```

For more information, see [this article on Arch Linux wiki
](https://wiki.archlinux.org/index.php/swap#Swap_file_creation).


### Download packages manually

The another simple solution is to download a package's tarball
and run `Setup.hs` for each package.
Fortunately, you usually know what packages you want
and `Setup.hs` could tell you what packages are missing
for you to compile the package.
So, in this way, you can deal with most of the cases
sacrificing `cabal`'s convenience.

For example, to install `parsec` package,

```
$ wget https://hackage.haskell.org/package/parsec-3.1.9/parsec-3.1.9.tar.gz
$ tar -xf parsec-3.1.9.tar.gz
$ cd parsec-3.1.9
$ runhaskell Setup.hs configure --user
$ runhaskell Setup.hs build
$ runhaskell Setup.hs install
```


## Starting a new project

```
$ cabal init
```

Then, edit the `$project_name.cabal` file.
