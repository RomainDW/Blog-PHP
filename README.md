# Blog PHP
Projet 5 de la formation Développeur PHP / Symfony par Openclassrooms

![Image](https://user.oc-static.com/upload/2016/11/17/1479381549985_shutterstock_385167373.jpg)

## Contexte
Ça y est vous avez sauté le pas ! Le monde du développement web avec PHP est à portée de main et vous avez besoin de visibilité pour pouvoir convaincre vos futurs employeurs/clients en un seul regard. Vous êtes développeur PHP, il est donc temps de montrer vos talents au travers d’un blog à vos couleurs.

## Description du besoin
Le projet est donc de développer votre blog professionnel. Ce site web se décompose en deux grands groupes de pages :

les pages utiles à tous les visiteurs ;
les pages permettant d’administrer votre blog.
Voici la liste des pages qui devront être accessibles depuis votre site web :

* la page d'accueil ;
* la page listant l’ensemble des blogs posts ;
* la page affichant un blog post ;
* la page permettant d’ajouter un blog post ;
* la page permettant de modifier un blog post.
* les pages permettant de modifier/supprimer un blog post ;
* les pages de connexion/enregistrement des utilisateurs.

Vous développerez une partie administration qui devra être accessible uniquement aux utilisateurs inscrits et validés.

Les pages d’administration seront donc accessible sur conditions et vous veillerez à la sécurité de la partie administration.

Commençons par les pages utiles à tous les internautes.

Sur la page d’accueil il faudra présenter les informations suivantes :

* Votre nom et prénom ;
* Une photo et/ou un logo ;
* Une phrase d’accroche qui vous ressemble ( exemple : “Martin Durand, le développeur qu’il vous faut !”) ;
* Un menu permettant de naviguer parmi l’ensemble des pages de votre site web ;
* Un formulaire de contact (à la soumission de ce formulaire, un email avec toutes ces informations vous serons envoyé) avec les champs suivants :
  * nom/prénom
  * email de contact
  * message
* un lien vers votre CV au format pdf ;
* et l’ensemble des liens vers les réseaux sociaux où l’on peut vous suivre (Github, LinkedIn, Twitter…).

Sur la page listant tous les blogs posts (du plus récent au plus ancien), il faut afficher les informations suivantes pour chaque blog post :

* le titre ;
* la date de dernière modification ;
* le châpo ;
* et un lien vers le blog post.

Sur la page présentant le détail d’un blog post, il faut afficher les informations suivantes :

* le titre ;
* le chapô ;
* le contenu ;
* l’auteur ;
* la date de dernière mise à jour ;
* le formulaire permettant d’ajouter un commentaire (soumis pour validation) ;
* les listes des commentaires validés et publiés.

Sur la page permettant de modifier un blog post, l’utilisateur a la possibilité de modifier les champs titre, chapô, auteur et contenu.

Dans le footer menu, il doit figurer un lien pour accéder à l’administration du blog.

## Contraintes
Cette fois-ci nous n’utiliserons pas WordPress. Tout sera développé par vos soins. Les seuls lignes de code qui peuvent provenir d’ailleurs seront celles du thème Bootstrap que vous prendrez grand soin de choisir. La présentation, ça compte ! Il est également autorisé d’utiliser une ou plusieurs librairies externes à condition qu’elles soient intégrées grâce à Composer.

Attention, votre blog doit être navigable aisément sur un mobile (Téléphone mobile, phablette, tablette…). C’est indispensable :D

Nous vous conseillons vivement d’utiliser un moteur de templating tel que Twig, mais ce n’est pas obligatoire.

Sur la partie administration, vous veillerez à ce que seul les personnes ayant le droit “administrateur” aient l’accès, les autres utilisateurs pourront uniquement commenter les articles (avec validation avant publication).

Important : Vous vous assurerez qu’il n’y a pas de failles de sécurité (XSS, CRSF, SQL injection, session hijacking, upload possible de script php…).

Votre projet doit être poussé et disponible sur Github. Je vous conseille de travailler avec des pull requests. Dans la mesure où la majorité des communications concernant les projets sur Github se font en anglais, il faut que vos commits soient en anglais.

Vous devrez créer l’ensemble des issues (tickets) correspondant aux tâches que vous aurez à effectuer pour mener à bien le projet.

Veillez à bien valider vos tickets pour vous assurer que ceux-ci couvrent bien toutes les demandes du projet. Donnez une estimation indicative en temps ou en points d’efforts (si la méthodologie agile vous est familière) et tentez de tenir cette estimation.

L’écriture de ces tickets vous permettront de vous accorder sur un vocabulaire commun et Il est fortement apprécié qu’ils soient écrits en anglais !

**Nota Bene**

Votre projet devra être suivi via SensioLabsInsight pour la qualité du code, vous veillerez à obtenir une médaille d'argent au minimum, en complément le respect des PSR est recommandé afin de proposer un code compréhensible et facilement évolutif.

Si vous n’arrivez pas à vous décider sur le thème Bootstrap, en voici un qui pourrait vous convenir http://bit.ly/2emOTxY (source : startbootstrap.com).

Dans le cas où une fonctionnalité vous semblerait mal expliquée ou manquante, parlez-en avec votre mentor afin de prendre une décision ensemble sur les choix que vous souhaiteriez prendre. Ce qui doit prévaloir doit être les délais.

## De l'aide pour aborder le projet étape par étape
Afin de fluidifier votre avancement voici une proposition de manière de travailler :

* ***Étape 1*** - Prendre connaissance entièrement de l’énoncé  et des spécifications détaillées.
* ***Étape 2*** - Créer les diagrammes UML.
* ***Étape 3*** - Créer le repository Github pour le projet.
* ***Étape 4*** - Créer l’ensemble des issues sur le repository Github (https://github.com/username/nom_du_repo/issues/new).
* ***Étape 5*** - Faites vos estimations de l’ensemble de vos issues.
* ***Étape 6*** - Entamez le développement de l’application et proposez des pull requests pour chacune des fonctionnalités/issue. (L’estimation se fera au fur et à mesure de votre développement et sera discutée avec votre mentor.)
* ***Étape 7*** - Faites relire votre code à votre mentor (code proposé dans la ou les pull requests), et une fois validée(s) mergez la ou les pull requests dans la branche principale. (Cette relecture servira à valider que vous implémentez les bonnes pratiques et que votre code est cohérent, la validation se fera en continue durant les sessions.)
* ***Étape 8*** - Validez la qualité du code via SensioLabsInsight.
* ***Étape 9*** - Effectuez une démonstration de l’ensemble de l’application.
* ***Étape 10*** - Préparez l’ensemble de vos livrables et soumettez les sur la plateforme.

Prenez le temps de valider chaque étape avec votre mentor afin de vous assurer que vous avancez dans la bonne direction 😉

## Livrables
* Un lien vers l’ensemble du projet (fichiers PHP/HTML/JS/CSS…) sur un repository Github
* Les instructions pour installer le projet (dans un fichier README à la racine du projet)
* Les schémas UML (au format png ou jpg dans un dossier nommé diagrammes à la racine du projet)
  * diagrammes de cas d’utilisation
  * diagramme de classes
  * diagrammes de séquence
* Les issues sur le repository Github que vous aurez créé
* Un lien vers la dernière analyse SensioLabsInsight (ou vers le projet public sur la plateforme).

## Ressources
Thèmes Bootstrap gratuits : startbootstrap.com

Moteur de templating Twig : twig.sensiolabs.org

Qu’est-ce qu’une pull request : help.github.com/articles/about-pull-requests

Créer une pull request : help.github.com/articles/creating-a-pull-request

Comment travailler avec le gestionnaire de paquet PHP Composer : getcomposer.org

SensioLabsInsight : https://insight.sensiolabs.com 

PSR 1 et 2 : http://www.php-fig.org/psr/ 

## Compétences à valider
* Estimer une tâche et tenir les délais
* Analyser un cahier des charges
* Conceptualiser l'ensemble de son application en décrivant sa structure (Entités / Domain Objects)
* Gérer ses données avec une base de données
* Rédiger les spécifications détaillées du projet
* Proposer un code propre et facilement évolutif
* Choisir une solution technique adaptée parmi les solutions existantes si cela est pertinent
* Assurer le suivi qualité d’un projet
* Créer et maintenir l’architecture technique du site
* Créer une page web permettant de recueillir les informations saisies par un internaute
