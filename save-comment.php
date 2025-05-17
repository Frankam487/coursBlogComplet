<?php
session_start();

require_once 'libraries/database.php';
$pdo = getPdo();
if(!isset($_SESSION['auth']["id"])){
header("Location : login.php");
exit;
}

$user_auth = $_SESSION['auth']['id'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  // echo 'ok';
  $content = htmlspecialchars($_POST['content'] ?? null);
  $article_id = $_POST['article_id'] ?? null;


  $query = $pdo->prepare("INSERT INTO 
  comments (content, article_id, user_id, created_at)
   VALUES(:content, :article_id, :user_auth, NOW())
  ");
  $query->execute([':user_auth'=> $user_auth,':article_id'=> $article_id, ':content' => $content]);
  

  //rediriger vers la page des articles apres l'ajout du commentaire
  header("Location: article.php?id=" . $article_id);
  exit;
} 