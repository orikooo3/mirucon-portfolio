# 食事記録アプリ「みるこん」

 <br><br>
 
## １.　アプリ概要

**食べた食品を記録することで食事をコントロールする**ことができるアプリです。
 <br><br>

## ２.　アプリの特徴
### (1)食品登録機能
食品情報を登録することができます。具体的には**食品名**、**量**、**カロリー**、**タンパク質**、**脂質**、**炭水化物**を登録することができます。
![2024-03-201210341-ezgif com-video-to-gif-converter](https://github.com/orikooo3/mirucon-portfolio/assets/131629915/670003df-e025-4df5-adbf-791f5a3e65eb)

<br>

### (2)食品編集・削除機能
食品の更新と削除ができます。<br>
更新は記録詳細画面と食品一覧画面の食品名を選択することで編集画面に遷移し、各項目を編集することができます。<br>
削除は各食品データに削除ボタンがあり、それをクリックすることで簡単に削除することが可能です。
![2024-03-201525411-ezgif com-video-to-gif-converter](https://github.com/orikooo3/mirucon-portfolio/assets/131629915/ad76f961-1b56-4385-bb8c-de3fe64068a5)

<br>

### (3)記録作成機能
初めに記録フォームを作成します。記録フォームでは食事の種類(朝食、昼食、夜食、間食)と食事の時間を選択できます。<br>
そのあと食事記録一覧画面にて作成した記録フォームが表示されます。そこに登録してある食品を追加することができます。<br>
また、記録詳細画面では食事の種類と食事時間を更新することができます。<br>
削除は食事記録一覧画面から各フォームにある削除ボタンをクリックすることで簡単に削除することが可能です。<br>
![2024-03-201232181-ezgif com-optimize](https://github.com/orikooo3/mirucon-portfolio/assets/131629915/793ec21c-aa26-4703-adcc-6923411d9ab2)


 <br><br>

## ３.　アプリの機能一覧
### メイン機能
|     機能     | 概要                                                                                                                                             |
| :----------: | ------------------------------------------------------------------------------------------------------------------------------------------------ |
| 食品登録機能(CRUD) | ・食品の登録、表示、更新、削除ができる<br> |
| 食事記録機能(CRUD) | ・記録フォームの作成、表示、更新(織女の種類と食事時間)、削除ができる。<br>・食べる食品を追加して記録できる。                                    |


### 認証機能
|     機能     | 概要                                                                                                                                             |
| :----------: | ------------------------------------------------------------------------------------------------------------------------------------------------ |
| 認証機能 　  | ・アカウント新規登録<br>・ログイン / ログアウト<br>・パスワード変更（ログイン中）<br>・パスワードリセット（非ログイン）<br>・アカウント情報編集（名前、メールアドレス、年齢、体重、身長）<br>・アカウント削除|

<br><br>
 
## ４.　使用技術

### フロントエンド

- HTML
- CSS
- JavaScript
- Tailwind CSS

### バックエンド

- PHP 8.2.13
- Laravel 10.41.0
- MySQL 8.0.32 ****
- composer 2.6.6

### インフラ

- Laravel Sail

### その他

- Git  / GitHub
- PHPMyAdmin
- Visual Studio Code
- Figma
- Notion
- draw.io
- Google Sheets
- WindowsOS
  
  <br><br>
  
## ５.　DB設計
### ER図
![mirucon er](https://github.com/orikooo3/mirucon-portfolio/assets/131629915/d66eb30c-4d92-40c7-b6d2-f52abf26b5dc)

<br>

### テーブル
#### usersテーブル
|　　カラム名　　|　　データ型　　|      項目名    |　　備考　　|
| :---------------: | :-----------------: | :------------: | :------------: |
|        id         |        BIGINT          |　　ユーザーID　　|　　AUTO_INCREMENT　　|　　
|       name        |       VARCHAR       |　　ユーザー名　　|
|       email       |       VARCHAR       |　　メールアドレス　　|　　UNIQUE　　|　　　　　　
|       age         | 　　　TINYINT 　　　|　　年齢　　|
|       sex         | 　　　BOOLEAN 　　　|　　性別　　|
|       height      | 　　　DOUBLE 　　　 |　　身長　　|
| email_verified_at |     TIMESTAMP       |               |
|     password      |       VARCHAR      |　　パスワード　　|
|  remember_token   |      VARCHAR   　　|                |
|    created_at     |     TIMESTAMP      |    作成日時    |
|    updated_at     |     TIMESTAMP      |    更新日時    |

#### meals_recordsテーブル
|　　カラム名　　|　　データ型　　|      項目名    |　　備考　　|
| :---------------: | :-----------------: | :------------: | :------------: |
|        id         |        BIGINT          |　　食事ID　　|　　AUTO_INCREMENT　　|　　
|        user_id    |        BIGINT       |　　ユーザーID　　|　　FOREIGN KEY　　|
|       record_date       |       DATE       |　　食事した日　　|　　 　　
|       meal_type         |　　ENUM('朝食', '昼食', '夜食', '間食')　　|      食事の種類      |
|       meal_time         | 　　　TIME 　　　|　　食事の時間　　|
|       total_calorie      | 　　　INT 　　　 |　　合計摂取カロリー 　　|
|　　meal_calorie　　|     INT       |　　食事ごとの摂取カロリー　　|
|    created_at     |     TIMESTAMP      |    作成日時    |
|    updated_at     |     TIMESTAMP      |    更新日時    |

#### foods_registrationsテーブル
|　　カラム名　　|　　データ型　　|      項目名    |　　備考　　|
| :---------------: | :-----------------: | :------------: | :------------: |
|        id         |        BIGINT       |　　食品ID　　|　　AUTO_INCREMENT　　|
|        user_id    |        BIGINT       |　　ユーザーID　　|　　FOREIGN KEY　　|
|       food_name   |       VARCHAR       |　　食品名　　|
|       grams       |       INT           |　　量　　|　    　　　　
|       calorie     | 　　　INT  　　　   |　　カロリー　　|
|       protein     | 　　　DOUBLE 　　　 |　　タンパク質　　|
|       fat         | 　　　DOUBLE 　　　 |　　脂質　　|
|    carbohydrate   |     DOUBLE         |　　炭水化物　　|
|    	quantity    |     TINYINT        |　　個数　　|
|    created_at     |     TIMESTAMP      |　　作成日時　　|
|    updated_at     |     TIMESTAMP      |　　更新日時　　|

#### mealrecord_foodregistrationsテーブル
|　　カラム名　　|　　データ型　　|      項目名    |　　備考　　|
| :---------------: | :-----------------: | :------------: | :------------: |
|        id          |        BIGINT         |　　中間テーブルID　　|　　AUTO_INCREMENT　　|
|   meal_record_id   |        BIGINT         |　　食事記録ID   |　　FOREIGN KEY　　|
|food_registration_id|        BIGINT         |　　食品登録ID　　|　　FOREIGN KEY　　|


 <br><br>
 
## ６.　工夫したこと
- 中間テーブルの導入
- 記録用のフォームを自由に作成できる

 <br><br>
 
## ７.　苦労したこと
- MVCモデルの理解
- データベース設計
- TailwindCSSを使ったUI設計：<br>
  はじめにFigmaでワイヤーフレームを作成したがいざ開発すると実現できるデザインや、後から違うデザインを取り入れたくなった。
  
 <br><br>
 
## ８.　実装・改善したいこと
- meals_recordsテーブルのtotal_calorieカラムは食事ごとではなく記録の合計カロリーなため、全てのレコードにデータを持たせるのは重複し冗長になっていることに気づいた。<br>
記録全体を管理するテーブルを新たに作成する。record_dateとtotal_calorieはこちらに移動する。
- カロリー計算機能
- カレンダー機能　✓
- 目標設定機能
- 基礎代謝計算機能
- Dockerでの環境構築
- AWSでデプロイ

 <br><br>
 
## 開発者
Koki.Orikasa


