# 投票アプリ for PHP

## docker 起動

```
docker-compose up -d
```

1. /db/はローカルで構築
1. php のログファイルをローカルに残す方法は？

## WEB URL

http://localhost:8080/

## MySQL

### 接続

localhost:8081

### ルートアカウント

root@root

## DB 初期登録

`/!_MATERIAL/create.sql`の内容を DBeaver にて登録

1. DB 名は app
1. ユーザーは test:test
   ```
   CREATE USER IF NOT EXISTS 'test'@'localhost' IDENTIFIED BY 'test';
   ```
