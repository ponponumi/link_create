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

## 使い方について

### HTMLとして取得する場合

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

#### オプションについて

オプションについては、次のようになります。

<div style="border: 1px solid gray; padding: 10px;">

##### hashtagNotGet

trueの場合はハッシュタグが取得されません。

初期状態ではfalseです。

</div>

## ライセンスについて

このパッケージは、MITライセンスとして作成されています。

このパッケージは、ponponumiが作成したパッケージの他、
<a href="https://github.com/piscibus/php-hashtag">piscibus様が制作した、PHP Hashtag</a>
を使用しています。 
