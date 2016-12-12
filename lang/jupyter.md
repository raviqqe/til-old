# Jupyter

Jupyter Notebook App is basically a web aplication server
acting like a REPL for a programming language.
The differnece from interpreters running on console is that it can create
"notebooks" interactively with its interpreters on the server side
called *kernels*.
The server can run on both a local machine without the Internet connection
and a remote machine over network and then be accessed by a client browser.
And, it also allow clients to manipulate local files on the server side,
not only notebook files but also other text files in some formats
(e.g. *.md and *.c) in a editor.

The server runs kernels which are installed on the server side before use.
Each of them is almost for a programming language (e.g. Python 3 and Julia).

Jupyter notebooks can contain codes in programming languages, their outputs
from kernels, and documents in markup languages.
For example, it may have codes in Python 3 and tables and figures in markdown.

Another interesting stuff is that IPython kernel has integration
with matplotlib to plot graphs as outputs on Jupyter notebooks.
I have no idea whether there are other such integration in some kernels
with libraries which usually needs GUI support.
However, it is pretty convenient anyway, for example, when you have
only a Windows laptop and a Linux server without any screen.


## Installation

Install Anaconda.

```
$ curl https://repo.continuum.io/archive/Anaconda3-4.2.0-Linux-x86_64.sh > install_anaconda.sh
$ bash install_anaconda.sh
```

Then, add `$anaconda_installation_path/bin` to the `PATH` environment variable.
While you may edit `~/.profile` or something, I usually add it to `PATH`
by `export` command every time when I want to use binaries
installed by Anaconda to separate Python's environments.
You may also use [virtual environment of Anaconda](https://uoa-eresearch.github.io/eresearch-cookbook/recipe/2014/11/20/conda/).


## Running on a local machine

```
$ jupyter notebook
```

Jupyter will open a dashboard page in some browser on your machine.


## Running on a remote machine

To run a Jupyter Notebook server (which is basically a HTTP server
as I mentioned above) on a remote machine, you need to configure
the server with SSL encryption (hightly recommanded) and no browser
on the server side.
See [Running a notebook server](http://jupyter-notebook.readthedocs.io/en/latest/public_server.html) for details.

And, note that when your server is configured with SSL, you need to access
to the server on HTTPS connection.
So, don't forget to append `https://` scheme to a URL.
Otherwise you may see some errors like the below on your server's output.
```
...
[W 02:03:28.863 NotebookApp] SSL Error on 9 ('123.45.67.89', 37414): [SSL: WRONG_VERSION_NUMBER] wrong version number (_ssl.c:645)
...
```


## Configuring Jupyter Notebook App

```
$ jupyter notebook --generate-config
$ $your_editor ~/.jupyter/jupyter_notebook_config.py
```

For more information, see [Config file and command line options - Jupyter Notebook](http://jupyter-notebook.readthedocs.io/en/latest/config_overview.html).


## Installing kernels for other languages

Described in [IPython's wiki page](https://github.com/ipython/ipython/wiki/IPython-kernels-for-other-languages).
On Ubuntu 16.04 (Xenial),

```
$ apt-add-repository ppa:chronitis/jupyter
$ apt update
$ apt install iruby # kernel for Ruby
$ apt install ijulia # kernel for Julia
```

You should not need to relaunch `jupyter notebook`.
Just update the browser page.
Then, you can see new kernels in a `New > Notebooks` menu.


## References

- [Jupyter Notebook official documentation](http://jupyter.readthedocs.io/en/latest/)
