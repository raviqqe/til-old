# wpa\_supplicant, the wifi client daemon

# Setting up the connection

`wpa_supplicant` is in base.

First, append the SSID and passphrase of your wireless router
to its configuration file.

```
$ wpa_passphrase YOUR_SSID YOUR_PASSPHRASE >> /etc/wpa_supplicant.conf
```

Then, edit `rc.conf`.

```
wlans_run0="wlan0"
ifconfig_wlan0="WPA SYNCDHCP"
```

At last, restart the network service or reboot.

```
$ service netif restart
```
