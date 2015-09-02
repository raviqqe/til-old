# cron

Posted on 2015/9/1

## Updating the system automatically

Edit root's crontab.

```
sudo crontab -e
```

An example of crontab which updates ports and the base system daily is below.

```
SHELL=/bin/sh
PATH=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin
HOME=/root

0 1 * * * portsnap cron update > $HOME/portsnap.log
0 2 * * * portmaster --no-confirm -adGvy > $HOME/portmaster.log
0 3 * * * freebsd-update cron install > $HOME/freebsd-update.log
```
