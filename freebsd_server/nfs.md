# NFS

## Installation

NFS is in the base system.

## Configuration

Configuratins are below.

Edit `/etc/rc.conf`.

```
mountd_enable="YES"
mountd_flags="-r"
rpcbind_enable="YES"
rpc_lockd_enable="YES"
rpc_statd_enable="YES"
nfs_server_enable="YES"
nfs_reserved_port_only="NO"
```

Edit `/etc/exports` to allow hosts in the network to mount the filesystems.

```
/usr/local/nfs -maproot=root -network 192.168.1.0 -mask 255.255.255.0
```

To allow specific hosts to mount the filesystem.

```
/usr/local/nfs -maproot=root 192.168.2.64 192.168.2.65 192.168.2.66
```

Then, start the daemons or reboot.

```
$ service nfsd start
$ service lockd start
$ service statd start
```
