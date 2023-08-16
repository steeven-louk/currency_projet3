<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
</p>


# Currency

Ce projet est une application Web permettant de gérer les paires de devises, avec la possibilité d'ajouter, mettre à jour et supprimer des paires de devises. L'application est développée avec Laravel et Vue.js.

## Prérequis

Avant de commencer, assurez-vous que votre environnement de développement répond aux exigences suivantes :

- PHP >= 7.3
- Composer
- Node.js >= 14.x
- NPM ou Yarn

## Installation

Suivez les étapes ci-dessous pour installer et exécuter l'application localement sur votre machine :

1. Clonez le projet à partir du référentiel Git :

```bash
git clone <https://github.com/steeven-louk/currency_projet3.git>
cd currency_projet3
```

2. Installez les dépendances PHP en utilisant Composer :

```bash
composer install
npm install
npm run dev
```

Installez les dépendances JavaScript en utilisant NPM ou Yarn :

```bash
npm install
# ou
yarn install
```

Initialisez le fichier .env

```bash
dupliquer .env.example
# et
renommer .env
```

Exécutez les migrations pour créer les tables nécessaires dans la base de données :

```bash
php artisan migrate
```

Exécutez le seeder pour pré-remplir la table des paires de devises avec des données de test :

```bash
php artisan db:seed --class=UserTableSeeder
php artisan db:seed --class=DeviseTableSeeder
php artisan db:seed --class=PaireTableSeeder
```

Generez la Clé d'API

```bash
php artisan key:generate
```

## Utilisation
Une fois l'installation terminée, vous pouvez exécuter l'application en utilisant la commande suivante :

```bash
php artisan serve
```

L'application sera accessible à l'adresse http://localhost:8000 dans votre navigateur.

## Fonctionnalités
L'application offre les fonctionnalités suivantes :

- Affichage de la liste des paires de devises existantes.
- Ajout d'une nouvelle paire de devises avec un taux de change.
- Mise à jour d'une paire de devises existante.
- Suppression d'une paire de devises.

## Technologie utilisée

- Laravel 8.x - Framework PHP pour le backend.
- Vue.js 3.x - Framework JavaScript pour le frontend.

## Auteurs
Ce projet a été développé par Steeven Loukanou.


