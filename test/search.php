<?php require __DIR__ . "/header.php" ?>

<p>ハッシュタグ: #<?= \Ponponumi\LinkCreate\Web::esc($_GET["tag"]) ?></p>

<?php require __DIR__ . "/footer.php" ?>
