## Projet DevWeb 3 - A Table ! ##

**A Table !** est un projet développé dans le cadre du module
 Développement web : sites dynamiques et développement côté serveur de la
 formation Programmation de sites web du CNAM ([lecnam.net](http://lecnam.net/)).

### Installation ###

Dans un terminal, exécuter les commandes suivantes :
* taper `git clone https://github.com/MaeBzh/atable.git atable` pour cloner le dépôt
* alternative : télécharger le projet sous format .zip, et décompressez-le.
* taper `cd atable` // dossier root du projet
* taper `composer install` pour télécharger les dépendances PHP
* taper `composer update` pour être sur que tous les packages sont à jour
* taper `npm install` pour télécharger les dépendances JS
* taper `npm run production` pour compiler les fichiers JS via Webpack
* vérifier l'existance du fichier *.env* à la racine du projet, s'il n'existe pas, renommer *.env.example* en *.env*
* taper `php artisan storage:link` pour pouvoir accéder aux photos enregistrées dans le dossier storage
* taper `php artisan key:generate` pour générer une clé (`APP_KEY`) dans le fichier *.env*
* configurer les options de connexion à la base de données dans le fichier *.env* :
   * renseigner `DB_HOST`
   * renseigner `DB_DATABASE` 
   * renseigner `DB_USERNAME`
   * renseigner `DB_PASSWORD`
* taper `php artisan migrate` pour créer les tables
* taper `php artisan db:seed` pour générer des jeux de données de démo

### Librairies inclues ###

* [MDBootstrap](https://mdbootstrap.com/) en framework CSS (via npm)
* [JQuery](https://api.jquery.com/) en librairie javascript (via npm)

### Lancer le serveur ### 

Dans un terminal, exécuter la commande suivante :
* taper `php artisan serve`, le service web sera accessible depuis l'adresse http://localhost:8000/

### Jeu de démo ### 

* Compte Admin : admin / password
* Compte Membres : pseudo0 / password, pseudo1 / password, pseudo2 / password, etc
