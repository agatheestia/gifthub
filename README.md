# Introduction

## Étapes d'installation

### 1. Cloner le projet depuis GitHub

1. Ouvrez **Visual Studio Code (VSC)**.
2. Ouvrez le terminal intégré dans VSC (via `Ctrl + \` ou `Terminal > Nouveau terminal`).
3. Naviguez jusqu'au dossier de votre serveur WAMP :
   ```bash
   cd C:/wamp64/www
   ```
4. Clonez le projet dans le dossier `gifthub` avec la commande suivante :
   ```bash
   git clone https://github.com/valentin-texier/gifthub.git
   ```

---

### 2. Configuration du serveur WAMP

#### 2.1. Créer un Virtual Host

1. Ouvrez **WAMP** et assurez-vous que tous les services sont démarrés.
2. Cliquez sur l'icône **WAMP** dans la barre des tâches, puis sélectionnez vos virtual host et gestion.
3. Ajoutez la configuration suivante pour le Virtual Host :
   ```apache
    nom gifthub
    chemin C:/wamp64/www/gifthub"
   ```


#### 2.2. Redémarrer WAMP

1. Retournez à l'icône **WAMP** dans la barre des tâches et clique droit.
2. Cliquez sur tool et redemarrer DNS.

---

### 3. Configuration de la base de données

#### 3.1. Créer la base de données et importer les données

1. Ouvrez votre navigateur et allez sur [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
2. Connectez-vous avec l'utilisateur et le mot de passe par défaut de WAMP : utilisateur `root` et mot de passe vide (ou comme configuré).
3. Dans PhpMyAdmin, cliquez sur **"Nouvelle base de données"**.
4. Nommez la base de données (par exemple `gifthub`).
5. Une fois la base de données créée, cliquez sur **"Importer"**.
6. Cliquez sur **"Choisir un fichier"** et sélectionnez le fichier `db_gifthub.sql` que vous trouverez dans le dossier du projet cloné.
7. Cliquez sur **"Exécuter"** pour importer la base de données.

---

### 4. Accéder à l'application

Une fois que vous avez configuré votre Virtual Host et la base de données, ouvrez votre navigateur et tapez l'URL suivante :

```plaintext
http://gifthub/
```

Si tout est correctement configuré, vous devriez voir l'application fonctionner localement.

---


# Guide de workflow – Projet Gifthub


### Étape 1 – Se placer sur la branche `main` et créer une nouvelle branche

1. Ouvre VS Code
2. Lance WAMP et vérifie que ton virtual host `gifthub` fonctionne
3. Ouvre un terminal dans le dossier `C:/wamp64/www/gifthub`

Commande à exécuter :
```bash
git checkout main
git pull origin main
git checkout -b nom-fonctionnalité
```

> Remplace `nom-fonctionnalité` par ce que tu vas développer. Exemple : `page-inscription`

---

### Étape 2 – Génère ton code avec ChatGPT

Voici le **prompt à copier/coller** dans ChatGPT pour générer le code de la fonctionnalité :

```txt


À partir de l’image PNG fournie (maquette Figma), génère l’intégralité du code d’un site web dynamique en suivant l’architecture MVC (Model-View-Controller). L’application permet aux utilisateurs de créer, gérer et partager des wishlists (listes de souhaits) : création de compte, ajout de souhaits, indication d’achat, likes, et consultation des souhaits populaires en public. 

Le code doit utiliser :  
- **HTML** pour la structure  
- **CSS + Bootstrap** pour le style et la responsivité  
- **JavaScript** pour les interactions côté client  
- **PHP (avec PDO)** pour la logique serveur et la communication avec une base de données **MySQL**

Chaque composant (modèle, vue, contrôleur) doit être séparé dans des dossiers dédiés. L’interface doit correspondre fidèlement à la maquette fournie.

La base de données comprend cinq tables :  
- `users` (id, last_name, first_name, username, email, password, created_at)  
- `types` (id, name)  
- `wishlists` (id, name, image, description, id_type, id_user, created_at)  
- `wishes` (id, name, image, description, link, price, id_wishlist, is_purchased, created_at)  
- `likes` (id, id_user, id_wish, created_at)

Génère des fichiers HTML, CSS, JS et PHP bien structurés, commentés, évolutifs et directement exploitables.
```

---

### Étape 3 – Implémente et structure le code

1. Place ton code généré dans :
   - `/controllers/` → logique PHP
   - `/models/` → communication BDD
   - `/views/` → fichiers HTML/PHP à afficher
   - `/public/` → JS, CSS, images
2. Vérifie que la page fonctionne localement via ton virtual host

---

### Étape 4 – Ajouter, valider et documenter ton travail

Utilise un des modèles de commit suivants en fonction de ce que tu as fait :

#### Pour ajouter une fonctionnalité :
```bash
git add .
git commit -m "feat: ajouter "
```

#### Pour corriger un bug :
```bash
git add .
git commit -m "fix: corriger "
```

#### Pour améliorer du code sans changer son fonctionnement :
```bash
git add .
git commit -m "refactor: améliorer code "
```

#### Pour mettre à jour le style :
```bash
git add .
git commit -m "style: améliorer le style de "
```

> Remplace simplement `le vide` par ce que tu as fait, exemple : `formulaire de connexion`

---

### Étape 5 – Pousser ton travail

Commande à exécuter :
```bash
git push origin feat/nom-fonctionnalité
```

---

### Étape 6 – Fusionner ta branche dans `main`

Quand tout est prêt et fonctionne sur ton poste :

1. Reviens sur `main` :
```bash
git checkout main
git pull origin main
```

2. Merge ta branche :
```bash
git merge feat/nom-fonctionnalité
```

3. Pousse la branche `main` à jour :
```bash
git push origin main
```
