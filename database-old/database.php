
<?php
// 5-Connexion à la base de données avec PDO
$pdo = new PDO('mysql:host=localhost;dbname=blogphp-2025;charset=utf8', 'root', '');

define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'blogphp-2025');
//  $servername = "127.0.0.1";
//  $username = "root";
//  $password = "";
//  $database = "blogphp-2025";
try {
     $pdo= new PDO("mysql:host=" .DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
     // 1-Déclarer la variable $pdo
     // 2-Configurer le mode d'erreur pour lancer des exceptions
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //  3-echo "<div style='background-color:#3c763d; color:white;'>Connexion à la base de donnée réussie</div>";
     
 } catch(PDOException $e) {
     echo "<div style='color:red;'>La connexion à la base de données a échoué :</div> " . $e->getMessage();
 }
 ?>

