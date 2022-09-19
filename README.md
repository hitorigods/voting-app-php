# 投票アプリ by PHP

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

## PDO で DB 接続

### Docker での注意

~~
Docker の MySQL に接続するには MySQL 側の IP アドレスを指定しないといけない

```
docker-compose exec db bash

cat /etc/hosts
```

https://network-beginner.xyz/mysql_error_connection_refused_2002

https://teratail.com/questions/116377
~~

↓IP 指定ではなく MySQL のコンテナ名を host に指定で OK（port は指定なし）

https://qiita.com/saken649/items/00e752d89f2a6c5a82f6

## TODO

- ~~DB の IP が起動の度に変わるので動的に設置する~~
- php のログファイルをローカルに残す
