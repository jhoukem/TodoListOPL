# TodoListOPL

Le site permet de créer/supprimer des todos ainsi que de les marquer comme validés. Il n'y a pas de gestion d'utilisateur.  

Vous aurez besoin du paquet php5-sqlite pour la base de données `sudo apt install php5-sqlite`.  
L'installation des autres dépendances se fait avec la commande  
`php composer.phar update`.  
(Vous n'avez qu'à appuyer sur entrée à chaque question il n'y a rien de spécial à faire).
Du fait qu'on utilise sqlite, vous obtiendrez sûrement une erreur car il manquera un paramètre **database_path** à rajouter manuellement par la suite dans fichier app/config/parameter.yml.  
Ce fichier est généré lors de la commande `php composer.phar update` mais il n'est pas partagé sur le git par soucis de confidentialité (mot de passe de la BDD en clair à l'interieur)  
Rajoutez donc la ligne suivante (juste en dessous de la ligne **database_password**) afin de préciser le chemin vers la base de données :  
**database_path: %kernel.project_dir%/var/data.sqlite**  
Ensuite vous devrez créer et mettre à jour la base de données cela se fait avec les commandes suivantes :  
```
 php bin/console doctrine:database:create
 php bin/console doctrine:schema:update --force
```
Enfin vous pouvez lancer le serveur avec la commande :  
`php bin/console server:start`.  
Les tests se lancent avec la commande :  
`vendor/bin/behat`  
(test de création et de suppression de todo).  
Il n'existe que des tests d'acceptation pour le moment car pas assez de fonctionnalités pour faire des tests unitaires (pas de classe métier importante).  
On a eu des difficultés à bien comprendre ce qui était censé être testé, s'ajoute à cela l'utilisation d'outils nouveau tel le crawler en php (une sorte de Selenium) qu'on à eu du mal à faire fonctionner...  

Jean-Hugo OUKEM, Pierre-Claver DIARRA.
