# Link Create

このパッケージは、テキストからリンクを生成するPHPパッケージです。

リンク化の対象となるものは、次の通りです。

* URL
* メールアドレス
* ハッシュタグ

## Composerでのインストールについて

次のコマンドを実行する事で、インストール可能です。

```bash
composer require ponponumi/link_create
```

## このライブラリの挙動

私のメールアドレスは、 hoge@example.com で、ホームページは https://example.com です！

例えば、上記の文字列を、下記のHTMLに変換します！

<pre>
  私のメールアドレスは、&amp;nbsp;
  &lt;a href=&quot;mailto:hoge@example.com&quot;&gt;
    hoge@example.com
  &lt;/a&gt;
  &amp;nbsp;で、ホームページは&amp;nbsp;
  &lt;a href=&quot;https://example.com&quot; target=&quot;_blank&quot; rel=&quot;noopener noreferrer&quot; &gt;
    https://example.com
  &lt;/a&gt;
  &amp;nbsp;です！
</pre>

## HTMLとして取得する場合の使い方

HTMLとして取得する場合、次の方法で取得可能です

```php
use Ponponumi\LinkCreate\Web;

$text = "私は、PHPのサーバーサイド開発の方が好きかな #プログラミング #PHP";

// オプション
$option = [
  "hashtagUrl" => 'http://localhost:2230/search.php?tag={hashtag}',
];

// aタグを生成
$a = Web::create($text,$option);

// 出力結果

/*
私は、PHPのサーバーサイド開発の方が好きかな&nbsp;
<a href="http://localhost:2230/search.php?tag=%E3%83%97%E3%83%AD%E3%82%B0%E3%83%A9%E3%83%9F%E3%83%B3%E3%82%B0">#プログラミング</a>
&nbsp;
<a href="http://localhost:2230/search.php?tag=PHP">#PHP</a>
*/

```

HTMLの生成が面倒な場合は、こちらをご利用ください。

## HTMLとして取得する場合のオプション

オプションについては、次のようになります。

### hashtagNotGet

trueの場合はハッシュタグが取得されません。

初期状態ではfalseです。


### hashtagUrl

ハッシュタグ検索用のURLのベースです。

初期状態では空文字です。

実際にハッシュタグに置き換えたい部分に、 {hashtag} と記述して下さい。

この部分は、文字列以外の値を登録しないで下さい。

hashtagNotGetの設定に関わらず、この項目を設定しない場合、ハッシュタグはリンク化されません。


### emailNotGet

trueの場合はメールアドレスが取得されません。

初期状態ではfalseです。


### urlNotGet

trueの場合はURLが取得されません。

初期状態ではfalseです。


### blankMode

これは、HTMLの target=&quot;_blank&quot; と rel=&quot;noopener noreferrer&quot; を有効にするかどうかです。

挙動は次の通りです。

* 0 → 常に無効 (安全性の観点から非推奨)
* 1 → 外部リンクであれば有効
* 2 → 常に有効

初期状態では1です。

### internalUrl

これは、内部リンクを上書きするかどうかです。

初期状態では空文字です。

この部分は、文字列以外の値を登録しないで下さい。

空文字にした場合、内部のホストは $_SERVER["HTTP_HOST"] で取得したものが使われます。

通常は、空文字にして下さい。


### hashDelete

trueの場合は、ハッシュタグのURL生成時、#が削除されます。

初期状態ではtrueです。


### hashEncode

trueの場合は、ハッシュタグの部分が、urlencode関数でエンコードされます。

初期状態ではtrueです。


## 連想配列として取得する場合(一致データの取得)

一致データの取得については、次の方法で行えます。

```php
use Ponponumi\LinkCreate\Core;

$text = "メールアドレスは hoge@example.com です！";

// オプション
$option = [
  "email",
];

// aタグを生成
$hit = Core::get($text,$option);

// 出力結果

/*
array(1) {
  [0]=>
  array(2) {
    ["pos"]=>
    int(9)
    ["value"]=>
    string(16) "hoge@example.com"
  }
}
*/

```


## 連想配列として取得する場合のオプション

配列に、次の文字列を入力すると、それぞれ取得されます。

* url → URL
* email → メールアドレス
* hashtag → ハッシュタグ

初期状態では、全て取得する設定になっています。

## ライセンスについて

このパッケージは、MITライセンスとして作成されています。

このパッケージは、ponponumiが作成したパッケージの他、
<a href="https://github.com/piscibus/php-hashtag">piscibus様が制作した、PHP Hashtag</a>
を使用しています。 
