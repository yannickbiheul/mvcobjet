<?php 

// Système d'autoloading
require_once "vendor/autoload.php";

// Ici c'est pour pouvoir utiliser les fonctions de FrontController
use mvcobjet\controllers\FrontController; 

// Ça c'est les trucs de Twig
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
// __DIR__ est une constante indiquant le répertoire du fichier courant
$loader = new FilesystemLoader(__DIR__ . '/src/views');
$twig = new Environment($loader, ['cache' => false,'debug' => true]);

// $fc est un objet de la classe frontController
$fc = new FrontController($twig);

// $_SERVER[PHP_SELF] : Le nom du fichier du script en cours d'exécution, par rapport à la racine web.
$base = dirname($_SERVER['PHP_SELF']);

// $base = /mvcobjet

if(ltrim($base, '/')){ 
    $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
}

$route = new \Klein\Klein();

$route->respond('GET','/genres', function() use($fc) {
   $fc->genres(); 
});

$route->respond('GET','/acteurs', function() use($fc) {
   $fc->acteurs(); 
});

$route->respond('GET','/realisateurs', function() use($fc) {
   $fc->realisateurs(); 
});

$route->respond('GET','/movie/[:id]', function($request) use($fc) {
   $fc->movie($request->id); 
});

$route->dispatch(); 

?>