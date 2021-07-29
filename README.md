# p7 BileMo
Projet OpenClassroom

## Installation du projet

Cloner le projet dans le dossier www de votre server local 

Cmd:
```text
Git Clone 'lien ssh ou https'
```
 Une fois le dossier telechargé ouvrer celui-ci dans un terminal et installer les dépendances composer et les updater
 
 Cmd:
 ```text
Composer update
```

## Installation de la Base de donnée

A la base du projet ouvrer le fichier `.env`

Selectionner le système de gestion de base de données de votre serveur local (SQLite,PostgreSQL,Mysql) et completer les informations requisent en supprimant le '#'.

Exemple Mysql:
 ```text
DATABASE_URL=mysql://root:password@127.0.0.1:3306/nom_database?serverVersion=5.7
```

Les information du fichier `.env` complété, Créer la base de donnée ⚠ Utiliser le même nom dans le fichier `.env` et la commande

Cmd:
 ```text
php bin/console doctrine:database:create nom_database
```

Injecter les entités dans votre base de donnée

Cmd:
 ```text
php bin/console doctrine:migrations:migrate
```

Hydrater les entités avec les fixtures

Cmd:
```text
php bin/console doctrine:fixtures:load
```

## Générer les pass JWT

On va générer le dossier config/jwt pour stocker les différentes clés d'authentification

Cmd:
```text
mkdir config/jwt
```

On va générer la clé privé

Cmd:
```text
openssl genrsa -out config/jwt/private.pem -aes256 4096
```

Une fois la passphrase validé et confirmé crée la clé publique

Cmd:
```text
openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
```

## Utilisation

Il suffit de lancer un serveur, symfony pour l'exemple 

Cmd:
```text
symfony serve
```
 et de se diriger vers la doc
 
 Cmd:
```text
http://http://localhost//api/docs
```

Bonne Utilisation

[![Codacy Badge](https://app.codacy.com/project/badge/Grade/3a601bf12db34aec98a9b2857c48cf9f)](https://www.codacy.com/gh/Nerpp/p7/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Nerpp/p7&amp;utm_campaign=Badge_Grade)
