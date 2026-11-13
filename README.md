# Laravel Clean Architecture

## 環境構築手順

### 1. Dockerコンテナの起動

```bash
docker compose up -d --build
```

### 2. Laravelコンテナに入る

```bash
docker compose exec app bash
```

### 3. Laravelのインストール

コンテナ内で以下を実行します。

```bash
composer create-project laravel/laravel .
```

### 4. データベース接続設定

`src/.env` のデータベース設定を以下に変更します。

```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret
```

### 5. マイグレーションの実行

コンテナ内で以下を実行します。

```bash
php artisan migrate
```

### 6. Laravelの起動

コンテナ内で以下を実行します。

```bash
php artisan serve
```

ブラウザからアクセスします。

http://localhost:8000

## Docker操作コマンド

### コンテナの停止

```bash
docker compose down
```

### コンテナの起動

```bash
docker compose up -d
```

### コンテナの状態確認

```bash
docker compose ps
```
