<script setup>
import { Link } from '@inertiajs/inertia-vue3'; 
</script>

<template>
    <header class="w-max-screen pb-3 bg-gray-800">
        <Link href="login"
            class="text-white block ml-auto pr-3 underline text-end font-bold cursor-pointer hover:text-gray-50 uppercase underline-offset-4">
        login
        </Link>
    </header>
    <div class="bg-gray-800 p-5 gap-6 text-white">

        <div>
            <h2>Analyse client :</h2>

            <p>
                Le client, MoneyValue, souhaite développer une application permettant aux utilisateurs de suivre les taux de
                change des devises en temps réel. L'application devra être divisée en deux parties : une interface
                d'administration pour gérer
                les paires de devises et leurs taux, et une API REST pour permettre aux utilisateurs d'accéder aux
                informations sur les taux de change.
            </p>
        </div>

        <div>
            <h2>Choix technologiques :</h2>
            <ul>
                <li>Vue.js : Framework JavaScript moderne et réactif pour créer une interface utilisateur interactive et
                    dynamique.</li>
                <li>Tailwind CSS : Framework CSS utilitaire pour faciliter la conception et le stylisme de l'interface
                    utilisateur.</li>
                <li>Laravel Breeze : Package Laravel pour la génération rapide d'un système d'authentification (login,
                    register, reset password, etc.).</li>
                <li>Axios : Bibliothèque JavaScript pour effectuer des appels API HTTP depuis le frontend vers le backend.
                </li>
                <li>SweetAlert2 : Bibliothèque qui nous permet de créer toutes sortes de messages d'alerte qui peuvent être
                    personnalisés pour correspondre à l'apparence de notre propre site Web.</li>
            </ul>

            <br>
            <p>
                Côté API (back), nous utiliserons Laravel pour développer l'API REST. Laravel est un framework PHP populaire
                qui offre
                des fonctionnalités robustes pour créer des applications Web sécurisées et évolutives. Nous utiliserons
                également
                MySQL comme base de données pour stocker les paires de devises et leurs taux.
            </p>
        </div>

        <div>

            <h2>Evaluation du temps de travail :</h2>

            <p>Voici une estimation du temps de travail pour chaque grand poste de développement :</p>

            <ul>
                <ol>Backend (API) : 2 jours</ol>
                <ol>Base de données (conception et mise en œuvre) : 1 jours</ol>
                <ol>Documentation : 1 jours</ol>
                <ol>Front End : 4 jours</ol>
                <ol>Total : 8 jours</ol>

            </ul>

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

        <div>
            <h2>authentification</h2>

            <code>
                <ul>
                    <li>email : admin@admin.com</li>
                    <li>password : password</li>
                </ul>
            </code>
            
        </div>

        <div> <br>
            <span >Database : currency</span>

            <h2>migration</h2>
            <code><i>php artisan migrate</i> (pour faire migrer toute les tables dans la base de donnée)</code>
           
            <h2>seeder</h2>
            <code>
                <i>php artisan db:seed --class=UserTableSeeder </i>
                <i>php artisan db:seed --class=DeviseTableSeeder</i>
                <i>php artisan db:seed --class=PaireTableSeeder</i>
            </code>
            
        </div>

        <div>
            <h2>Diagramme de la base de données :</h2>

            <img src="../../../../public/assets/currencyModel.png" alt="">
        </div>

        <div>
            <h1>Documentation de l'API :</h1>

            <h2>URL de l'API REST :</h2>
    
    <code>
        <ul>
            <li>(GET) /api/paire : Récupérer toutes les paires de devises disponibles.</li>
            <li>(POST) /api/paire : Créer une nouvelle paire de devises.</li>
            <li>(PUT) /api/paire/{id} : Mettre à jour une paire de devises spécifique par son identifiant.</li>
            <li>(DELETE) /api/paire/{id} : Supprimer une paire de devises spécifique par son identifiant.</li>
        </ul>

        <ul>
            <li>(GET) /api/devise : Récupérer toutes les paires de devises disponibles.</li>
            <li>(POST) /api/devise : Créer une nouvelle devises.</li>
            <li>(PUT) /api/devise/{id} : Mettre à jour une devises spécifique par son identifiant.</li>
            <li>(DELETE) /api/devise/{id} : Supprimer une devises spécifique par son identifiant.</li>
        </ul>
    </code>


            <h2>Données retournées :</h2>

        <code>
            <ul>
                <li>(GET) /api/paire : Un tableau JSON contenant toutes les paires de devises avec leurs informations (ID,
                    devise_1, devise_2, taux,conversionNumber).</li>
                <li>(POST) /api/paire : Un objet JSON contenant les informations de la nouvelle paire de devises créée.
                </li>
                <li>(PUT) /api/paire/{id} : Un objet JSON contenant les informations mises à jour de la paire de devises
                    spécifique correspondant à l'ID donné.</li>
                <li>(DELETE) /api/paire/{id} : Une réponse JSON indiquant que la paire de devises spécifique a été
                    supprimée avec succès.</li>
            </ul>
          
            <ul>
                <li>(GET) /api/devise : Un tableau JSON contenant toutes les devises avec leurs informations (ID, devise_1,
                    devise_2, taux,conversionNumber).</li>
                <li>(POST) /api/devise : Un objet JSON contenant les informations de la nouvelle devises créée.</li>
                <li>(PUT) /api/devise/{id} : Un objet JSON contenant les informations mises à jour de la devises spécifique
                    correspondant à l'ID donné.</li>
                <li>(DELETE) /api/devise/{id} : Une réponse JSON indiquant que la devises spécifique a été supprimée avec
                    succès.</li>
            </ul>

        </code>

            <h2>Messages d'erreur possibles :</h2>

          <code>
            <ul>
                <li>(GET) /api/paire : Si aucune paire de devises n'est trouvée, renvoie un tableau JSON vide.</li>
                <li>(POST) /api/paire : Si les données fournies pour créer une nouvelle paire de devises sont invalides,
                    renvoie un message d'erreur approprié avec un code HTTP 422 (Unprocessable Entity) ou 404 (Not Found).
                </li>
                <li>(PUT) /api/paire/{id} : Si les données fournies pour la mise à jour de la paire de devises sont invalides
                    ou si la paire avec l'ID donné n'est pas trouvée, renvoie un message d'erreur approprié avec un code
                    HTTP 422 (Unprocessable Entity) ou 404 (Not Found).</li>
                <li>(DELETE) /api/paire/{id} : Si la paire de devises avec l'ID donné n'est pas trouvée, renvoie un message
                    d'erreur approprié avec un code HTTP 404 (Not Found).</li>
            </ul>

            <ul>
                <li>(GET) /api/devise : Si aucune devises n'est trouvée, renvoie un tableau JSON vide.</li>
                <li>(POST) /api/devise : Si les données fournies pour créer une nouvelle devises sont invalides,
                    renvoie un message d'erreur approprié avec un code HTTP 422 (Unprocessable Entity) ou 404 (Not Found).
                </li>
                <li>(PUT) /api/devise/{id} : Si les données fournies pour la mise à jour de la devises sont invalides
                    ou si la paire avec l'ID donné n'est pas trouvée, renvoie un message d'erreur approprié avec un code
                    HTTP 422 (Unprocessable Entity) ou 404 (Not Found).</li>
                <li>(DELETE) /api/devise/{id} : Si la devises avec l'ID donné n'est pas trouvée, renvoie un message
                    d'erreur approprié avec un code HTTP 404 (Not Found).</li>
            </ul>
          </code>

            <h2>Fonctionnalité :</h2>

          <code>
            <ul>
                <li>L'API permet aux utilisateurs d'obtenir des informations sur les devises , les paires de devises et
                    leurs taux de change.</li>
                <li>Données retournées : Les réponses de l'API seront au format JSON et contiendront les informations
                    demandées, telles que les paires de devises, les devises et leurs taux de change.</li>
                <li>Messages d'erreur possibles : L'API retournera des messages d'erreur avec les codes d'erreur appropriés
                    en cas de demande invalide ou de problème avec le serveur.</li>
            </ul>
          </code>

        </div>

        <div>
            <h2>Adresse Github :</h2>

            <code><a href="https://github.com/steeven-louk/currency_projet3" target="_blank">https://github.com/steeven-louk/currency_projet3</a></code>

        </div>
    </div>
</template>

<style scope>div:not(:nth-last-child()) {
    margin-bottom: 25px;
}

h2 {
    font-size: 20px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 3px;
    text-decoration: undeline;
    margin: 15px 0;
    text-decoration: underline;
    text-underline-offset: 6px;
}

ul {
    list-style-type: circle;
    margin-left: 2em;
}
code{
    display: flex;
    flex-direction: column;
    gap: 20px;
}
</style>

