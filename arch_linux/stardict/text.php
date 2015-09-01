<?php section\name("Installation"); ?>
<p class="code"><code>
  $ pacman -S stardict
</code></p>
<?php section\name("Adding local dictionaries"); ?>
<p>
  Download dictionary files from the Internet.
</p>
<p class="code"><code>
  $ wget <i>urltodict</i>
</code></p>
<p>
  Extract it to stardict's dictionary directory.
</p>
<p class="code"><code>
  $ tar -xvf <i>dicttarball</i> -C /usr/share/stardict/dic
</code></p>
<?php subsection\examples(); ?>
  <i>urltodict</i> : http://abloz.com/huzheng/stardict-dic/ja/stardict-jmdict-en-ja-2.4.2.tar.bz2<br/>
  <i>dicttarball</i> : stardict-jmdict-en-ja-2.4.2.tar.bz2
<?php subsection\end(); ?>
