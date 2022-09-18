# 投票アプリ for PHP

## docker

```
docker-compose up -d
```

i. /mysql/はローカルで構築
i. DB の test は削除しておく？

## WEB URL

http://localhost:8080/

## MySQL

localhost:8081
root
root

## DB 初期登録

`/_material/create.sql`を DBeaver で登録

i. DB 名は app
i. ユーザーは test:test

```
CREATE USER IF NOT EXISTS 'test'@'localhost' IDENTIFIED BY 'test';
```
