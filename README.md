# chatGPT3.5-turboAPIを使用してGoogleカレンダーを自然言語で操作する

## 環境構築

1. このリポジトリをクローン
2. [Laravel10社内テンプレート](https://github.com/epkotsoftware/template-laravel10-jp)の環境構築「Laravelの初期設定」まで進める
3. [chatGPT3.5-turboのAPIキー](https://saasis.jp/2023/03/06/%E9%81%82%E3%81%AB%E5%85%AC%E9%96%8B%E3%81%95%E3%82%8C%E3%81%9Fchatgpt-api%E3%81%A8%E3%81%AF%EF%BC%9F-%E5%88%A9%E7%94%A8%E3%81%99%E3%82%8B%E3%81%BE%E3%81%A7%E3%81%AE%E6%B5%81%E3%82%8C%E3%80%90/)を取得し、`.env`ファイルに記述
4. [操作するGoogleカレンダーのカレンダーIDを取得](https://blog.capilano-fw.com/?p=5365)し、`.env`ファイルに記述)
5. [Googleカレンダーにアクセスするためのアカウントキーを取得](https://blog.capilano-fw.com/?p=5365)し、「`storage/json`」ディレクトリに配置
6. 上記アカウントキーのパスを`.env`ファイルに記述
