# お問い合わせフォーム

## 環境構築

### Dockerビルド

1. `git clone git@github.com:asamiwatababe/contact-form-test-watanabe.git`
2. `docker-compose up -d --build`

### Laravel環境構築

1. `docker-compose exec php bash`
2. `composer install`
3. `.env.example` ファイルから `.env` を作成し、環境変数を変更
4. `php artisan key:generate`
5. `php artisan migrate`
6. `php artisan db:seed`

---

## 使用技術

- PHP 8.0
- Laravel 10.0
- MySQL 8.0

---

## URL

- 開発環境：[http://localhost/](http://localhost/)
- phpMyAdmin：[http://localhost:8080/](http://localhost:8080/)


## ER図
![ER図](./er-diagram.png)

