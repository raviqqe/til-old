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

To upgrade a package,

```
$ brew upgrade
```

To update fomulas,

```
$ brew update
```


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
