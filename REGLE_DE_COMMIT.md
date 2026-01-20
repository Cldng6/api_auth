# Règles de commit pour le projet Symfony API

## Objectif

Garantir des messages de commit **clairs, lisibles et exploitables**, pour :

- un historique cohérent,
- faciliter la revue de code,
- automatiser les changelogs et CI.

Cette convention est appliquée automatiquement via **Husky + Commitlint**.

---

## 1. Format obligatoire

<type>(<scope>): <message court à l’infinitif>

- **type** : obligatoire, choisi dans la liste autorisée
- **scope** : optionnel, indique la zone impactée (`auth`, `user`, `api`, `db`, etc.)
- **message court** : obligatoire, ≤ 72 caractères, à l’infinitif, sans point final

### Exemples valides

init: initialiser le projet Symfony
feat(auth): ajouter authentification JWT
fix(user): corriger l’unicité de l’email
chore(deps): mettre à jour les dépendances

### Exemples rejetés

update project
fix stuff
WIP
feat: ajout user.

---

## 2. Types de commit autorisés

| Type       | Quand l’utiliser                                |
| ---------- | ----------------------------------------------- |
| `init`     | Initialisation du projet                        |
| `feat`     | Nouvelle fonctionnalité                         |
| `fix`      | Correction de bug                               |
| `refactor` | Refactor sans changement fonctionnel            |
| `chore`    | Tâches techniques (config, dépendances, outils) |
| `test`     | Ajout ou modification de tests                  |
| `docs`     | Documentation                                   |
| `style`    | Formatage, lint, CS (sans impact logique)       |
| `perf`     | Amélioration de performance                     |
| `ci`       | CI/CD                                           |
| `build`    | Build, Docker, Composer                         |

---

## 3. Scopes recommandés

Pour plus de clarté, ajoute un scope indiquant la partie impactée :

- `auth` : authentification et sécurité
- `user` : gestion des utilisateurs
- `api` : endpoints et controllers API
- `db` : base de données, migrations
- `config` : configuration du projet
- `deps` : dépendances, composer
- `docker` : conteneurisation
- `ci` : intégration continue
- `chore` : modification de configuration / fichiers techniques

---

## 4. Bonnes pratiques

- 1 commit = 1 intention
- Message court, précis et à l’infinitif
- Pas de point final
- Vérifie avec `git status` avant de commit
- Ne jamais commit des fichiers temporaires ou sensibles (`vendor/`, `.env.local`, `var/`)

---

## 5. Workflow recommandé

- **Premier commit** :  
  init: initialiser le projet Symfony

- **Ajout fonctionnalité** :  
  feat(auth): ajouter endpoint login

- **Correction de bug** :  
  fix(api): corriger la validation email

- **Mise à jour de dépendances** :  
  chore(deps): mettre à jour api-platform

---

## 6. Application automatique

- Les commits sont vérifiés automatiquement via **Husky + commitlint**
- Commit bloqué si le message **ne respecte pas** les règles
