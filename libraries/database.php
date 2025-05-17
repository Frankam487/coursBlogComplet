<?php

function getPdo(){
$pdo = new PDO('mysql:host=localhost;dbname=blogphp-2025;charset=utf8', 'root', '');

define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'blogphp-2025');

try {
     $pdo= new PDO("mysql:host=" .DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
    
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
     
 } catch(PDOException $e) {
     echo "<div style='color:red;'>La connexion à la base de données a échoué :</div> " . $e->getMessage();
 }
 return $pdo;
}