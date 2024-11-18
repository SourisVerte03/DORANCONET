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

![organigramme-DORANCONET drawio](https://github.com/user-attachments/assets/b8cdade7-2b26-4b0c-b389-3317c12dc346)  

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


