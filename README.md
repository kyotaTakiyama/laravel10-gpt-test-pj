## chatGPT3.5-turboを使用してGoogleカレンダーを自然言語で操作する 

### 準備 
以下の準備が必要です。
 - Laravel10テンプレートを使用した環境構築 
 - chatGPT3.5-turboのAPIキー (.envファイルに記述) 
 - 操作するGoogleカレンダーのカレンダーID (.envファイルに記述) 
 - webコンテナで`composer require spatie/laravel-google-calendar`を実行 
--
 また、Googleカレンダーにアクセスするためのアカウントキーを以下の手順で用意してください。 
 1. storage/jsonフォルダにアカウントキーを配置します。 
 2. webコンテナ上で、下記コマンドを実行します。 
 ``` $ php artisan vendor:publish --provider="Spatie\GoogleCalendar\GoogleCalendarServiceProvider" ``` 
 3. `config/google-calendar.php`というファイルが作成されます。 
 4. `service_account_credentials_json`の部分を先ほど配置したアカウントキーのパスに変更します。
### 参考
https://blog.capilano-fw.com/?p=5365