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


        $actors = $this->actorDao->findByMovie($id);
        foreach ($actors as $actor) {
            $movie->addActor($actor);
        }
        
        $genre = $this->genreDao->findByMovie($id);
        $movie->setGenre($genre);

        $director = $this->directorDao->findByMovie($id);
        $movie->setDirector($director);

        // $actors = $this->actorDao->findByMovie($id);
        // foreach ($actors as $actor) {
        //     $movie->addActor($actor);
        // }

        // $comments = $this->commentDao->findByMovie($id);

        return $movie;
    
    }

    public function create($movieData) {
        $movie = $this->movieDao->createObjectFromFields($movieData);

        $genre = $this->genreDao->findById($movieData['genre_id']);
        $movie->setGenre($genre);

        $director = $this->directorDao->findById($movieData['director_id']);
        $movie->setDirector($director);

        $this->movieDao->create($movie);
    }

    public function getAllFilms() {
        $films = $this->movieDao->findAll();
        return $films;
    }

    public function addMovie($title, $image) {
        $movie = $this->movieDao->addMovie($title, $image);
    }
}

