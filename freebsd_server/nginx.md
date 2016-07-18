# nginx, the web server

## Virtual hosts

The first server will be default unless `default_server` is specified.

```
http {
  server {
    server_name my.domain.com;

    ...

  }

  server {
    server_name your.domain.com;
    listen 80 default_server;

    ...

  }
}
```


## Reverse proxy

```
http {
  server {

    ...

    location {
      proxy_pass http://far.away.server.com/;
    }
  }
}
```


## Building with `libressl`

Edit `/etc/make.conf`.

```
DEFAULT_VERSIONS += ssl=libressl
```
