### HACKATHON-SAISON-01-SESSION-02  
### Sujet : Développement d'une Application de Réseau Social Interne Scolaire

#### Itération-01  
#### Description générale
Créez une application web de type réseau social simplifié, inspirée de Twitter et Reddit "Sans les sub-reddit", permettant aux utilisateurs de partager des publications courtes, visibles sur un mur public commun à tous les membres. L’objectif est de concevoir une plateforme simple et engageante offrant un espace d'expression aux étudiants de Doranco, tout en intégrant un système de gestion d'utilisateurs et de modération.

#### Fonctionnalités principales
1. **Mur Public Commun :**
   - Un flux de publications partagé par tous les utilisateurs, visible dès la page d'accueil.
   - Les publications sont affichées en ordre chronologique (les plus récentes en haut).
   - Chaque publication comporte le pseudonyme de l'utilisateur, le contenu du message et la date de publication.

2. **Système de Gestion des Utilisateurs :**
   - **Inscription** et **Connexion** : gestion des informations de base (Nom, Prénom, date de naissance, pseudonyme, email, photo de profil, mot de passe).
   - **Mise à jour du profil** : possibilité pour l'utilisateur de modifier son nom, prénom,date de naissance, pseudonyme, email, photo de profil et mot de passe.
   - **Déconnexion sécurisée**.
   - **Suppression du compte** : désactivation en base de données avec rétention des données pendant 1 an "Suivant les recommandation de la CNIL".

3. **Gestion des Publications et Interactions :**
   - Création et suppression de publications : les utilisateurs connectés peuvent publier et supprimer leurs propres messages.
   - Fonction de **Commentaires** sur les publications
   - Fonction de **like** sur les publications, avec affichage d’un compteur de likes pour chaque message.

4. **Modération :**
   - Un utilisateur ayant des droits d'administrateur peut modérer le contenu du mur public en supprimant les messages inappropriés.

#### Structure Technique
- **Back-end en PHP** : pour la gestion des utilisateurs, l'authentification, le traitement des messages, etc.
- **Base de données MySQL** : pour le stockage des utilisateurs, des publications, et des interactions "Commentaires", "Like".
- **Architecture MVC** : séparation en trois parties pour une meilleure organisation et maintenabilité du code.
  - **Modèle** : gère les données et interactions avec la base de données.
  - **Vue** : présente les données (HTML et CSS), avec mise en page flexible utilisant Flexbox.
  - **Contrôleur** : coordonne les actions entre le modèle et la vue pour répondre aux demandes des utilisateurs.

#### Objectifs de l'Évaluation
- **Qualité de l'interface utilisateur** : interface intuitive et responsive.
- **Structuration du code** : respect de l'architecture MVC avec séparation claire des responsabilités.
- **Sécurité** : protection contre les injections SQL, prévention des attaques XSS, CSRF Token, hashage sécurisé des mots de passe et vérification rigoureuse des droits d'accès.
- **Documentation** : un README clair et explicatif avec les instructions pour lancer l'application et les justifications des choix techniques.

---
#### Itération-02 
- **Ajouter un backoffice Administrateur:**
