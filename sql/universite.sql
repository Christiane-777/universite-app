-- Création de la base
CREATE DATABASE IF NOT EXISTS universite_inscription;
USE universite_inscription;


-- TABLE FILIERES
CREATE TABLE filieres (
id INT AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(100) NOT NULL
);


-- TABLE ETUDIANTS
CREATE TABLE etudiants (
id INT AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(100) NOT NULL,
prenom VARCHAR(100) NOT NULL,
email VARCHAR(150) NOT NULL UNIQUE,
telephone VARCHAR(20),
password_hash VARCHAR(255) NOT NULL,
filiere_id INT,
statut_dossier ENUM('incomplet', 'attente', 'valide', 'rejete') DEFAULT 'incomplet',
motif_rejet TEXT NULL,
created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
date_naissance DATE NULL,
FOREIGN KEY (filiere_id) REFERENCES filieres(id) ON DELETE SET NULL
);


-- TABLE PAIEMENTS
CREATE TABLE paiements (
id INT AUTO_INCREMENT PRIMARY KEY,
etudiant_id INT NOT NULL,
montant INT NOT NULL DEFAULT 25000,
statut ENUM('non_paye', 'paye') NOT NULL DEFAULT 'non_paye',
date_paiement DATETIME NULL,
FOREIGN KEY (etudiant_id) REFERENCES etudiants(id) ON DELETE CASCADE
);


-- TABLE DOCUMENTS
CREATE TABLE documents (
id INT AUTO_INCREMENT PRIMARY KEY,
etudiant_id INT NOT NULL,
type_document ENUM('cni', 'diplome', 'releve', 'photo') NOT NULL,
fichier_path VARCHAR(255) NOT NULL,
uploaded_at DATETIME DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (etudiant_id) REFERENCES etudiants(id) ON DELETE CASCADE
);


-- TABLE ADMINISTRATEURS
CREATE TABLE admins (
id INT AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(100) NOT NULL,
email VARCHAR(150) NOT NULL UNIQUE,
password_hash VARCHAR(255) NOT NULL
);


-- INSERTION DE FILIERES PAR DÉFAUT
INSERT INTO filieres (nom) VALUES
('Informatique'),
('Génie Civil'),
('Gestion'),
('Droit'),
('Médecine'),
('Économie');


-- COMPTE ADMIN PAR DÉFAUT
-- email : admin@univ.com
-- mot de passe : admin123
INSERT INTO admins (nom, email, password_hash) VALUES
('Administrateur', 'admin@univ.com', '$2y$10$h3UMsmP6K2rngjKdZ4tN6OhdG7NDcNQEALGo3Y8KJ5A3Uw5EMXGVe');