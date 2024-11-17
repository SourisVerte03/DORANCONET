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
  - Affichage des publications avec pseudonyme, contenu et date.
  - Ordre : dernières publications en premier.

##### b. **Gestion des Utilisateurs**
- **Inscription et Connexion** :
  - Champs requis : Nom, Prénom, Date de naissance, Pseudonyme, Email, Photo de profil, Mot de passe.
  - Méthodes sécurisées de validation et de connexion (hashage sécurisé des mots de passe).
- **Mise à jour du profil** :
  - Modification des informations personnelles.
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

#### 5. **Security By Design**
- **Protection contre les Injections SQL** : Utilisation de requêtes préparées, try-catch...
- **Prévention des Attaques XSS** : Nettoyage des entrées utilisateur.
- **Protection CSRF** : Utilisation de tokens CSRF pour les formulaires sensibles.
- **Hashage des Mots de Passe** : Ajout d'un Regex pour vérifier et valider la complixité des mots de passes, et utilisation de `bcrypt` ou toute autre librarie de hash, un sel serait un plus non négligeable.  
- **Vérification des Accès** : Contrôles stricts pour restreindre les actions aux utilisateurs autorisés.

#### 6. **User Stories et Critères de Validation**

1. **User Story 1 : Inscription d'un Utilisateur**
   - **En tant qu'utilisateur**, je veux m'inscrire avec mes informations personnelles afin de pouvoir accéder à l'application.
   - **Critères de validation** :
     - L'utilisateur doit pouvoir saisir son nom, prénom, date de naissance, pseudonyme, email, photo de profil et mot de passe lors de l'inscription.
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
     - La publication contient le pseudonyme de l'utilisateur, le contenu et la date.

4. **User Story 4 : Commentaire sur une Publication**
   - **En tant qu'utilisateur connecté**, je veux commenter les publications des autres afin d'interagir avec eux.
   - **Critères de validation** :
     - L'utilisateur doit pouvoir commenter une publication existante.
     - Le commentaire apparaît sous la publication concernée, avec pseudonyme et date.
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
- **Règles de nommage** : Upper Camel Case pour les classes, Lower Camel Case pour les méthodes, Snake Case pour le CSS.

#### 8. **Livrables**
- Code source complet versionné et testable.
- Diagramme de classe et MPD ou schéma de la base de données.

 ### Organigramme : 

![image](https://github.com/user-attachments/assets/630e2184-357d-48b9-aa3c-51c8eb220dfb)

