# CUSTOMER MANAGEMENT
PHP自作(顧客管理システム)

## 概要
顧客の購買情報をもとに、グラフを表示して分析することもできるシステムです。

主催者ユーザと一般ユーザに分け、
それぞれでログインできるようにしています。

## インストール
composer install<br>
npm install && npm run dev<br>
.env.exampleを .envにコピー<br>
.envのDB関連、sanctum, sessionなどの情報を編集<br>
php artisan key:generate<br>
php artisan migrate<br>
php artisan db:seed<br>

## 使い方
管理者

商品の登録や削除が可能！

テストアカウント：

メールアドレス→test@test.com

パスワード→password123

一般ユーザ

商品の購入・修正や購買履歴、顧客データ表示・登録、データ分析、csvエクスポートができる。

テストアカウント：

メールアドレス→test.test@com.jp

パスワード→Passtest

## 環境
Xampp/MySQL/PHP

## データベース

データベース名：laravel_uCRM2 

テーブル

お使いのphpMyAdminに上のデータベースを作り、インストール項目にも記載あるとおり、

php artisan migrate<br>
php artisan db:seed<br>

上記のコマンドを、ターミナルやコマンドプロンプトにて入力いただくと顧客のダミーデータも入ります！

## 開発中の簡易サーバー
サーバー側<br>
php artisan serve <br>

フロント側 (vite)<br>
npm run dev<br>
