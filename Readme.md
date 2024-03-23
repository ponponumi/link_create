# Link Create

このパッケージは、テキストからリンクを生成するPHPパッケージです。

リンク化の対象となるものは、次の通りです。

* URL
* メールアドレス
* ハッシュタグ

## このライブラリの挙動

私のメールアドレスは、 hoge@example.com で、ホームページは https://example.com です！

例えば、上記の文字列を、下記のHTMLに変換します！

<pre>
  <code>
    私のメールアドレスは、&nbsp;
    <a href="mailto:hoge@example.com">
    hoge@example.com
    </a>
    &nbsp;で、ホームページは&nbsp;
    <a href="https://example.com" target="_blank" rel="noopener noreferrer" >
    https://example.com
    </a>
    &nbsp;です！
  </code>
</pre>
