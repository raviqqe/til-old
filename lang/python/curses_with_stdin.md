# Curses apps which read stdin in real time

The code below does that.
As I'm not sure that, curses module seems to use sys.stdin
as the input source and you need to call os.close(0) somehow
even when sys.stdin is overwritten.

```
#!/usr/bin/env python

import sys, os
import curses
import time

if os.isatty(0):
  exit(1)
else:
  # get stdin from tty
  os.dup2(0, 3)
  os.close(0)
  my_stdin = os.fdopen(3, 'r')
  sys.stdin = open('/dev/tty', 'r')

screen = curses.initscr()
screen.border(0)
screen.addstr(1, 1, 'hello, world!')
screen.refresh()
for i in range(3):
  screen.addstr(2, 1, my_stdin.readline())
  screen.refresh()
  time.sleep(1)
screen.refresh()
screen.getch()
curses.endwin()
```

You can execute it like the below. Without piping, it does nothing and just
exits.

```
$ fortune | the_script_above
```

