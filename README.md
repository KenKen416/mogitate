# 商品管理アプリケーション

このアプリケーションは Laravel を用いた商品管理ツールです。商品情報の一覧表示・検索・並び替え・詳細確認・編集・削除・登録が可能です。

---

## 主な機能

- 商品の一覧表示（ページネーション対応）
- 商品名による検索機能
- 価格の昇順・降順ソート
- 商品詳細ページ（編集・削除可能）
- 商品登録機能（バリデーション付き）
- 商品画像のプレビュー表示
- 成功メッセージの表示（自動フェードアウト）

---

## 環境構築（Docker 使用）

### 1. リポジトリをクローン
- git clone git@github.com:KenKen416/mogitate.git
- cd mogitate

### 2. Docker コンテナをビルド・起動
- docker compose up -d --build
### 3. Composer で依存パッケージをインストール
- docker compose exec php composer install
### 4. .env ファイルを作成
- cp src/.env.example src/.env
#### .env 設定についての注意
- .env の中身は docker-compose.yml の設定に合わせて、以下のように編集してください：
  - DB_CONNECTION=mysql
  - DB_HOST=mysql
  - DB_PORT=3306
  - DB_DATABASE=laravel_db
  - DB_USERNAME=laravel_user
  - DB_PASSWORD=laravel_pass

### 5. アプリケーションキーを生成
- docker compose exec php php artisan key:generate
### 6. ストレージのシンボリックリンクを作成
- docker compose exec php php artisan storage:link

### 7. マイグレーション＆初期データ投入
- docker compose exec php php artisan migrate --seed

---

## 使用技術・サービス
- docker : 環境構築
- Nginx：ポート80で公開
- PHP (8.x)：Laravelアプリケーション実行
- MySQL 8.0.29：データベース
- phpMyAdmin：ポート8080でアクセス可能
- Bootstrap4 :ページネーションに使用
- JavaScript : 画像プレビュー用

## ディレクトリ構成（抜粋）
mogitate/
├── docker/
│   ├── nginx/
│   │   └── default.conf
│   ├── php/
│   │   └── Dockerfile
│   └── mysql/
│       ├── data/
│       └── my.cnf
├── docker-compose.yml
├── src/
│   ├── app/
│   │   └── Http/Controllers/ProductsListController.php
│   │   └── Http/Requests/RegisterRequest.php, UpdateRequest.php
│   ├── resources/views/
│   └── public/storage/ （画像参照用）

## ER図

## URL
- 開発環境：http://localhost/
- phpMyAdmin:http://localhost:8080
- 商品一覧 : /products
- 商品詳細 : /products/{productId}
- 商品更新 : /products/{productId}/update
- 商品登録 : /products/register
- 検索 : /products/search
- 削除 : /products/{productId}/delete
