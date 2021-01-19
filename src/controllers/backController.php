<?php

namespace mvcobjet\Controllers;

use mvcobjet\Models\Services\GenreService; 
use mvcobjet\Models\Services\ActorService; 
use mvcobjet\Models\Services\DirectorService; 
use mvcobjet\Models\Services\MovieService; 

use Twig\Environment;

class BackController {

    private $movieService;

    public function __construct($twig) {
        // instanciation du service Genre
        $this->genreService = new GenreService();
        $this->actorService = new ActorService();
        $this->directorService = new directorService();
        $this->movieService = new movieService();
        $this->twig = $twig;
    }

    public function addMovie($movieData) {
        $this->movieService->create($movieData);
        echo $this->twig->render('addMovie.html.twig'); 
    }
}