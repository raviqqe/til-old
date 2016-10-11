# Linuxbrew

The fork of Homebrew for Linux


## Installation

```
$ git clone https://github.com/Linuxbrew/linuxbrew.git $HOME/.linuxbrew
```

Then, edit your `.profile`.

```
...
linuxbrew_dir=$HOME/.linuxbrew
export PATH="$linuxbrew_dir/bin:$PATH"
export MANPATH="$linuxbrew_dir/share/man:$MANPATH"
export LIBRARY_PATH="$linuxbrew_dir/lib64:$linuxbrew_dir/lib:$LIBRARY_PATH"
...
```


## Usage

To install a package,

```
$ brew install $package_name
```

To see a list of options for a package,

```
$ brew info $package_name
```

To upgrade a package,

```
$ brew upgrade
```

To update fomulas,

```
$ brew update
```


## Reinstallation

First, delete directories related to linuxbrew.

```
$ rm -rf $linuxbrew_dir # e.g. ~/.linuxbrew
$ rm -rf .cache/Homebrew
```

Then, follow the installation section above.


## Installing XXX On Ubuntu

### Vim

Install `perl` first.

```
$ brew install perl
$ brew install vim --with-python3 --with-lua
```

### Neovim

Install `unzip` first.

```
$ brew install unzip
$ brew install neovim/neovim/neovim
```


## Troubleshooting

When you see something like:

```
Error: No Ruby found, cannot proceed.
```

or

```
Error: Git must be installed and in your PATH!
```

Install ruby.
