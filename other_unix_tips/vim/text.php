<?php section\name(".vimrc, setting file"); ?>

  Enable syntax highlighting.

```
  syntax on
```

  Show line numbers.

```
  set number
```

  Prevent vim from createing backup files.

```
  set nobackup
```

  In insert mode, backspace key can also be used to delete new-line characters (```eol```),
  automatically generated  indents (```indent```), and characters which was present
  before got into insert mode (```start```). 

```
  set backspace=start,eol,indent
```

  Allow cursor to move across lines from the first and last chatacters in them.
  The key correspondence table is below.

<table>
  <thead>
    <tr><th>letter</th><th>key</th></tr>
  </thead>
  <tbody>
    <tr><td>b</td><td>backspace key</td></tr>
    <tr><td>s</td><td>space key</td></tr>
    <tr><td>[</td><td>left arrow key in normal and visual modes</td></tr>
    <tr><td>]</td><td>right arrow key in normal and visual modes</td></tr>
    <tr><td>&lt;</td><td>left arrow key in insert mode</td></tr>
    <tr><td>&gt;</td><td>right arrow key in insert mode</td></tr>
    <tr><td>^</td><td>caret key</td></tr>
  </tbody>
</table>
```
  set whichwraps=b,s,&lt;,&gt;,[,],^
```

  Make searched words highlighted.

```
  set hlsearch
```
