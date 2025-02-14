<?php
require_once '../includes/db.php';

if (\[\"REQUEST_METHOD\"] == \"POST\") {
    \ = \['email'];
    \ = password_hash(\['password'], PASSWORD_DEFAULT);

    \ = \->prepare(\"INSERT INTO users (email, password) VALUES (?, ?)\");
    if (\->execute([\, \])) {
        header(\"Location: login.php\");
        exit();
    } else {
        \ = \"Erreur lors de l'inscription.\";
    }
}
?>

<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Inscription</title>
    <link rel=\"stylesheet\" href=\"../assets/css/style.css\">
</head>
<body>
    <form method=\"POST\">
        <h2>Inscription</h2>
        <input type=\"email\" name=\"email\" placeholder=\"Email\" required>
        <input type=\"password\" name=\"password\" placeholder=\"Mot de passe\" required>
        <button type=\"submit\">S'inscrire</button>
        <p>Déjà un compte ? <a href=\"login.php\">Connexion</a></p>
    </form>
</body>
</html>
