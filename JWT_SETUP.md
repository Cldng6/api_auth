# Configuration JWT pour Symfony 7.4

Ce document décrit les étapes pour configurer **LexikJWTAuthenticationBundle** dans un projet Symfony 7.4, générer les clés JWT et sécuriser l’API.

## 1. Créer le dossier pour les clés

```bash
mkdir -p config/jwt
```
- Le dossier config/jwt/ contiendra la clé privée et la clé publique

- La clé privée ne doit jamais être commitée dans le repo


## 2. Générer la clé privée

```bash
openssl genrsa -out config/jwt/private.pem -aes256 4096
```

- genrsa → génère une clé RSA

- -aes256 → chiffre la clé avec un mot de passe

- 4096 → taille en bits (sécurité élevée)

- Pendant l’exécution, OpenSSL demande un mot de passe → à mettre dans .env

```bash
JWT_PASSPHRASE=ton_mot_de_passe
```

## 3. Générer la clé publique

```bash
openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
La clé publique sert à vérifier les tokens
```
- La clé publique sert à vérifier les tokens