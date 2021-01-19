<?php

namespace mvcobjet\Controllers;

use mvcobjet\Models\Services\GenreService; 
use mvcobjet\Models\Services\ActorService; 
use mvcobjet\Models\Services\DirectorService; 
use mvcobjet\Models\Services\MovieService; 

use Twig\Environment;

function debug($variable) {
    echo '<pre>';
    print_r($variable);
    echo '</pre>';
}

class FrontController {
    private $genreService ;
    private $actorService ;
    private $directorService ;
    private $movieService ;

    private $twig;
    
    // Constructeur
    public function __construct($twig) {
        // instanciation du service Genre
        $this->genreService = new GenreService();
        $this->actorService = new ActorService();
        $this->directorService = new directorService();
        $this->movieService = new movieService();
        $this->twig = $twig;
    }

    // Récupérer tous les genres
    public function genres() {
       $genres = $this->genreService->getAllGenres();    
       echo $this->twig->render('genres.html.twig', [ "genres" => $genres ] );
    }

    // Récupérer tous les acteurs
    public function acteurs() {
       $acteurs = $this->actorService->getAllActors();
       echo $this->twig->render('actor.html.twig', ["acteurs" => $acteurs]);   
    }

    // Récupérer tous les réalisateurs
    public function realisateurs() {
       $reals = $this->directorService->getAlldirecteurs();
       echo $this->twig->render('directors.html.twig', ["reals" => $reals]);  
    }

    // Récupérer tous les films
    public function films() {
        $films = $this->movieService->getAllFilms();
        echo $this->twig->render('films.html.twig', ["films" => $films]); 
    }

    // Récupérer un genre par ID
    public function genre($id) {
        $genre = $this->genreService->getById($id);
        echo $this->twig->render('genreseul.html.twig', ["genre" => $genre]);   
    }

    // Récupérer un film par ID
    public function movie($id) {
        $movie = $this->movieService->getById($id);
        echo $this->twig->render('movie.html.twig', ["movie" => $movie ]);   
    }

    // Afficher la page d'accueil
    public function accueil() {
        echo $this->twig->render('accueil.html.twig'); 
    }

    // Afficher le formulaire d'ajout de film
    public function formFilm() {
        echo $this->twig->render('formFilm.html.twig');
    }
    
}