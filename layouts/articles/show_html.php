
<h1 class=""><?php $article['title']?></h1>
<p><?=$article['content']?></p> <br>
<em>Poster le <?= $article['created_at']?></em> <br>
 <a href ="index.php">Retour</a>

 <?php if(count($commentaires) === 0):?>
 <h2 class="comment-heading">Il n'y a pas encore de commentaires pour cet article... SOYEZ LE PREMIER ! :D</h2>

 <?php else: ?>
<h2 class="comment-heading">Il y a déjà <?= count($commentaires)?> réactions :</h2>
<?php  foreach($commentaires as $commentaire):?>
<h3 class="comment-author">Commentaire de : <?= $commentaire['username']?> </h3>
<small class="comment-date">Le date_du_commentaire</small>
<blockquote class="comment-content">
  <em>Contenu du commentaire</em> <?= $commentaire['content']?>
</blockquote>
<?php endforeach?>
<?php endif?>

<?php if(isset($_SESSION['auth'])):?>
<!-- Formulaire de commentaire -->
<form action="save-comment" method="POST" class="comment-form">
  <h3 class="comment-form-heading">Vous voulez réagir ? N'hésitez pas !</h3><br>

  <textarea name="content" cols="30" rows="10" placeholder="Votre commentaire ..."
    class="comment-form-content"></textarea><br>
  <input type="hidden" name="article_id" value="<?= $article_id ?>"> <br>
  <input type="hidden" name="user_id" value="<?= $_SESSION['auth']['id']?>"><br>
  <button  class="comment-form-submit">COMMENTER !</button><br>
</form>
<?php else:?>
<p>Veuillez vous connecter ou vous inscrire pour commenter.</p>
<a href="register.php">S'inscrire</a> | <a href="login.php">Se connecter</a>
<?php endif?>

<a href="index.php">Retour</a>