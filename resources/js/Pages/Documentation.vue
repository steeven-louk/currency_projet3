<script setup>
import { Link } from '@inertiajs/inertia-vue3';
    
</script>
<template>
       <header class="w-max-screen pb-3 bg-gray-800">
           <Link href="login" class="text-white block ml-auto pr-3 underline text-end font-bold cursor-pointer hover:text-gray-50 uppercase underline-offset-4">
            login 
        </Link>
    </header>
    <div class="bg-gray-800 p-5 gap-6 text-white">
        
        <div>
            <h2>Analyse client :</h2>

<p>
    Le client, MoneyValue, souhaite développer une application permettant aux utilisateurs de suivre les taux de change
    des
    devises en temps réel. L'application devra être divisée en deux parties : une interface d'administration pour gérer
    les
    paires de devises et leurs taux, et une API REST pour permettre aux utilisateurs d'accéder aux informations sur les
    taux
    de change.
</p>
        </div>

<div>
    <h2>Choix technologiques :</h2>
<ul>
    <li>    Vue.js : Framework JavaScript moderne et réactif pour créer une interface utilisateur interactive et dynamique.
</li>
    <li>Tailwind CSS : Framework CSS utilitaire pour faciliter la conception et le stylisme de l'interface utilisateur.</li>
    <li>Laravel Breeze : Package Laravel pour la génération rapide d'un système d'authentification (login, register, reset password, etc.).</li>
    <li>Axios : Bibliothèque JavaScript pour effectuer des appels API HTTP depuis le frontend vers le backend.</li>
</ul>




<p>
    Côté API (back), nous utiliserons Laravel pour développer l'API REST. Laravel est un framework PHP populaire qui
    offre
    des fonctionnalités robustes pour créer des applications Web sécurisées et évolutives. Nous utiliserons également
    MySQL
    comme base de données pour stocker les paires de devises et leurs taux.
</p>
</div>

<div>
    <h2>Evaluation du temps de travail :</h2>
<p>Voici une estimation du temps de travail pour chaque grand poste de développement :</p>

<!-- 
Backend (API) : 15 jours
Base de données (conception et mise en œuvre) : 5 jours
Tests et débogage : 5 jours
Documentation : 2 jours
Total : 37 jours -->
</div>

<div>
    <h2>Liste fonctionnelle :</h2>
<p> Les fonctionnalités à développer sont les suivantes :</p>

<h2>Administration (Frontend) :</h2>

<ul>
    <li>Authentification des administrateurs</li>
    <li>Gestion des paires de devises (ajout, modification, suppression)</li>
    <li>Gestion des taux de change (ajout, modification)</li>
    <li>Affichage des statistiques des taux de change</li>
</ul>

</div>


<div>
    
<h2>API (Backend) :</h2>

<ul>
    <li>Obtenir la liste des paires de devises</li>
    <li>Obtenir le taux de change d'une paire de devises spécifique</li>
    <li>Mettre à jour le taux de change d'une paire de devises</li>
</ul>
</div>



<div>
    <h2>Recettage :</h2>
<p> Le tableau de recettage indiquera si chaque fonctionnalité est opérationnelle ou non opérationnelle :</p>


<table class="min-w-full mt-5">
    <thead class="bg-gray-700">
        <th>Fonctionnalité</th>
        <th>Statut</th>
    </thead>
    <tbody class="divide-y divide-gray-200">
        <tr>
            <td>Authentification des administrateurs</td>
            <td>Opérationnelle</td>
        </tr>
        <tr>
            <td>Gestion des paires de devises</td>
            <td>Opérationnelle</td>
        </tr>
        <tr>
            <td>Gestion des taux de change</td>
            <td>Opérationnelle</td>
        </tr>
        <tr>
            <td>Affichage des statistiques</td>
            <td>opérationnelle</td>
        </tr>
    </tbody>
</table>
</div>

<h2>Diagramme de la base de données :</h2>



<div>
    <h1>Documentation de l'API :</h1>

<h2>URL de l'API REST :</h2>
<code>

<ul>
    <li>/api/paires (GET) : Obtenir la liste des paires de devises.</li>
    <li>/api/paires/{id} (GET) : Obtenir le taux de change d'une paire de devises spécifique.</li>
    <li>/api/paires/{id} (PUT) : Mettre à jour le taux de change d'une paire de devises.</li>
</ul>
</code>


<p>Fonctionnalité : L'API permet aux utilisateurs d'obtenir des informations sur les paires de devises et leurs taux de
    change.</p>
<p>Données retournées : Les réponses de l'API seront au format JSON et contiendront les informations demandées, telles
    que les paires de devises et leurs taux de change.</p>
<p>Messages d'erreur possibles : L'API retournera des messages d'erreur avec les codes d'erreur appropriés en cas de
    demande invalide ou de problème avec le serveur.</p>

</div>

<div>
    <h2>Adresse Github :</h2>

<code>https://github.com/steeven-louk/currency_projet3</code>

</div>
    </div>

</template>

<style scope>
    div{
        margin-bottom: 25px;
    }
    h2{
        font-size: 20px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 3px;
        text-decoration: undeline;
    }
</style>

