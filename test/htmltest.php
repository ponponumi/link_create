<?php require __DIR__ . "/header.php" ?>

<?php

$text = "これはテストです hello@example.com hoge@example.com http://example.com https://example.com http://localhost:2230/ #PHP #こんにちは";
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

?>

<p><?= $text ?></p>

<p><?= $html_1 ?></p>
<p><?= $html_2 ?></p>
<p><?= $html_3 ?></p>
<p><?= $html_4 ?></p>

<?php require __DIR__ . "/footer.php" ?>
