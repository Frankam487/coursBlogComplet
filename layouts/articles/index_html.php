<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="c.css">
</head>

<body>

</body>

</html>
<h1>Listes des articles</h1>

<style>

</style>
<hr>
<div>
  <?php foreach ($articles as $article): ?>
  <h2>
    <?= $article['title'] ?>
  </h2>

  <p> <?= $article['introduction']?>
  </p>

  <a href="article.php?id=<?= $article['id']?>">Voir plus</a>
  <?php endforeach; ?>
</div>
<nav class="paginator-wapper">

  <?php
echo "<div class='pagination'>";
echo $paginator;
echo "</div>";
?>
</nav>