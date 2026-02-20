# Helpdesk (Système de tickets) 🔧

Une application PHP légère pour la gestion de tickets (structure pédagogique / démonstration).

## ✅ Présentation
- Projet minimal en PHP avec autoload PSR‑4 (Composer).
- Routeur simple, accès PDO → MySQL et repository basique pour les utilisateurs.
- Base de données fournie (`helpdesk.sql`) avec schéma et données d'exemple.

## ✨ Fonctionnalités principales
- CRUD basique pour tickets, commentaires et tags (structure du projet seulement).
- Routeur minimaliste pour définir des routes closures et contrôleurs.
- Seed SQL prêt à l'emploi pour tester rapidement.

## 🔧 Prérequis
- PHP 7.4+ (PDO MySQL)
- MySQL / MariaDB
- Composer

## 🚀 Installation rapide
```bash
# cloner
git clone <votre-repo> ticket-app
cd ticket-app

# installer les dépendances
composer install

# importer la base de données (le fichier crée la base et l'utilisateur de dev)
mysql -u root -p < helpdesk.sql

# lancer le serveur de développement
php -S localhost:8000 -t public
```

> Par défaut la connexion DB est hardcodée dans `src/Core/Database.php` (user: `helpdesk`, password: `helpdesk`, db: `helpdesk`). Changez ces valeurs pour un environnement de production.

## 📍 Routes utiles (exemples)
- `GET /` — page d’accueil
- `GET /userall` — affiche tous les utilisateurs (exemple de repository)
- `GET /contact` — page contact


## 📁 Structure du projet
- `public/` — point d’entrée (front controller)
- `src/Core/` — Database, Router, classes centrales
- `src/Controller/` — contrôleurs (User, Ticket, ...)
- `src/Repository/` — accès aux données (ex: `UserRepository`)
- `helpdesk.sql` — schéma + données de démonstration
- `composer.json` — autoload PSR‑4

## 💡 Remarques
- Projet pédagogique / démo : adapter la gestion des configurations pour la production (variables d’environnement, .env).
- Pas de tests unitaires inclus actuellement.

## Contribuer
Les contributions sont bienvenues : ouvrez une issue ou une pull request avec une description claire des changements.

## ✅ Licence
Le projet est distribué sous licence **MIT** — voir le fichier `LICENSE` à la racine du dépôt. Remplacez `\[Votre nom\]` dans `LICENSE` pour indiquer le titulaire si nécessaire.
