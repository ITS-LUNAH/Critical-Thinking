-- Création de la base de données
CREATE DATABASE IF NOT EXISTS critical_thinking_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE critical_thinking_db;

-- Structure de la table situations
CREATE TABLE IF NOT EXISTS situations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
) ENGINE=InnoDB;

-- Structure de la table steps
CREATE TABLE IF NOT EXISTS steps (
    id INT AUTO_INCREMENT PRIMARY KEY,
    situation_id INT,
    step_order INT,
    content TEXT NOT NULL,
    FOREIGN KEY (situation_id) REFERENCES situations(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Insertion d'une situation exemple
INSERT INTO situations (title, description) VALUES (
    'Problème de Ventes',
    'Les ventes de votre boutique en ligne ont chuté de 30% ce mois-ci sans raison apparente.'
);

-- Récupération de l'ID inséré (pour le script, on suppose 1)
SET @sit_id = LAST_INSERT_ID();

-- Insertion des étapes
INSERT INTO steps (situation_id, step_order, content) VALUES 
(@sit_id, 1, 'Identifier la baisse des ventes et définir le périmètre.'),
(@sit_id, 2, 'Collecter les données (trafic, avis clients, logs techniques).'),
(@sit_id, 3, 'Analyser les données pour trouver la cause racine.'),
(@sit_id, 4, 'Proposer des solutions (ex: réparer le bug de paiement).'),
(@sit_id, 5, 'Implémenter la solution choisie.'),
(@sit_id, 6, 'Évaluer les résultats après une semaine.');
