<?php
require_once 'libraries/database.php';
$pdo = getPdo();
require 'vendor/autoload.php';
use JasonGrimes\Paginator; 
$totalQuery = $pdo->query("SELECT COUNT(*) FROM articles");
$total = $totalQuery->fetchColumn();
$itemsPerpage = 2;
// $totalQuery->execute();
$currentPage = $_GET['page'] ?? 1;


$offset = ($currentPage - 1) * $itemsPerpage;


$sql  = "SELECT * FROM articles ORDER BY created_at DESC LIMIT :limit OFFSET :offset";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':limit', $itemsPerpage, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$articles = $stmt->fetchAll();
// var_dump($articles);
// $sql = $pdo->query('SELECT count(*) FROM articles');
// var_dump($sql->fetchColumn());
// pagination
$paginator = new Paginator(
  $total,
  $itemsPerpage,
  $currentPage,
  '?page=(:num)'
);

// 1--On affiche le titre autre

$pageTitle ='Accueil du Blog';

// 2-Debut du tampon de la page de sortie

ob_start();

// 3-inclure le layout de la page d' accueil
require_once 'layouts/articles/index_html.php';

//4-recuperation du contenu du tampon de la page d'accueil
$pageContent = ob_get_clean();

//5-Inclure le layout de la page de sortie
require_once 'layouts/layout_html.php';