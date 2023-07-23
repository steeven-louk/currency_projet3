<template>
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

    <h2>Choix technologiques :</h2>

    Vue.js : Framework JavaScript moderne et réactif pour créer une interface utilisateur interactive et dynamique.
Tailwind CSS : Framework CSS utilitaire pour faciliter la conception et le stylisme de l'interface utilisateur.
Laravel Breeze : Package Laravel pour la génération rapide d'un système d'authentification (login, register, reset password, etc.).
Axios : Bibliothèque JavaScript pour effectuer des appels API HTTP depuis le frontend vers le backend.

    <p>
        Côté API (back), nous utiliserons Laravel pour développer l'API REST. Laravel est un framework PHP populaire qui
        offre
        des fonctionnalités robustes pour créer des applications Web sécurisées et évolutives. Nous utiliserons également
        MySQL
        comme base de données pour stocker les paires de devises et leurs taux.
    </p>

    <h2>Evaluation du temps de travail :</h2>
    <p>Voici une estimation du temps de travail pour chaque grand poste de développement :</p>

<!-- 
    Backend (API) : 15 jours
    Base de données (conception et mise en œuvre) : 5 jours
    Tests et débogage : 5 jours
    Documentation : 2 jours
    Total : 37 jours -->
    
    <h2>Liste fonctionnelle :</h2>
   <p> Les fonctionnalités à développer sont les suivantes :</p>

    <h2>Administration (Frontend) :</h2>

    <ul>
        <li>Authentification des administrateurs</li>
        <li>Gestion des paires de devises (ajout, modification, suppression)</li>
        <li>Gestion des taux de change (ajout, modification)</li>
        <li>Affichage des statistiques des taux de change</li>
    </ul>




    <h2>API (Backend) :</h2>

    <ul>
        <li>Obtenir la liste des paires de devises</li>
        <li>Obtenir le taux de change d'une paire de devises spécifique</li>
        <li>Mettre à jour le taux de change d'une paire de devises</li>
    </ul>



    <h2>Recettage :</h2>
    <p> Le tableau de recettage indiquera si chaque fonctionnalité est opérationnelle ou non opérationnelle :</p>


    <table>
        <thead>
            <th>Fonctionnalité</th>
            <th>Statut</th>
        </thead>
        <tbody>
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
                <td>Non opérationnelle</td>
            </tr>
        </tbody>
    </table>

    <h2>Diagramme de la base de données :</h2>



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

<h2>Adresse Github :</h2>

<code>https://github.com/steeven-louk/currency_projet3</code>

</template>