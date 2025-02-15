<?php
// Affichage des erreurs pour le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Configuration de la base de données
define('DB_HOST', 'localhost');
define('DB_PORT', 3306);
define('DB_NAME', 'projetb2');
define('DB_USER', 'projetb2');
define('DB_PASS', 'password');

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}

// Récupérer les utilisateurs
$query = $pdo->query("SELECT * FROM users");
$users = $query->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les compétences
$skills_query = $pdo->query("SELECT * FROM skills");
$skills = $skills_query->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les projets de l'utilisateur connecté
// Remplacez 1 par l'ID de l'utilisateur connecté, ici 1 pour l'exemple
$projects_query = $pdo->prepare("SELECT * FROM projects WHERE user_id = ?");
$projects_query->execute([1]);
$projects = $projects_query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="css/styles.css">  <!-- Lien vers ton fichier CSS -->
</head>
<body>
    <h1>Bienvenue sur mon Portfolio</h1>

    <h2>Liste des utilisateurs</h2>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?php echo htmlspecialchars($user['username']); ?> (Rôle: <?php echo htmlspecialchars($user['role']); ?>)</li>
        <?php endforeach; ?>
    </ul>

    <h2>Compétences disponibles</h2>
    <ul>
        <?php foreach ($skills as $skill): ?>
            <li><?php echo htmlspecialchars($skill['name']); ?> : <?php echo htmlspecialchars($skill['description']); ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Projets de l'utilisateur</h2>
    <ul>
        <?php foreach ($projects as $project): ?>
            <li>
                <h3><?php echo htmlspecialchars($project['title']); ?></h3>
                <p><?php echo htmlspecialchars($project['description']); ?></p>
                <a href="<?php echo htmlspecialchars($project['link']); ?>" target="_blank">Voir le projet</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <p><a href="pages/login.php">Se connecter</a></p>
    <p><a href="pages/register.php">S'inscrire</a></p>
</body>
</html>
