<?php 

require_once "vendor/autoload.php";

use mvcobjet\controllers\FrontController; 
// voir les espaces de noms
// https://openclassrooms.com/fr/courses/1217456-les-espaces-de-noms-en-php
// use permet de créer un alias 
// ici c'est comme si on disait :
// use MvcObjet\Controllers\FrontController as FrontController

$fc = new FrontController(); 
$fc->index();

//echo "coucou";

