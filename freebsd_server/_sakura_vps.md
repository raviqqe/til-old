# さくらVPSでのFreeBSD 10.2のクリーンインストール
# Installing FreeBSD 10.2 on Sakura VPS through its ISO image server

さくらVPSにFreeBSD 10.2を導入しました。さくらVPSには任意のISOイメージを
さくら側の専用サーバにアップロードし、そのイメージからOSを
インストールする機能があります。
使用したISOイメージはFreeBSD-10.2-RELEASE-amd64-bootonly.isoです。


## ISOイメージのアップロード

まず、FreeBSD公式サイトからFreeBSD-10.2-RELEASE-amd64-bootonly.isoの
ISOイメージをローカルマシンにダウンロードします。bootonlyなのはアップロードに
時間がかけたくないためです。
ローカルマシンのFreeBSD上で作業している場合、チェックサムもダウンロードすれば
以下のコマンドでチェックできます。

```
sha256 FreeBSD-10.2-RELEASE-amd64-bootonly.iso

```
このISOイメージをさくらのコントロールパネルからアップロードし、手順に
従えば後は通常のOSインストールと同様です。

## FreeBSDのbsdinstallによるインストール

注意すべき部分はネットワーク接続のみです。IPv4、IPv6共に設定しますが
さくらから帝京された固定IPを用います。そのため、DHCPやSLAACの代わりに
さくらのコントロールパネルを見ながら、提供されたIP、ゲートウェイ等を
設定します。

また、インストール後には、IPv6のリンクローカルアドレスに関する問題により、
`/etc/rc.conf`を編集しなければなりません。


