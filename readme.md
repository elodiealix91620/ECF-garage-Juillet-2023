#ECF Garage V.Parrot 

Description : L'objectif de ce projet est de proposer une application web vitrine pour le garage automobile V.Parrot, implanté depuis 2021 à Toulouse et souhaitant promouvoir ses différents services. 

## Installation

1. Clonez ce dépôt de code sur votre machine locale.
2. Exécutez la commande `npm install` pour installer les dépendances.
3. Configurez les fichiers de configuration selon vos besoins.

## Utilisation

1. Exécutez la commande `npm start` pour démarrer l'application.
2. Accédez à l'URL `http://localhost:3000` dans votre navigateur.

## Fonctionnalités 

- Fonctionnalité 1 : Connexion en tant qu'administrateur ou employé du garage 

Pour que l'administrateur ou l'un des employés du garage puisse se connecter, il lui faudra cliquer sur "se connecter" en haut à droite de la page puis rentrer son email et mot de passe de connexion. 
A ce jour, deux utilisateurs existent : 
- l'administrateur et gérant du garage ==> email : Vincent.parrot@v-parrot.fr et mot de passe : 123
- un employé ==> email : Samuel.durand@v-parrot.com et mot de passe : 1234


Afin de pouvoir accéder aux fonctionnalités administrateur ou employé, il faut cliquer sur le nom/prénom en haut à droite. 
La flèche à côté du nom/prénom servant à déconnecter l'administrateur ou employé

Une fois l'accès au panneau admin, le bandeau du header doit changer de couleur dans un vert turquoise. 
Pour avoir la vision client du site sans pour autant se déconnecter, il suffit de cliquer sur le logo en haut à gauche. 

- Fonctionnalité 2 : gestion de la base véhicules d'occasion à vendre

Après s'être connecté au panneau admin, il sera possible en cliquant sur l'onglet "Véhicules", d'ajouter une nouvelle annonce en cliquant sur "ajouter une voiture". 
Il est également possbible de modifier des informations d'un véhicules déjà ajouté en cliquant sur "voir". L'admin ou l'employé pourra alors supprimer des options existantes, en ajouter de nouvelles en cliquant sur "ajouter une option" ou modifier d'autres informations déjà renseignées via le bouton "modifier la voiture". Il est aussi possible de supprimer l'intégralité de l'annonce en cliquant sur "supprimer la voiture". 
L'admin ou l'employé veillera à mettre à jour régulièrement le statut afin de ne plus mettre les véhicules déjà vendus en visibilité sur le site grâce au statut "vendu" accessible via le bouton "modifier la voiture". 

- Fonctionnalité 3 : gestion de la base avis clients 

Après s'être connecté au panneau admin, il sera possible en cliquant sur l'onglet "avis", d'ajouter un avis client ou d'approuver un avis déposé par un client directement sur le site via le bouton "voir" puis "valider l'avis". 
Un filtre pour accéder plus rapidement aux avis est disponible 

- Fonctionnalité 4 : gestion de la base de données des contacts clients 

Après s'être connecté au panneau admin, il sera possible en cliquant sur l'onglet "contact", de prendre en compte les messages et demande envoyés par les clients directement via le site. Il faudra alors cliquer sur "voir" pour accéder au détail du message. 
Un filtre est également disponible.

- Fonctionnalité 5 : gestion des services 

Après s'être connecté au panneau admin, il sera possible uniquement pour l'administrateur en cliquant sur l'onglet "services", d'ajouter un nouveau service ou de modifier les informations d'un service déjà existant. 
Un filtre est également disponible.

- Fonctionnalité 6 : gestion des utilisateurs 

Après s'être connecté au panneau admin, il sera possible uniquement pour l'administrateur en cliquant sur l'onglet "utilisateurs", d'ajouter un nouveau compte pour l'un de ses employés. 
Un filtre est également disponible.

- Fonctionnalité 7 : gestion des horaires 

Après s'être connecté au panneau admin, il sera possible uniquement pour l'administrateur en cliquant sur l'onglet "horaires", d'ajouter ou de modifier les horaires du garage qui s'affichent directement dans le footer du site en bas à gauche. 

## Licence 

Ce projet ne figure pas sous licence mais utilise divers composants open source Boostrap. 
Les langages utilisés sont html, css et PHP. 

## Informations de contact 

Pour contacter le créateur de ce site internet, vous pouvez directement contacter Elodie ALIX au 06.51.84.10.88 ou par email à elodie.alix91@gmail.com
