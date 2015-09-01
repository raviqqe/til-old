<?php section\name("Installation"); ?>
```
  $ pacman -S stardict
```
<?php section\name("Adding local dictionaries"); ?>

  Download dictionary files from the Internet.

```
  $ wget <i>urltodict</i>
```

  Extract it to stardict's dictionary directory.

```
  $ tar -xvf <i>dicttarball</i> -C /usr/share/stardict/dic
```
<?php subsection\examples(); ?>
  <i>urltodict</i> : http://abloz.com/huzheng/stardict-dic/ja/stardict-jmdict-en-ja-2.4.2.tar.bz2<br/>
  <i>dicttarball</i> : stardict-jmdict-en-ja-2.4.2.tar.bz2
<?php subsection\end(); ?>
