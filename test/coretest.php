<?php require __DIR__ . "/header.php" ?>

<?php

$text = "メール: hoge@example.com サイト: https://example.com #テスト";
$get_1 = \Ponponumi\LinkCreate\Core::get($text,["email"]);
$get_2 = \Ponponumi\LinkCreate\Core::get($text,["url"]);
$get_3 = \Ponponumi\LinkCreate\Core::get($text,["hashtag"]);
$get_4 = \Ponponumi\LinkCreate\Core::get($text,["email","url"]);
$get_5 = \Ponponumi\LinkCreate\Core::get($text,["url","hashtag"]);
$get_6 = \Ponponumi\LinkCreate\Core::get($text,["email","hashtag"]);
$get_7 = \Ponponumi\LinkCreate\Core::get($text);

?>

<p><?= $text ?></p>

<pre><?php var_dump($get_1) ?></pre>
<pre><?php var_dump($get_2) ?></pre>
<pre><?php var_dump($get_3) ?></pre>
<pre><?php var_dump($get_4) ?></pre>
<pre><?php var_dump($get_5) ?></pre>
<pre><?php var_dump($get_6) ?></pre>
<pre><?php var_dump($get_7) ?></pre>

<?php require __DIR__ . "/footer.php" ?>
