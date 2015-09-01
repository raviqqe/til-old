<?php section\name("Installation"); ?>
<p>
  Download and install <code>www/nginx</code> and <code>lang/php5</code> from ports.
</p>
<p>
  Configuratins are below.
</p>
<p class="code"><code>
  $ cp /usr/local/etc/php.ini-production /usr/local/etc/php.ini<br/>
</code></p>
<p>
  In <code>/usr/local/etc/nginx/nginx.conf</code>,
</p>
<p class="code"><code>
<?php print(codefile('code/nginx.conf')); ?>
</code></p>
<p>
  In <code>/etc/rc.conf</code>,
</p>
<p class="code"><code>
  nginx_enable="YES"<br/>
  php_fpm_enable="YES"
</code></p>
<p>
  Then, start <code>nginx</code> and <code>php-fpm</code> daemons or reboot.
</p>
<p class="code"><code>
  $ service nginx start<br/>
  $ service php-fpm start
</code></p>
<?php subsection\examples(); ?>
  <i>domain</i> : www.raviqqe.com<br/>
  <i>docrootdir</i> : /usr/local/www/www.raviqqe.com
<?php subsection\end(); ?>
