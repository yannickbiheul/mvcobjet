<?php

namespace mvcobjet\Controllers;
// l'espace de nom est le nom de mon projet + le nom du répertoire ou se trouve mpon controleur
// puis commande composer dumpautolaod 
// creation d'un répertoire vendor.composer/autoload.php
// qu'on peut injecter dans le fichier d'index pour chargement automatiquement les librairies

/*
sur le version précédente j'utilisais DAO directement , ici on passe par les services
use mvcobjet\Models\Daos\GenreDao;
use mvcobjet\Models\Entities\Genre;
*/
use mvcobjet\Models\Services\GenreService; 

class FrontController
{

    private $genreService ;

    public function __construct(){
        // instanciation du service Genre
        $this->genreService = new GenreService();
    }

    public function genres() {
        /* 
         sur la version précédente j'utilisais DAO directement , ici on passe par les services
             avant :$genreDao = new GenreDao();
                    $genres = $genreDao->findAll();
       */
        $genres = $this->genreService->getAllGenres();
        foreach($genres as $genre) {
            echo $genre->getName();
        }
    }

}