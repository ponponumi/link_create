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
$arrangement_1 = \Ponponumi\LinkCreate\Core::arrangement($text,["email"]);
$arrangement_2 = \Ponponumi\LinkCreate\Core::arrangement($text,["url"]);
$arrangement_3 = \Ponponumi\LinkCreate\Core::arrangement($text,["hashtag"]);
$arrangement_4 = \Ponponumi\LinkCreate\Core::arrangement($text,["email","url"]);
$arrangement_5 = \Ponponumi\LinkCreate\Core::arrangement($text,["url","hashtag"]);
$arrangement_6 = \Ponponumi\LinkCreate\Core::arrangement($text,["email","hashtag"]);
$arrangement_7 = \Ponponumi\LinkCreate\Core::arrangement($text);

?>

<p><?= $text ?></p>

<pre><?php var_dump($get_1) ?></pre>
<pre><?php var_dump($get_2) ?></pre>
<pre><?php var_dump($get_3) ?></pre>
<pre><?php var_dump($get_4) ?></pre>
<pre><?php var_dump($get_5) ?></pre>
<pre><?php var_dump($get_6) ?></pre>
<pre><?php var_dump($get_7) ?></pre>
<pre><?php var_dump($arrangement_1) ?></pre>
<pre><?php var_dump($arrangement_2) ?></pre>
<pre><?php var_dump($arrangement_3) ?></pre>
<pre><?php var_dump($arrangement_4) ?></pre>
<pre><?php var_dump($arrangement_5) ?></pre>
<pre><?php var_dump($arrangement_6) ?></pre>
<pre><?php var_dump($arrangement_7) ?></pre>

<?php require __DIR__ . "/footer.php" ?>
