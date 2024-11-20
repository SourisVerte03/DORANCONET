## Hackathon saison-01 session-02  
### Cahier des Charges : Développement d'une Application de Réseau Social Interne Scolaire

#### 1. **Contexte et Objectifs**
Le projet vise à créer un espace d'échange et de partage simplifié entre les étudiants de Doranco, inspiré des concepts de Twitter et Reddit (sans les sub-reddits). L'application doit offrir une plateforme intuitive pour la publication de contenu et les interactions entre utilisateurs.

#### 2. **Périmètre du Projet**
Le développement couvre la création d'une application web suivant l'architecture MVC, avec des fonctionnalités de gestion d'utilisateurs, de publications, de commentaires, et de likes.

#### 3. **Descriptif fonctionnel**
##### a. **Mur Public Commun**
- **Fonctionnalité** : Un flux de publications accessible à tous, affiché de manière chronologique.
- **Détails** :
  - Affichage des publications avec nom et prénom, contenu et date.
  - Ordre : dernières publications en premier.

##### b. **Gestion des Utilisateurs**
- **Inscription et Connexion** :
  - Champs requis : Nom, Prénom, Date de naissance, Email, Photo de profil, Mot de passe.
  - Vérification de l'unicité de l'email.
  - Méthodes sécurisées de validation et de connexion (hashage sécurisé des mots de passe).  
- **Déconnexion sécurisée**.
- **Suppression de compte** :
  - Désactivation en base de données avec rétention des données pendant 1 an (conformité CNIL).
  - Trigger pour suppression automatique après un an.

##### c. **Gestion des Publications et Interactions**
- **Création et Suppression de Publications** :
  - Les utilisateurs peuvent poster et supprimer leurs propres publications.
- **Commentaires** :
  - Possibilité de commenter les publications.
- **Likes** :
  - Système de likes visible avec compteur associé à chaque publication.

#### 4. **Contraintes Techniques**
- **Utilisation de chatgpt et d'iA :** Strictement interdit, vous etes dans un contexte d'entreprise ou le code est propriétaire.  "Meme si pour le hackathon, le code est opensource"  
- **Back-end** : PHP pour la gestion des requêtes et des traitements serveur.
- **Base de Données** : MySQL pour stocker utilisateurs, publications, commentaires, et likes.
- **Architecture MVC** :
  - **Models** : Couche "Dossier" de gestion des interactions avec la base de données.
  - **Views** : Couche "Dossier" présentation (HTML, CSS, Vanilla Javascript).  
  - **Controllers** : Couche "Dossier" coordination entre l'utilisateur, le modèle et la couche vue.  
  - **Point d'entrée** : `index.php`.
  
```
├── index.php
│
├── /controllers
│   ├── AuthController.php
│   ├── UserController.php
│   ├── PostController.php
│   ├── CommentController.php
│   └── LikeController.php
│
├── /models
│   ├── UserModel.php
│   ├── PostModel.php
│   ├── CommentModel.php
│   └── LikeModel.php
│
├── /views
│   ├── login.php
│   ├── register.php
│   ├── create_post.php
│   ├── view_posts.php
│   ├── comment.php
│   ├── header.php
│   └── footer.php
│
├── /public
│   └── /assets
│       ├── /css
│       │   └── style.css
│       ├── /js
│       │   └── script.js
│       └── /img
│           └── (images des utilisateurs)
│
├── .env
│
└── .htaccess
```
**Explications détaillées de l'architecture**  

### 1. **index.php**
- **Description** : C'est le point d'entrée principal de l'application. Il initialise l'application, gère le routage des requêtes vers les contrôleurs appropriés, et établit l'infrastructure nécessaire pour lancer l'application. 
- **Rôle** : Traite la logique de redirection, inclut les fichiers nécessaires, et permet le chargement des contrôleurs en fonction des paramètres de la requête.

### 2. **/controllers**
- **Rôle général** : Ces fichiers contiennent la logique métier de l'application, servant d'intermédiaire entre les modèles (données) et les vues (interface utilisateur). Chaque contrôleur gère des actions spécifiques liées aux fonctionnalités de l'application.
  
  - **AuthController.php** : Gère les opérations liées à l'authentification des utilisateurs, telles que l'inscription, la connexion et la déconnexion. Il inclut la vérification des identifiants de l'utilisateur et l'enregistrement sécurisé des données.
  - **UserController.php** : Contrôleur qui gère les opérations liées aux utilisateurs, comme la modification du profil, la suppression de compte et la récupération des informations utilisateur.
  - **PostController.php** : Gère la création, la mise à jour, la suppression et l'affichage des publications. Il interagit avec `PostModel.php` pour récupérer ou modifier les données des publications.
  - **CommentController.php** : S'occupe de la gestion des commentaires sur les publications, y compris l'ajout, la suppression, et l'affichage des commentaires. 
  - **LikeController.php** : Contrôleur pour gérer les likes et les dislikes sur les publications. Il permet de liker, unliker, et met à jour le compteur de likes.

### 3. **/models**
- **Rôle général** : Ces fichiers gèrent les interactions avec la base de données. Ils contiennent les méthodes pour créer, lire, mettre à jour et supprimer des données.
  
  - **UserModel.php** : Représente et gère toutes les opérations liées aux utilisateurs dans la base de données. Cela inclut l'ajout de nouveaux utilisateurs, la vérification des identifiants et la récupération des détails de l'utilisateur.
  - **PostModel.php** : Gère toutes les opérations liées aux publications, telles que l'insertion de nouvelles publications, la mise à jour des existantes et la récupération des publications à afficher sur le mur public.
  - **CommentModel.php** : Représente et gère les opérations sur les commentaires, comme l'ajout de nouveaux commentaires, la suppression et la récupération des commentaires pour une publication spécifique.
  - **LikeModel.php** : Gère la logique des interactions "like" dans la base de données, y compris l'ajout, la suppression et le comptage des likes sur une publication.

### 4. **/views**
- **Rôle général** : Les fichiers de ce dossier génèrent l'interface utilisateur et présentent les données fournies par les contrôleurs. Ils incluent du HTML, du CSS et parfois du JavaScript.
  
  - **login.php** : Page d'interface utilisateur pour permettre aux utilisateurs de se connecter à l'application. Elle inclut un formulaire de connexion avec les champs nécessaires.
  - **register.php** : Page d'inscription permettant aux nouveaux utilisateurs de s'enregistrer. Contient un formulaire pour saisir les informations personnelles et les identifiants.
  - **create_post.php** : Page pour créer une nouvelle publication. Elle contient un formulaire pour que l'utilisateur puisse entrer le contenu de sa publication.
  - **view_posts.php** : Page pour afficher les publications existantes. Elle liste les publications avec des options pour commenter et liker.
  - **comment.php** : Page ou section pour afficher et soumettre des commentaires sur une publication. Elle affiche les commentaires existants et inclut un formulaire pour en ajouter de nouveaux.
  - **header.php** : Composant de l'en-tête commun à toutes les pages. Il peut inclure le logo, la barre de navigation et d'autres éléments communs.
  - **footer.php** : Composant de pied de page commun aux pages, contenant des liens de contact, des informations légales, etc.

### 5. **/public**
- **Rôle général** : Contient les ressources accessibles publiquement par l'application (fichiers CSS, JavaScript et images).
  
  - **/assets** : Dossier regroupant toutes les ressources statiques de l'application.
    - **/css** : Contient les feuilles de style CSS pour la mise en forme des pages de l'application (`style.css`).
    - **/js** : Contient les fichiers JavaScript pour ajouter des fonctionnalités dynamiques à l'interface (`script.js`).
    - **/img** : Dossier pour stocker les images utilisées dans l'application (photos de profil, images des publications, etc.).

### 6. **/config**
- **Rôle** : Contient les fichiers de configuration essentiels pour le bon fonctionnement de l'application.
  - **database.php** : Fichier de configuration qui établit la connexion à la base de données MySQL. Il contient les informations telles que l'hôte, le nom de la base de données, l'utilisateur et le mot de passe. Il peut également inclure des paramètres de connexion avancés pour la sécurité et les performances.

### 7. **.htaccess**
- **Description** : Fichier de configuration utilisé par le serveur web Apache. Il permet de gérer la réécriture des URL, les redirections, les règles de sécurité et d'autres configurations de serveur.
- **Rôle** : Améliore l'expérience utilisateur en permettant des URL conviviales et sécurisées. Il peut également être utilisé pour protéger certains fichiers ou dossiers de l'accès public.

 
#### 5. **Security By Design**
- **Protection contre les Injections SQL** : Utilisation de requêtes préparées, try-catch...
- **Prévention des Attaques XSS** : Nettoyage des entrées utilisateur.
- **Protection CSRF** : Utilisation de tokens CSRF pour les formulaires sensibles.
- **Hashage des Mots de Passe** : Ajout d'un Regex pour vérifier et valider la complixité des mots de passes, et utilisation de `bcrypt` ou toute autre librairie de hash, un sel serait un plus non négligeable.  
- **Vérification des Accès** : Contrôles stricts pour restreindre les actions aux utilisateurs autorisés.

#### 6. **User Stories et Critères de Validation**

1. **User Story 1 : Inscription d'un Utilisateur**
   - **En tant qu'utilisateur**, je veux m'inscrire avec mes informations personnelles afin de pouvoir accéder à l'application.
   - **Critères de validation** :
     - L'utilisateur doit pouvoir saisir son nom, prénom, date de naissance, email, photo de profil et mot de passe lors de l'inscription.
     - Validation des champs requis (email formaté, mot de passe sécurisé avec un minimum de 8 caractères alphanumériques).
     - Affichage d'un message de confirmation d'inscription réussie.

2. **User Story 2 : Connexion d'un Utilisateur**
   - **En tant qu'utilisateur**, je veux pouvoir me connecter avec mes identifiants afin d'accéder à mon compte et interagir sur la plateforme.
   - **Critères de validation** :
     - L'utilisateur doit saisir un email et un mot de passe valides.
     - Validation des informations et connexion sécurisée.
     - Affichage d'un message de confirmation de connexion réussie.
     - Redirection vers le mur public après connexion.

3. **User Story 3 : Publication**
   - **En tant qu'utilisateur connecté**, je veux pouvoir publier sur le mur de l'application afin de partager mes idées avec les autres.
   - **Critères de validation** :
     - L'utilisateur doit pouvoir poster un message texte.
     - Le message apparaît sur le mur public après validation.
     - La publication contient le nom et prénom de l'utilisateur, le contenu et la date.

4. **User Story 4 : Commentaire sur une Publication**
   - **En tant qu'utilisateur connecté**, je veux commenter les publications des autres afin d'interagir avec eux.
   - **Critères de validation** :
     - L'utilisateur doit pouvoir commenter une publication existante.
     - Le commentaire apparaît sous la publication concernée, avec date.
     - Les commentaires vides doivent être bloqués.

5. **User Story 5 : Aimer une Publication**
   - **En tant qu'utilisateur connecté**, je veux aimer des publications afin de montrer mon intérêt.
   - **Critères de validation** :
     - L'utilisateur peut cliquer sur un bouton "like".
     - Le compteur de likes s'incrémente et montre le total.
     - Retrait du like possible, avec décrémentation du compteur.

6. **User Story 6 : Suppression de Compte**
   - **En tant qu'utilisateur**, je veux pouvoir supprimer mon compte afin de quitter la plateforme tout en sachant que mes données seront protégées.
   - **Critères de validation** :
     - Option accessible pour la suppression de compte.
     - Message de confirmation avant suppression.
     - Données marquées comme désactivées en base de données, suppression automatique après 1 an.

#### 7. **Recommandations**
- **Sécurité prioritaire** : L'application doit inclure des mesures de protection dès le début du développement.
- **Conformité CNIL** : Pour la gestion des données personnelles.
- **Responsive Design** : Fonctionnement optimal sur différents types d'appareils.
- **Règles de nommage** : En anglais, Upper Camel Case pour les classes, Lower Camel Case pour les méthodes, Snake Case pour le CSS.

#### 8. **Livrables**
- Code source complet versionné et testable.
- Diagramme UseCase, diagramme de classe, et MPD ou schéma de la base de données.

 ### Organigramme : 
![organigramme-DORANCONET drawio](https://github.com/user-attachments/assets/86cdd564-cc12-4646-96f7-5ab678220e4d)

### 1. **PDG / CEO (Président Directeur Général / Chief Executive Officer)**
- **Responsabilités** :
  - Définir la vision et la stratégie globale de l'entreprise.
  - Prendre les décisions majeures pour orienter la direction de l'entreprise.
  - Assurer la croissance, la rentabilité et la pérennité de l'entreprise.
- **Relations avec les autres** :
  - Supervise le CPO (Chief Product Officer) et le CPT (Chief Product Tester).
  - Interagit avec les autres cadres pour aligner la stratégie produit et la qualité avec les objectifs globaux de l'entreprise.

### 2. **CPO (Chief Product Officer / Directeur de Produit)**
- **Responsabilités** :
  - Définir et mettre en œuvre la stratégie produit.
  - Superviser le développement des produits et leur cycle de vie complet.
  - Collaborer avec les équipes internes pour s'assurer que les produits répondent aux besoins du marché.
- **Relations avec les autres** :
  - Rend compte au PDG.
  - Collabore étroitement avec le chef de projet pour garantir que les projets sont en ligne avec la stratégie produit.
  - Interagit avec le Product Owner (PO) et la MOA pour comprendre et intégrer les besoins des utilisateurs.

### 3. **CPT (Chief Product Tester / Directeur des Tests de Produit)**
- **Responsabilités** :
  - Développer et superviser la stratégie de test et d'assurance qualité.
  - Garantir que les produits respectent les normes de qualité avant leur mise en production.
  - Gérer les équipes de testeurs et de QA.
- **Relations avec les autres** :
  - Rend compte au PDG.
  - Supervise les testeurs et l'équipe QA.
  - Travaille en collaboration avec le chef de projet pour intégrer les phases de test dans le planning du projet.

### 4. **Chef de Projet**
- **Responsabilités** :
  - Planifier, coordonner et superviser la réalisation des projets.
  - Gérer les ressources, les délais et le budget.
  - Assurer la communication entre les différentes équipes et parties prenantes.
- **Relations avec les autres** :
  - Collabore avec le CPO pour garantir l'alignement du projet avec la stratégie produit.
  - Interagit avec le Product Owner, le Scrum Master et la MOA pour coordonner les exigences et le flux de travail.
  - Collabore avec le CPT pour intégrer les tests dans la planification.

### 5. **PO (Product Owner)**
- **Responsabilités** :
  - Gérer le backlog produit et prioriser les fonctionnalités à développer.
  - Définir les user stories et s'assurer que l'équipe de développement comprend les exigences.
  - Agir en tant qu'interface entre les parties prenantes et l'équipe de développement.
- **Relations avec les autres** :
  - Collabore avec le chef de projet pour s'assurer que les tâches sont en phase avec la stratégie du projet.
  - Travaille avec le Scrum Master pour organiser et gérer les sprints.
  - Interagit avec la MOA pour s'assurer que les besoins métiers sont traduits en fonctionnalités réalisables.

### 6. **SM (Scrum Master)**
- **Responsabilités** :
  - Faciliter la méthodologie Agile/Scrum et assurer que l'équipe respecte les pratiques Scrum.
  - Éliminer les obstacles pour permettre à l'équipe de développement de progresser efficacement.
  - Aider l'équipe à atteindre ses objectifs de sprint.
- **Relations avec les autres** :
  - Travaille avec le Product Owner pour planifier les sprints et prioriser les tâches.
  - Collabore avec le chef de projet pour s'assurer que les délais et les processus sont respectés.
  - Coordonne avec la MOA pour intégrer les besoins métiers dans le processus de développement.

### 7. **MOA (Maîtrise d’Ouvrage)**
- **Responsabilités** :
  - Représenter les intérêts du client ou de l'utilisateur final.
  - Définir les besoins métier et rédiger les spécifications fonctionnelles.
  - Valider que les produits livrés répondent aux attentes et aux exigences.
- **Relations avec les autres** :
  - Collabore avec le Product Owner pour définir les priorités des fonctionnalités.
  - Travaille avec le chef de projet pour assurer la bonne intégration des exigences métier.
  - Peut interagir avec le Lead Tech et l'équipe de développement pour clarifier les besoins.

### 8. **Lead Tech**
- **Responsabilités** :
  - Diriger l'équipe de développement sur le plan technique.
  - Garantir la qualité et la cohérence du code.
  - Proposer des solutions techniques aux problèmes rencontrés.
- **Relations avec les autres** :
  - Collabore avec l'équipe de développement pour fournir un soutien technique.
  - Interagit avec le Product Owner pour clarifier les aspects techniques des user stories.
  - Travaille avec le chef de projet pour aligner la mise en œuvre technique avec les objectifs du projet.

### 9. **Équipe de Développement (Équipe de Dev)**
- **Responsabilités** :
  - Concevoir, développer, tester et mettre en œuvre les fonctionnalités du produit.
  - Travailler de manière autonome tout en respectant les consignes du Lead Tech et du Scrum Master.
- **Relations avec les autres** :
  - Collabore avec le Product Owner pour comprendre les tâches assignées.
  - Travaille sous la supervision du Lead Tech pour l'aspect technique et du Scrum Master pour les méthodes de travail.
  - Participe aux revues de sprint et aux réunions Agile.

### 10. **Testeurs**
- **Responsabilités** :
  - Exécuter les tests manuels et automatisés pour garantir que les fonctionnalités répondent aux spécifications.
  - Documenter les résultats des tests et signaler les anomalies.
- **Relations avec les autres** :
  - Travaillent sous la supervision du CPT.
  - Collaborent avec l'équipe QA pour assurer la qualité continue des produits.
  - Interagissent avec l'équipe de développement pour remonter les bugs et les points à corriger.

### 11. **QA (Quality Assurance)**
- **Responsabilités** :
  - Définir et mettre en œuvre les processus de qualité.
  - Superviser les tests et s'assurer que les produits respectent les normes de qualité définies.
- **Relations avec les autres** :
  - Collabore avec le CPT pour assurer la supervision des activités de test.
  - Interagit avec les testeurs pour coordonner les efforts de test.
  - Peut travailler avec le chef de projet pour inclure des points de qualité dans la planification du projet.
### 12. **Prestataire externe**  
- **Responsabilité** :
  - Collabore et aide l'équipe de développement à débloquer certaines situations bloquantes, bugs etc..
- **Relations avec les autres** :
  - Reste disponible pour toute demande venant du Scrum-Master. 


