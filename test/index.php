<?php require __DIR__ . "/header.php" ?>

<?php

$text = "hello@example.com hoge@example.com http://example.com https://example.com http://localhost:2230/ #PHP #こんにちは";
$get = \Ponponumi\LinkCreate\Core::get($text);
$list = \Ponponumi\LinkCreate\Core::arrangement($text);
$a = \Ponponumi\LinkCreate\Web::create($text,[
  "hashtagUrl" => 'http://localhost:2230/search.php?tag={hashtag}',
]);

$b = \Ponponumi\LinkCreate\Web::create($text,[
  "hashtagUrl" => 'http://localhost:2230/search.php?tag={hashtag}',
  "nbspEncode" => false,
]);

?>

<p><?= $text ?></p>

<pre><?php var_dump($get) ?></pre>
<pre><?php var_dump($list) ?></pre>

<p><?= $a ?></p>
<p><?= $b ?></p>

<?php require __DIR__ . "/footer.php" ?>
