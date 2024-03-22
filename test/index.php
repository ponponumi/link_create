<?php require __DIR__ . "/header.php" ?>

<?php

$text = "hello@example.com hoge@example.com http://example.com https://example.com";
$get = \Ponponumi\LinkCreate\Core::get($text);
$list = \Ponponumi\LinkCreate\Core::arrangement($text);

?>

<p><?= $text ?></p>

<pre><?php var_dump($get) ?></pre>
<pre><?php var_dump($list) ?></pre>

<?php require __DIR__ . "/footer.php" ?>
