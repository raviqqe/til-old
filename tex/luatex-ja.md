# luatex-ja, LuaLaTeX with Japanese

Posted on 2016/2/3

## Using arbitrary fonts

This snippet is tested on TexLive 2015.
Make sure that the font file, `ipagp.otf` is installed in your box.

```
\usepackage{luatexja}
\usepackage{luatexja-fontspec}
\setmainfont{ipagp.otf}
```
