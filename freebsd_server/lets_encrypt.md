# Let's Encrypt

## Installation (with nginx)

```
$ pkg install py27-letsencrypt
```

Get the certificate.

```
$ letsencrypt certonly
```

Edit crontab and add a record of running `letsencrypt renew`.

```
$ crontab -e
```

Link the certificate and private key into nginx's configuration directory.

```
$ cd /usr/local/etc/nginx
$ mkdir ssl
$ cd ssl
$ ln -s /usr/local/etc/letsencrypt/live/your.domain.com/fullchain.pem fullchain.pem
$ ln -s /usr/local/etc/letsencrypt/live/your.domain.com/privkey.pem privkey.pem
```

Edit nginx's configuration file.

```
...

http {
  ...

  server {
    ...

    listen 443 ssl;

    ssl_certificate ssl/fullchain.pem;
    ssl_certificate_key ssl/privkey.pem;

    ...
  }

  ...
}
```

Restart `nginx`.

```
$ service nginx restart
```


## Redirecting HTTP requests

```
http {
  ...

  server {
    ...

    listen 80;
    return 301 https://$host$request_uri;

    ...
  }

  ...
}
```


## References

- [Certbot.org](https://certbot.eff.org/#freebsd-nginx)
