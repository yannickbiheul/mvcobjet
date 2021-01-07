<?php 

require_once "vendor/autoload.php";

use mvcobjet\controllers\FrontController; 

// voir les espaces de noms
// https://openclassrooms.com/fr/courses/1217456-les-espaces-de-noms-en-php
// use permet de créer un alias 
// ici c'est comme si on disait :
// use MvcObjet\Controllers\FrontController as FrontController


$fc = new FrontController(); 




// pour klein redirection .htaccess
/*-------------------------------------
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule . index.php [L] 
--------------------------------------*/
$base  = dirname($_SERVER['PHP_SELF']);
// PHP_SELF -> nom du chemin + php de la racine (ex: /afpa/mvcobjet/index.php)
// dirname = /afpa/mvcobjet 
// REQUEST_URI = /afpa/mvcobjet/jami
//  apres trim REQUEST_URI => afpa/mvcobjet (utilisé par dispatch de klein)
if(ltrim($base, '/')){ 
    $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
}


$klein = new \Klein\Klein();

$klein->respond('GET','/toto', function() {
    return 'Hello toto !!!!';
});

$klein->respond('GET','/jam', function() {
    return 'Hello jami !!!!';
});

$klein->respond('GET','/fc', function() use($fc) {
    $fc->index();
});

$klein->dispatch(); 

// autre route / avec fonction() use ($fc) {
//    $fc->index() 
// }
