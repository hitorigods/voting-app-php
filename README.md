# 投票アプリ for PHP

## docker 起動

```
docker-compose up -d
```

1. /mysql/はローカルで構築
1. DB の test は削除しておく？

## WEB URL

http://localhost:8080/

## MySQL

localhost:8081

root@root

## DB 初期登録

`/!_MATERIAL/create.sql`の内容を DBeaver にて登録

1. DB 名は app
1. ユーザーは test:test
   ```
   CREATE USER IF NOT EXISTS 'test'@'localhost' IDENTIFIED BY 'test';
   ```
