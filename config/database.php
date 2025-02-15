-- Création de la base de données
CREATE DATABASE IF NOT EXISTS projetb2;
USE projetb2;

-- Table des utilisateurs
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des compétences
CREATE TABLE IF NOT EXISTS skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    level ENUM('beginner', 'intermediate', 'expert') DEFAULT 'beginner',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des projets
CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255),
    link VARCHAR(255),
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insérer quelques utilisateurs par défaut (mots de passe en texte brut)
INSERT INTO users (username, password, role) VALUES
    ('admin', 'password', 'admin'),
    ('user1', 'password', 'user'),
    ('user2', 'password', 'user');

-- Insérer quelques compétences par défaut
INSERT INTO skills (name, level) VALUES
    ('PHP', 'expert'),
    ('JavaScript', 'intermediate'),
    ('HTML', 'expert'),
    ('CSS', 'beginner');

-- Insérer quelques projets par défaut
INSERT INTO projects (title, description, image, link, user_id) VALUES
    ('Mon Premier Projet', 'Description du projet', 'image1.jpg', 'https://example.com', 1),
    ('Projet 2', 'Un autre projet', 'image2.jpg', 'https://example.com', 2),
    ('Projet 3', 'Projet intéressant', 'image3.jpg', 'https://example.com', 3);
