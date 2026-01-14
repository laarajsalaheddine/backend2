# Mon Référentiel de Projet

<details>
<summary><strong>Aperçu/Overview</strong></summary>

## 📘 Aperçu du Projet

Ceci est un **projet Laravel qui utilise des fichiers JSON comme seule source de données**.

👉 **Aucune base de données (MySQL, SQLite, PostgreSQL, etc.) n'est requise ou utilisée.**

L'objectif de ce projet est de:
- Pratiquer le routage et les contrôleurs Laravel
- Manipuler les données stockées dans les fichiers JSON
- Comprendre comment Laravel fonctionne **sans Eloquent ou migrations**

⚠️ **Note importante**

Même si la logique de l'application utilise des fichiers JSON, **Laravel utilise toujours les sessions et le cache**.  
Si ceux-ci ne sont pas configurés correctement, Laravel essaiera de se connecter à une base de données et peut lever une **erreur 500**.

Ce README explique **exactement comment configurer le projet correctement** pour éviter cela.

---

### 🧠 Caractéristiques Clés

- Pas de base de données
- Pas de migrations
- Pas de modèles Eloquent
- Données stockées dans des fichiers JSON
- Sessions et cache stockés en tant que fichiers
- Conçu à des fins d'apprentissage et éducatives

</details>

<details>
<summary><strong>Installation (pour éviter les erreurs)</strong></summary>

### 2️⃣ Installer les dépendances PHP

Assurez-vous que **PHP** et **Composer** sont installés, puis exécutez:

```bash
composer install
```

✅ Cela doit créer le répertoire `vendor/`.

---

### 3️⃣ Créer le fichier `.env`

Laravel **ne s'exécutera pas sans un fichier `.env`**.

```bash
cp .env.example .env
```

(Sous Windows, vous pouvez copier le fichier manuellement.)

---

### 4️⃣ Générer la clé de l'application (OBLIGATOIRE)

⛔ Ignorer cette étape causera une **erreur 500**.

```bash
php artisan key:generate
```

---

### 5️⃣ Configurer `.env` pour un projet JSON uniquement

Ouvrez le fichier `.env` et **assurez-vous que ces valeurs sont définies**:

```env
APP_ENV=local
APP_DEBUG=true

SESSION_DRIVER=file
CACHE_DRIVER=file

DB_CONNECTION=null
```

📌 **Pourquoi c'est important**

* Laravel utilise les sessions en interne
* Si `SESSION_DRIVER=database`, Laravel essaiera d'accéder à une BD
* Ce projet n'utilise **aucune** base de données
* L'utilisation de `file` empêche Laravel d'interroger SQLite ou MySQL

---

### 6️⃣ Effacer tous les caches Laravel (TRÈS IMPORTANT)

Après avoir édité `.env`, exécutez toujours:

```bash
php artisan optimize:clear
```

Cela efface:

* le cache de configuration
* le cache des routes
* le cache des vues
* le cache de l'application

---

### 7️⃣ (Facultatif) Vérifier les routes

```bash
php artisan route:list
```

Si les routes sont affichées correctement, l'application est saine ✅

---

### 8️⃣ Exécuter le serveur de développement

```bash
php artisan serve
```

L'application sera disponible à:

```
http://127.0.0.1:8000
```

---

## ❌ Erreurs Courantes et Solutions

### 🔴 Erreur 500

Vérifiez les éléments suivants **dans l'ordre**:

1. Le fichier `.env` existe
2. `APP_KEY` est généré
3. `APP_DEBUG=true`
4. `SESSION_DRIVER=file`
5. Cache effacé avec `php artisan optimize:clear`

---

### 🔍 Journaux Laravel

Si l'erreur persiste, vérifiez:

```
storage/logs/laravel.log
```

---

## ✅ Résumé de la Configuration Rapide

```bash
git clone <REPO_URL>
composer install
cp .env.example .env
php artisan key:generate
php artisan optimize:clear
php artisan serve
```

---

Bon codage 🚀

</details>
```