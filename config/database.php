-- Créer la base de données
CREATE DATABASE IF NOT EXISTS projetb2;

-- Utiliser la base de données projetb2
USE projetb2;

-- Créer la table des utilisateurs
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('admin', 'user') NOT NULL
);

-- Insérer des utilisateurs de test
INSERT INTO users (username, password, role) 
VALUES 
  ('admin', 'password', 'admin'),
  ('user1', 'password', 'user'),
  ('user2', 'password', 'user');

-- Créer la table des compétences
CREATE TABLE IF NOT EXISTS skills (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  description TEXT
);

-- Insérer des compétences de test
INSERT INTO skills (name, description) 
VALUES 
  ('PHP', 'Développement d\'applications web avec PHP'),
  ('MySQL', 'Gestion de bases de données relationnelles'),
  ('HTML', 'Structure de pages web');

-- Créer la table des projets
CREATE TABLE IF NOT EXISTS projects (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  image VARCHAR(255),
  link VARCHAR(255),
  user_id INT,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Insérer des projets de test
INSERT INTO projects (title, description, image, link, user_id)
VALUES 
  ('Mon Premier Projet', 'Description du projet', 'image1.jpg', 'https://example.com', 1),
  ('Projet 2', 'Un autre projet', 'image2.jpg', 'https://example.com', 2),
  ('Projet 3', 'Projet intéressant', 'image3.jpg', 'https://example.com', 3);
