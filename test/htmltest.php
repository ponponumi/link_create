<?php require __DIR__ . "/header.php" ?>

<?php

$text = "これはテストです hello@example.com hoge@example.com http://example.com https://example.com http://localhost http://localhost:2230/ #PHP #こんにちは";
$html_1 = \Ponponumi\LinkCreate\Web::create($text,[
  "hashtagUrl" => 'http://localhost:2230/search.php?tag={hashtag}',
]);

$html_2 = \Ponponumi\LinkCreate\Web::create($text,[]);

$html_3 = \Ponponumi\LinkCreate\Web::create($text,[
  "hashtagUrl" => 'http://localhost:2230/search.php?tag={hashtag}',
  "hashtagNotGet" => true,
]);

$html_4 = \Ponponumi\LinkCreate\Web::create($text,[
  "hashtagUrl" => 'http://localhost:2230/search.php?tag={hashtag}',
  "emailNotGet" => true,
]);

$html_5 = \Ponponumi\LinkCreate\Web::create($text,[
  "hashtagUrl" => 'http://localhost:2230/search.php?tag={hashtag}',
  "urlNotGet" => true,
]);

$html_6 = \Ponponumi\LinkCreate\Web::create($text,[
  "hashtagUrl" => 'http://localhost:2230/search.php?tag={hashtag}',
  "blankMode" => 0,
]);

$html_7 = \Ponponumi\LinkCreate\Web::create($text,[
  "hashtagUrl" => 'http://localhost:2230/search.php?tag={hashtag}',
  "blankMode" => 1,
]);

$html_8 = \Ponponumi\LinkCreate\Web::create($text,[
  "hashtagUrl" => 'http://localhost:2230/search.php?tag={hashtag}',
  "blankMode" => 2,
]);

$html_9 = \Ponponumi\LinkCreate\Web::create($text,[
  "hashtagUrl" => 'http://localhost:2230/search.php?tag={hashtag}',
  "internalUrl" => 'http://localhost',
]);

$html_10 = \Ponponumi\LinkCreate\Web::create($text,[
  "hashtagUrl" => 'http://localhost:2230/search.php?tag={hashtag}',
  "hashDelete" => false,
]);

?>

<p><?= $text ?></p>

<p><?= $html_1 ?></p>
<p><?= $html_2 ?></p>
<p><?= $html_3 ?></p>
<p><?= $html_4 ?></p>
<p><?= $html_5 ?></p>
<p><?= $html_6 ?></p>
<p><?= $html_7 ?></p>
<p><?= $html_8 ?></p>
<p><?= $html_9 ?></p>
<p><?= $html_10 ?></p>

<?php require __DIR__ . "/footer.php" ?>
