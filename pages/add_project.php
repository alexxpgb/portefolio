<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    // Vérification si l'utilisateur existe déjà
    $query = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $query->execute([$username]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo "Cet utilisateur existe déjà.";
    } else {
        $query = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        $query->execute([$username, $password_hashed, 'user']);
        header("Location: login.php");
        exit;
    }
}
?>
<form method="POST" action="">
    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">S'inscrire</button>
</form>
