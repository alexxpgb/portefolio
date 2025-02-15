<?php 
define('DB_HOST', 'localhost'); 
define('DB_PORT', 3306); 
define('DB_NAME', 'projetb2'); 
define('DB_USER', 'projetb2'); 
define('DB_PASS', 'password');

try {
    \ = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';port=' . DB_PORT;
    \ = new PDO(\, DB_USER, DB_PASS);
    \->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException \) {
    echo 'Connexion échouée : ' . \->getMessage();
}
