<?php

namespace mvcobjet\Models\Services;

use mvcobjet\Models\Daos\ActorDao;
use mvcobjet\Models\Daos\DirectorDao;
use mvcobjet\Models\Daos\GenreDao;
use mvcobjet\Models\Daos\MovieDao;

use mvcobjet\Models\Entities\Actor;
use mvcobjet\Models\Entities\Director;
use mvcobjet\Models\Entities\Genre;
use mvcobjet\Models\Entities\Movie;

class MovieService {
    private $movieDao;
    private $actorDao;
    private $genreDao;
    private $directorDao;

    public function __construct() {
        $this->movieDao = new MovieDao();
        $this->actorDao = new ActorDao();
        $this->directorDao = new DirectorDao();
        $this->genreDao = new GenreDao();
    }

    public function getbyId($id) {
        $movie = $this->movieDao->findById($id);
        // return $movie;


        // $actors = $this->actorDao->findByMovie($id);
        // foreach ($actors as $actor) {
        //     $movie->addActor($actor);
        // }
        
        $genre = $this->genreDao->findByMovie($id);
        $movie->setGenre($genre);

        $director = $this->directorDao->findByMovie($id);
        $movie->setDirector($director);

        // $comments = $this->commentDao->findByMovie($id);

        return $movie;
    
    }
}

