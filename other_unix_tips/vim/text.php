<?php section\name(".vimrc, setting file"); ?>
<p>
  Enable syntax highlighting.
</p>
<p class="code"><code>
  syntax on
</code></p>
<p>
  Show line numbers.
</p>
<p class="code"><code>
  set number
</code></p>
<p>
  Prevent vim from createing backup files.
</p>
<p class="code"><code>
  set nobackup
</code></p>
<p>
  In insert mode, backspace key can also be used to delete new-line characters (<code>eol</code>),
  automatically generated  indents (<code>indent</code>), and characters which was present
  before got into insert mode (<code>start</code>). 
</p>
<p class="code"><code>
  set backspace=start,eol,indent
</code></p>
<p>
  Allow cursor to move across lines from the first and last chatacters in them.
  The key correspondence table is below.
</p>
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
<p class="code"><code>
  set whichwraps=b,s,&lt;,&gt;,[,],^
</code></p>
<p>
  Make searched words highlighted.
</p>
<p class="code"><code>
  set hlsearch
</code></p>
