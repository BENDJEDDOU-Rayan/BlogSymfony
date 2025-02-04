# Projet Symfony 

## Installation et Configuration

### Cloner le dépôt
```sh
git clone https://github.com/votre-repo/mon-projet.git
cd mon-projet
```

### Installer les dépendances
#### Dépendances PHP
```sh
composer install
```

#### Installation tailwind
```sh
npm install
```

### Configurer l'environnement
Copiez le fichier `.env` et renommez-le en `.env.local`, puis configurez votre base de données :
```sh
cp .env .env.local  # Modifier DATABASE_URL dans .env.local
```
Créez la base de données et appliquez les migrations :
```sh
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

---

## Comment lancer le projet ?

### Compiler les assets avec Webpack Encore
Avant de démarrer le serveur, il faut compiler les fichiers statiques :
```sh
npm run build
```
Cela générera les fichiers dans `public/build/`.

### Activer le mode "watch" pour les assets
Cette commande permet d'observer les fichiers et recompiler automatiquement en cas de modification :
```sh
npm run watch
```

### Lancer le serveur Symfony
Dans un autre terminal, démarrez le serveur :
```sh
symfony serve
```

Le projet est maintenant accessible à l'adresse suivante :
```
http://127.0.0.1:8000/
```
