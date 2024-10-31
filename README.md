### HACKATHON SAISON-01-SESSION-02
### Sujet : Développement d'une Application de Réseau Social Simplifié

#### Description générale
Développez une application web de type réseau social, inspirée de Twitter, permettant aux utilisateurs de partager des messages courts visibles sur un mur public accessible à tous. L'objectif est de concevoir une plateforme simple et engageante qui offre un espace d'expression tout en gérant les utilisateurs et leur contenu.

#### Fonctionnalités principales
1. **Mur Public Commun :**
   - Un flux de messages partagés par tous les utilisateurs, visible dès la page d'accueil.
   - Les messages sont affichés en ordre chronologique (les plus récents en haut).
   - Chaque message comporte le nom d'utilisateur, le contenu du message, et la date de publication.

2. **Système de Gestion d'Utilisateur :**
   - **Inscription** et **Connexion** des utilisateurs avec gestion des informations de base (nom d'utilisateur, email, mot de passe).
   - **Mise à jour du profil** : L'utilisateur peut modifier son nom, son email, ou son mot de passe.
   - **Déconnexion** sécurisée.

3. **Création et Suppression de Messages :**
   - Les utilisateurs connectés peuvent publier des messages sur le mur public.
   - Ils peuvent également supprimer leurs propres messages, mais pas ceux des autres utilisateurs.
   
4. **Interaction Sociale :**
   - Fonction de **like** sur les messages.
   - Compteur de likes affiché pour chaque message.
   
5. **Modération :**
   - Un utilisateur avec des droits d'administrateur peut modérer le contenu du mur public en supprimant les messages inappropriés.

#### Structure Technique
- **Back-end en PHP** : gestion des utilisateurs, authentification, traitement des messages, etc.
- **Base de données MySQL** : stockage des utilisateurs, messages, et interactions (likes).
- **Architecture MVC** : Séparation en trois parties principales pour une meilleure organisation du code.
  - **Modèle** : gère les données et les interactions avec la base de données.
  - **Vue** : gère la présentation des données (HTML et CSS).
  - **Contrôleur** : interagit avec le modèle et la vue pour répondre aux actions des utilisateurs.

#### Objectifs de l'Évaluation
- **Qualité de l'interface utilisateur** : interface intuitive et responsive.
- **Bonne structuration du code** : séparation des responsabilités dans une architecture MVC.
- **Sécurité** : protection contre les injections SQL, mots de passe sécurisés, vérification des droits d'accès.
- **Documentation** : un README explicatif avec les instructions pour lancer l'application et les explications des choix techniques.
