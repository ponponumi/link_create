<?php require __DIR__ . "/header.php" ?>

<?php

$text = "テストです\nhello    world #test  #テスト";
$html_1 = \Ponponumi\LinkCreate\Web::create($text,[
  "hashtagUrl" => 'http://localhost:2230/search.php?tag={hashtag}',
]);

$html_2 = \Ponponumi\LinkCreate\Web::create($text,[
  "hashtagUrl" => 'http://localhost:2230/search.php?tag={hashtag}',
  "spaceEncode" => false,
]);

$html_3 = \Ponponumi\LinkCreate\Web::create($text,[
  "hashtagUrl" => 'http://localhost:2230/search.php?tag={hashtag}',
  "brEncode" => false,
]);

?>

<p><?= $html_1 ?></p>
<p><?= $html_2 ?></p>
<p><?= $html_3 ?></p>

<?php require __DIR__ . "/footer.php" ?>
