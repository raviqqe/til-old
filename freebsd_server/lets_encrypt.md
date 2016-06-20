# Let's Encrypt

## Installation

```
$ pkg install py27-letsencrypt
```

Get the certificates.

```
$ letsencrypt certonly
```

Edit crontab and add a record of running `letsencrypt renew`.

```
$ crontab -e
```


## References

- [Certbot.org](https://certbot.eff.org/#freebsd-nginx)
