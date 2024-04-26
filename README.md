# test technique
Partie I

    Nom et prénom: Abderrahman Fennane
    Adresse: Sidi Maarouf
    Employeur actuel: HJB TECHNOLOGIES
    Objectif professionnel: Développeur backend
    Expérience professionnelle: Moins ou égale à 1 an

Partie II
A. Questions Générales

    Git: Expliquez Git et différence avec SVN.
        Réponse: Git est une plateforme de gestion de version distribuée qui permet de suivre les modifications effectuées dans les fichiers de code source. Au lieu de stocker uniquement les modifications, Git conserve toutes les versions complètes de chaque fichier, contrairement à SVN (Subversion).

    Composer.lock: Utilisation et importance dans le développement PHP.
        Réponse: Les versions précises de toutes les dépendances d'un projet PHP installées via Composer sont enregistrées dans le fichier composer.lock. Cela assure que chaque membre de l'équipe de développement utilise les mêmes versions de dépendances pour travailler.

    require vs require-dev: Différence dans composer.json.
        Réponse: Les dépendances nécessaires pour exécuter le code en production sont spécifiées par require, tandis que les dépendances nécessaires pour le développement ou les tests sont spécifiées par require-dev.

    Object Pool Pattern: Définition.
        Réponse: Le Pattern de Pool d'Objets est un modèle de design qui améliore les performances et la gestion de la mémoire en réutilisant les objets déjà activés.

    git diff: Utilité.
        Réponse: On utilise la commande git diff afin de montrer les variations entre les modifications apportées dans le répertoire de travail et l'index.

B. JavaScript

    CORS: Définition.
        Réponse: Les navigateurs web utilisent le CORS pour autoriser la demande de ressources web à partir d'un domaine différent de celui où la page initiale a été chargée.

    == vs ===: Différence.
        Réponse: == est un opérateur d'égalité qui compare des valeurs en convertissant des types, tandis que === est un opérateur d'égalité strict qui compare les valeurs et les types de données les uns avec les autres.

    return if ("0" == "true"): Résultat.
        Réponse: False. C'est une comparaison de deux chaînes de caractères, "0" est différente de la chaîne "true".

    this: Signification.
        Réponse: Cela désigne l'objet sur lequel une méthode est appelée. La valeur de this varie en fonction du contexte dans lequel elle est utilisée.

    Asynchronisme: Explication, Promises, async/await.

    Réponse: Il est possible à cause de l'asynchronisme d'exécuter plusieurs tâches simultanément sans perturber le thread principal. Les Promises sont des objets qui permettent de représenter une valeur qui peut être disponible à présent, à l'avenir ou jamais, tandis que async/await est une syntaxe qui permet de travailler de manière asynchrone de manière plus lisible.

C. CSS

    inline vs block: Différence.
        Réponse: Les éléments block prennent toute la largeur disponible et démarrent sur une nouvelle ligne, tandis que les éléments inline ne prennent que la largeur requise.

    Responsive sans media queries: Possibilité.
        Réponse: Oui, mais les média queries offrent la possibilité de personnaliser la mise en page en fonction des caractéristiques de l'appareil, comme la taille de l'écran, l'orientation, etc.

    inline-block, flex, float: Avantages/inconvénients.
        Réponse: Le bloc inline présente des avantages : il permet d'aligner les éléments horizontalement Conséquences - Il arrive parfois que des espaces blancs indésirables se forment entre les éléments //// Avantages de flex : Permet un alignement dynamique des éléments en fonction de l'espace disponible. Conséquences - Il est nécessaire d'avoir une certaine connaissance de la syntaxe //// Avantages de float : Pratique pour aligner les éléments à gauche ou à droite d'un récipient. Conséquences: Le flottement peut causer des difficultés de surcharge de contenu et de mise en page.


    ::before et ::after: Utilisation.
        Réponse: On peut utiliser les pseudo-éléments ::before et ::after pour insérer du contenu généré avant et après le contenu de l'élément ciblé.

D. PHP

    Programme: Imprimer nombres 1 à 100 avec conditions.
        Réponse: 16.	
        <?php
          for ($i = 1; $i <= 100; $i++) {
              $output = ($i % 3 == 0 ? "Dev" : "") . ($i % 5 == 0 ? "Ops" : "");
        	        echo $output? $output . "<br>" : $i . "<br>";
        	    }
  	    ?>

    isPrime function: Vérifier si un nombre est premier.
        Réponse: 
        <?php
        function isPrime($num) {
            if ($num <= 1) {
                return false;
        	    }
           for ($i = 2; $i <= sqrt($num); $i++) {
                if ($num % $i == 0) {
                   return false;
        	        }
	        }

         return true;
         }
      echo isPrime(70) ? 'Prime' : 'Composite';
      ?>



    Résultat de l'exécution du code PHP: Explication ligne par ligne.
        Réponse: 
        a.	Un tableau nommé $array : [3, 8, -4, 0, 2, -9].
          b.	La boucle foreach est utilisée pour parcourir chaque élément du tableau $array. Pour chaque objet $item, nous procédons de la manière suivante :
          •	Lorsque la valeur de $item est supérieure ou égale à zéro ($item >= 0), nous ne la modifions pas.
          •	Si $item est négatif, sa valeur est remplacée par son carré en utilisant la fonction pow($item,2)
          c.	Après avoir parcouru tous les éléments du tableau, la boucle foreach prend fin.
          d.	Finalement, nous montrons le contenu actualisé du tableau en utilisant la fonction print_r($array), ce qui donnera l'affichage de [3, 8, 16, 0, 2, 81].

E. DATABASE

    Nombre d'employés par jour d'inscription: Requête SQL.
        Réponse: SELECT DATE(create_at) AS date_inscription, COUNT(*) AS nb_employés
		FROM employee
	GROUP BY DATE(create_at);


    Employés inscrits le 3/10/2021: Requête SQL.
        Réponse: SELECT *
	FROM employee
	WHERE DATE(create_at) = '2021-10-03';

    Employés avec email spécifique: Requête SQL.
        Réponse: SELECT * 
	FROM employee 
	WHERE email REGEXP '^[bcdfghjklmnpqrstvwxyz][0-9]';


    Mise en minuscules des noms: Requête SQL.
        Réponse: UPDATE employee
	SET first_name = LOWER(first_name), last_name = LOWER(last_name);


    Modification de colonne: Requête SQL.
        Réponse: ALTER TABLE employee
	CHANGE COLUMN create_at date_creation TIMESTAMP;

    Différence entre DELETE et TRUNCATE: Explication.
        Réponse: •	DELETE : Supprime les enregistrements spécifiés d'une table. Il peut être accompagné d'une condition pour filtrer les enregistrements à supprimer. 
                •	TRUNCATE : Supprime tous les enregistrements d'une table sans condition. Il réinitialise l'auto-incrémentation des clés primaires et libère l'espace de stockage utilisé par la table.


    Liste des employés avec salaire supérieur: Requête SQL.
        Réponse: SELECT *
	FROM employee
	WHERE salaire > 2 * (SELECT MIN(salaire) FROM employee);
# test Pratique
composer update  

php artisan migrate

php artisan serve  

npm install  
 
npm run dev  

