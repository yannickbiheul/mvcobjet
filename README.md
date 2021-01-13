# EXPLICATIONS

## index.php
- require_once "vendor/autoload.php";

Dans les projets en PHP, nous avons souvent besoin d’un système d’autoloading.

Au lieu de créer de zéro ce système d’autoloading en PHP, il suffit d’initialiser composer et de l’utiliser simplement.

### Composer
- **Étape 1** : Initialiser Composer

Dans le dossier contenant votre projet, vous aller initialiser composer en faisant un composer init.

Vous remplissez les différentes informations : name, description, licence, etc…

Voici le fichier composer.json :
```
{
    "name": "jam/mvcobjet",
    "type": "project",
    "description": "projet mvcObjet",
    "autoload": {
	"psr-4": {
 	   "mvcobjet\\": "src"
 	}
    },
    "authors": [
        {
            "name": "jam openlab",
            "email": "jb.cavarec@orange.fr"
        }
    ],
    "require": {
        "klein/klein": "^2.1",
        "twig/twig": "^3.2"
    }
}
```
Dans le fichier principal de votre projet, index.php par convention, il est important de rajouter la ligne suivante :
```
require ‘vendor/autoload.php’;
```

- **Étape 2** : Ajout de l'autoload

Dans le fichier composer.json généré, la partie à ajouter est la suivante : autoload.

psr-4 est la convention actuelle sur l’autoloading, et permet une meilleure gestion du chargement des classes et des interfaces de votre projet.

Dans le json, les classes du dossier mvcobjet sont automatiquement chargé par PHP.

- **Étape 3** : les derniers détails

Pour finaliser tout cela, il reste quelques détails à ajouter.

Dans chaque classes PHP du dossier mvcobjet, il faut ajouter en début de script la ligne suivante :
```
<?php
namespace mvcobjet;
```
Dès que vous voulez utiliser une des classes de ce dossier mvcobjet, il suffit d’utiliser les lignes de code telle que celle-ci :
```
use mvcobjet\nomDeLaClasse as nomDeLaClasse;
```
Cela appellera automatique la classe ayant pour nom nomDeLaClasse, et vous pourrez l’utiliser sans problème.