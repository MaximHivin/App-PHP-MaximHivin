
# Interface de gestion d'un stock de graines'

Je souhaite gérer moi-même le stock de semences en ma possession..

Pour cela je dois : 

1. Concevoir la base de données.

Les semences (graines) ont un nom, une famille (Solanacées, Cucurbitacées, Légumineuses ...), une période de plantation, une période de récolte, des conseils de jardinage, un visuel ( ICI je n'ai pas compris si il fallait ajouter une image par type de semences ! ) et une quantité (stock)

2. Créer une interface qui liste les semences.

3. Créer une interface permettant d’ajouter des semences en base de données.

4. Permettre la suppression d’une semence.

5. Sécuriser l’accès à l’application.

6. Proposer un export CSV.

7. Générer un calendrier de plantation “pense-bête” pratique pour le jardinier.

## Pour commencer

J'ai réalisé cette application de la manière la plus simple possible en PHP. Pour le CSS j'ai utilisé Bootstrap dans un soucis de rapidité. 

Pour Sécuriser l'accés à l'application j'aicréé de système de connexion sans BDD. Les informations de connexion sont stocké directement dans un fichier de l'application, ici  `check.php`.


1. J'ai créé la base de données `semance` (login et password : semance)
2. importer le fichier [semance.sql]


## Comment cela c'est passé ? 

Pour les 5 premiers points de l'application j'ai réalisé ça en deux soirées. En ce qui concerne les points 6 et 7 je reussi à afficher les données sur la page d'accueil, je réussi a créer un script pour télécharger ces données en CSV. Cependant bien que le script réalise son travail d'export en CSV, j'ai des difficultés à récupérer les données de ma BDD `semance` pour les afficher dans le fichier CSV.

Il s'agit d'une première version, avec un peu plus de temps des améliorations auraient pu être faites, notamment sur la factorisation du code, la gestion des erreurs lors des envois de formulaires...





