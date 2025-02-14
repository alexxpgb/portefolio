<?php
require_once '../models/User.php';

if (\[\"REQUEST_METHOD\"] == \"POST\") {
    \ = \['email'];
    \ = \['password'];

    if (User::login(\, \)) {
        header(\"Location: dashboard.php\");
        exit();
    } else {
        \ = \"Identifiants incorrects.\";
    }
}
?>

<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Connexion</title>
    <link rel=\"stylesheet\" href=\"../assets/css/style.css\">
</head>
<body>
    <form method=\"POST\">
        <h2>Connexion</h2>
        <input type=\"email\" name=\"email\" placeholder=\"Email\" required>
        <input type=\"password\" name=\"password\" placeholder=\"Mot de passe\" required>
        <button type=\"submit\">Se connecter</button>
        <p>Pas encore de compte ? <a href=\"register.php\">Inscription</a></p>
    </form>
</body>
</html>
