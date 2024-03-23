<?php require __DIR__ . "/header.php" ?>

<?php

$text = "私のメールアドレスは、 hoge@example.com で、ホームページは https://example.com です！";
$a = \Ponponumi\LinkCreate\Web::create($text);

?>

<p><?= $text ?></p>

<p><?= $a ?></p>

<?php require __DIR__ . "/footer.php" ?>
