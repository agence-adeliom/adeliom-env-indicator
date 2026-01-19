# Adeliom - Env Indicator 🚀

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![PHP Version](https://img.shields.io/badge/php-%3E%3D%208.1-8892bf.svg)](https://php.net)

**Adeliom - Env Indicator** est un utilitaire léger pour PHP 8.1+ qui injecte dynamiquement un emoji et un préfixe dans la balise `<title>` de votre HTML. Fini les erreurs de saisie en pensant être en local alors que vous êtes sur le serveur de test !

---

## ✨ Caractéristiques
* **PHP 8.1+ Ready :** Utilise les Enums pour une gestion stricte des environnements.
* **Intelligent :** Ne modifie rien si la balise `<title>` est absente ou si vous êtes en production.
* **Automatique :** Se base sur la variable d'environnement `APP_ENV`.

---

## 🛠 Installation

Installez le package via [Composer](https://getcomposer.org/) :

```bash
composer require adeliom/env-indicator
```

## 🚀 Utilisation

Appelez la méthode `listen()` au tout début de votre script (avant tout affichage HTML).

### Détection automatique
Le script utilise `getenv('APP_ENV')` par défaut.

```php
<?php
require_once 'vendor/autoload.php';

use Adeliom\EnvIndicator\EnvIndicator;

// Initialisation
EnvIndicator::listen();
```

### Forcer un environnement
Si vous n'utilisez pas de variables d'environnement système :

```php
EnvIndicator::listen('preprod');
```

## 📊 Indicateurs par défautEnvironnement
| Environnement        | Icône & Préfixe     |
|---------------------|---------------------|
| local               | 🏠 [LOCAL]          |
| dev / development   | ⚙️ [DEV]            |
| preprod             | 🧪 [PREPROD]        |
| staging             | 🧪 [STAGING]        |
| test                | 📝 [TEST]           |
| production          | (Désactivé)         |


## ⚙️ Fonctionnement technique 
Le package utilise le Output Buffering (ob_start) de PHP pour intercepter le flux de sortie. Une expression régulière identifie la balise <title> et y injecte le préfixe défini dans l'Enum Environment.
```php
// Exemple de transformation :
// Avant : <title>Mon Projet</title>
// Après : <title>🏠 [LOCAL] Mon Projet</title>
```

## 📄 Licence 
Ce projet est sous licence MIT. 
Fait avec ❤️ par Adeliom