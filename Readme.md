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
