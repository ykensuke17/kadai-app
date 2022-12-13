<h1>初回のみやること</h1>

このリポジトリ(徳永のアカウントにあるリポジトリ)を自身のアカウントにフォークして課題を進めること。

<h2>フォーク手順</h2>

1. https://github.com/cadenza-system/kadai-app/fork にアクセス

1. Ownerが自分のアカウント、Repository nameがkadai-appになっていることを確認

1. 画面下のCreate fork(緑のボタン)を押下

1. 自身のアカウントにコピーされるので以降、そこに作ったものをpushしていく


<h1>環境構築</h1>

<h2>1. 準備</h2>

1. 自身のgithubアカウントからリポジトリをcloneしVSCodeで開く

1. VSCode上で[ctrl + @]でターミナルを開く(以降コマンドはここで入力する)(コマンドプロンプトでも可)

<h2>2. プロジェクトのアップデート</h2>

コマンドを実行

```composer update```

<h2>3. データベースの構築</h2>

1. xammpのコントロールパネルからapacheとMySQLを起動

1. xammpのコントロールパネル -> MySQLのAdminを押下しPHPMyAdminを起動

1. データベースのマイグレートコマンドを実行

```
php artisan migrate
```

実行すると下記のようにデータベースを作るか確認されるので yes と入力

```
   WARN  The database 'kadai-app' does not exist on the 'mysql' connection.

  Would you like to create it? (yes/no) [no]

  > yes <=入力
  ```

  4. データベースに初期データを挿入
  ```
  php artisan db:seed
  ```

<h2>4. アプリケーションの起動</h2>

<h3>起動</h3>

```
php artisan serve
```

<h3>アクセスURL</h3>

```
localhost:8000
```
