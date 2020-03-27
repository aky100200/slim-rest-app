# slimのベースプロジェクトを作成
```
composer create-project "slim/slim-skeleton=3.1.8" slim-rest-app
```

# DB
取込み

```console
cd C:\xampp\mysql\bin
mysql -uroot slim_rest_app < C:\workspace\slim-rest-app\address_kanagawa.sql
mysql -uroot slim_rest_app < C:\workspace\slim-rest-app\yomi_kanagawa.sql
mysql -uroot slim_rest_app < C:\workspace\slim-rest-app\zipcode_kanagawa.sql
```

slimユーザの作成
```

```

# JavaScriptからREST通信をするとエラーになる
* Chromeブラウザでクライアント上のindex.htmlからphpのrestを呼び出し
```
index.html:1 Access to XMLHttpRequest at 'http://localhost:8080/zipcode/2230057' from origin 'null' has been blocked by CORS policy: Response to preflight request doesn't pass access control check: No 'Access-Control-Allow-Origin' header is present on the requested resource.
```


# メモ

* Excelの0埋めはTEXTが簡単  
ex.TEXT("123","0000000") → 0000123  

* mysqlのコメントは `#`
* mysqlでSQLで文字コードを指定するのは「SET NAMES utf8;」


# 参考
* [郵便番号データ - zip形式 日本郵便](https://www.post.japanpost.jp/zipcode/dl/oogaki-zip.html)
* 