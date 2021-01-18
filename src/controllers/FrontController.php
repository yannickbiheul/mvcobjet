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
    
    public function __construct($twig) {
        // instanciation du service Genre
        $this->genreService = new GenreService();
        $this->actorService = new ActorService();
        $this->directorService = new directorService();
        $this->movieService = new movieService();
        $this->twig = $twig;
    }

    public function genres() {
        
       $genres = $this->genreService->getAllGenres();    
       echo $this->twig->render('genres.html.twig', [ "genres" => $genres ] );
    }

    public function acteurs() {
       $acteurs = $this->actorService->getAllActors();
       echo $this->twig->render('actor.html.twig', ["acteurs" => $acteurs]);   
    }

    public function realisateurs() {
       $reals = $this->directorService->getAlldirecteurs();
       echo $this->twig->render('directors.html.twig', ["reals" => $reals]);  
    }

    public function films() {
        $films = $this->movieService->getAllFilms();
        echo $this->twig->render('films.html.twig', ["films" => $films]); 
    }

    public function genre($id) {
        $genre = $this->genreService->getById($id);
        echo $this->twig->render('genreseul.html.twig', ["genre" => $genre]);   
    }

    public function movie($id) {
        $movie = $this->movieService->getById($id);
        echo $this->twig->render('movie.html.twig', ["movie" => $movie ]);   
    }

    public function addMovie($post) {
        $movie = $this->movieService->create($post);
        echo $this->twig>render('addMovie.html.twig', ["movie" => $movie]);
    }

    public function accueil() {
        $films = $this->movieService->getAllFilms();
        echo $this->twig->render('accueil.html.twig', ["films" => $films]); 
    }
    
}