# O/Rマッパー調査

## 導入方法

### composer.jsonに下記を追加
```
{
 "require": {
    "illuminate/database": "*"
  }
}
```

### composer update を実行

## 使い方

### DB接続
下記のような感じ。どちらの方法を使う場合でも事前に読み込んでおく。

##### bootstrap.php
```php
<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'port' => '3306',
    'database'  => 'slim_rest_app',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
```

### SQL
クエリービルダーを使う方法とモデルを使う方法がある。

#### クエリービルダー
以下のような感じで書ける。
「'select * from users'」と同じ

```php
$result = Capsule::table('address')->select('*')->get()->toArray();
```

#### Model

##### モデルの定義
`EloquentModel`クラスを継承して作成する。

$tableプロパティはカスタムテーブル名を指定する。
デフォルトはモデル名の複数形になっているので問題があれば設定する。
ex. Address -> デフォルトは addresses

$idプロパティで主キーを設定できる。

```php
<?php

namespace Model;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Address extends EloquentModel
{
    protected $table = 'address';
}
```

##### 検索方法

###### 全件検索 
* all()

```php
$ret = Address::all();
```

##### 件数
* count()

```php
$ret = Address::count();
```

##### 条件
* whereでカラム名,条件を指定する

```php
//getはcollection
$ret = Address::where('id',2230058)->get();
//firstはモデル
$ret = Address::where('town', '新羽町')->first();
```

* findは主キー指定。

```php
$ret = Address::find(2230058);
```


## 参考
* [Eloquent：はじめに-Laravel-ウェブ職人のためのPHPフレームワーク](https://laravel.com/docs/5.3/eloquent)
* [【Laravel】DB登録値取得時のfind()、get()、first()の返り値早見表 - Qiita](https://qiita.com/sola-msr/items/fac931c72e1c46ae5f0f)
* [LaravelのORM、Eloquentを単品で使用してみる - Qiita](https://qiita.com/igayamaguchi/items/16bad23bd4e4cbed337a#%E3%82%AF%E3%82%A8%E3%83%AA%E7%99%BA%E8%A1%8C)