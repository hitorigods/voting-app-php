# 投票アプリ by PHP

PHP、Apache、MySQL の Docker 環境でのノーフレームワーク構築

![ER図](https://raw.githubusercontent.com/hitorigods/voting-app-php/bb62b3c74d2d3f0250aa92cdc0912c8742000a7e/!_MATERIAL/db-er.png)

## docker 起動

```
docker-compose up -d
```

- /db/はローカルで構築

## URL

http://localhost:8080/

## DB - MySQL

### 接続

localhost:8081

### ルートアカウント

root@root

## 初期登録

`/!_MATERIAL/create.sql`の内容を DBeaver にて登録

1. DB 名は app
1. テストユーザーは test@test
   ```
   CREATE USER IF NOT EXISTS 'test'@'localhost' IDENTIFIED BY 'test';
   ```

## PDO で DB（MySQL） 接続

### Docker での注意

IP 指定ではなく MySQL のコンテナ名を host に指定で OK（port は指定なし、ユーザーは root）

https://qiita.com/saken649/items/00e752d89f2a6c5a82f6

※※※↓↓↓ 解決 ↓↓↓※※※

Docker の MySQL に接続するには MySQL 側の IP アドレスを指定しないといけない

```
docker-compose exec db bash

cat /etc/hosts
```

https://network-beginner.xyz/mysql_error_connection_refused_2002

https://teratail.com/questions/116377

※※※↑↑↑ 解決 ↑↑↑※※※

## X-Debug の VSCODE 対応

X-Debug のバージョン 3 でポートが 9003 に変更されているので注意

### バージョン確認方法

`public`をコンテナ名に変更

```
docker-compose exec public php -v
```

#### 参考

[【Xdebug】Docker+PHP+VSCode でデバッグする方法](https://ichi-station.com/php-xdebug-vscode-docker/)

↑ で`launch.json`の`"pathMappings"`のパスが間違えている？（`"/var/www/html/"`）

```
"pathMappings": {
   "var/www/html/": "${workspaceRoot}/src"
}
```

↓ に変更

```
"pathMappings": {
   "/var/www/html/": "${workspaceRoot}/public"
}
```

## TODO

- ~~DB の IP が起動の度に変わるので動的に設置する~~
- ER 図を Git に貼る
- php のログファイルをローカルに残す
- ENV 設定
- 公開サーバーを用意してアップ
  - サーバー選定
  - 自動デプロイできる？
