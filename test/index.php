<?php require __DIR__ . "/header.php" ?>

<?php

$text = "hello@example.com hoge@example.com http://example.com https://example.com #PHP #こんにちは";
$get = \Ponponumi\LinkCreate\Core::get($text);
$list = \Ponponumi\LinkCreate\Core::arrangement($text);
$a = \Ponponumi\LinkCreate\Web::create($text,[
  "hashtagUrl" => 'http://localhost/search.php?tag={hashtag}',
]);

?>

<p><?= $text ?></p>

<pre><?php var_dump($get) ?></pre>
<pre><?php var_dump($list) ?></pre>

<p><?= $a ?></p>

<?php require __DIR__ . "/footer.php" ?>
