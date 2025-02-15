<?php
// Affichage des erreurs pour le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=localhost;dbname=projetb2", "projetb2", "password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Sécurisation du mot de passe

    // Vérifier si l'utilisateur existe déjà
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetch()) {
        $error = "Nom d'utilisateur déjà pris.";
    } else {
        // Insérer l'utilisateur dans la base de données
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $password]);
        header("Location: login.php"); // Rediriger vers la page de connexion
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>S'inscrire</h1>
    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    <form method="POST" action="register.php">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" required><br>
        
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required><br>

        <button type="submit">S'inscrire</button>
    </form>
    <p><a href="pages/login.php">Déjà inscrit ? Se connecter</a></p>
</body>
</html>
