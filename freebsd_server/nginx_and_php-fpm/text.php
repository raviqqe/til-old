<?php section\name("Installation"); ?>

  Download and install ```www/nginx``` and ```lang/php5``` from ports.


  Configuratins are below.

```
  $ cp /usr/local/etc/php.ini-production /usr/local/etc/php.ini<br/>
```

  In ```/usr/local/etc/nginx/nginx.conf```,

```
<?php print(codefile('code/nginx.conf')); ?>
```

  In ```/etc/rc.conf```,

```
  nginx_enable="YES"<br/>
  php_fpm_enable="YES"
```

  Then, start ```nginx``` and ```php-fpm``` daemons or reboot.

```
  $ service nginx start<br/>
  $ service php-fpm start
```
<?php subsection\examples(); ?>
  <i>domain</i> : www.raviqqe.com<br/>
  <i>docrootdir</i> : /usr/local/www/www.raviqqe.com
<?php subsection\end(); ?>
