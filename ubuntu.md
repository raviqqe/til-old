# Ubuntu

## Upgrading from LTS

Edit `/etc/update-manager/release-upgrades`.

```
 ...
-Prompt=lts
+Prompt=normal
```

Run:

```
$ do-release-upgrade
```
