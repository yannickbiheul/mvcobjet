<?php 

require_once "vendor/autoload.php";

use mvcobjet\controllers\FrontController; 

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/src/views');
$twig = new Environment($loader, ['cache' => false,'debug' => true]);

$fc = new FrontController($twig);

$base  = dirname($_SERVER['PHP_SELF']);

if(ltrim($base, '/')){ 
    $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
}

$klein = new \Klein\Klein();

$klein->respond('GET','/genres', function() use($fc) {
   $fc->genres(); 
});

$klein->respond('GET','/acteurs', function() use($fc) {
   $fc->acteurs(); 
});

$klein->respond('GET','/realisateurs', function() use($fc) {
   $fc->realisateurs(); 
});

$klein->respond('GET','/movie/[:id]', function($request) use($fc) {
   $fc->movie($request->id); 
});

$klein->dispatch(); 

?>